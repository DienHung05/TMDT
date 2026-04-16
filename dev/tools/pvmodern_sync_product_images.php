<?php
declare(strict_types=1);

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\State;

require dirname(__DIR__, 2) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

try {
    $objectManager->get(State::class)->setAreaCode('adminhtml');
} catch (\Throwable $e) {
}

$collectionFactory = $objectManager->get(CollectionFactory::class);
$productRepository = $objectManager->get(ProductRepositoryInterface::class);
$resolver = $objectManager->get(\YourVendor\PVModern\Model\ProductVisualResolver::class);

$syncDir = BP . '/pub/media/import/pvmodern-image-sync';
if (!is_dir($syncDir) && !mkdir($syncDir, 0775, true) && !is_dir($syncDir)) {
    throw new RuntimeException('Unable to create sync dir: ' . $syncDir);
}

$collection = $collectionFactory->create();
$collection->addAttributeToSelect(['sku', 'name', 'image', 'small_image', 'thumbnail', 'media_gallery']);

$synced = 0;
$skipped = 0;
$errors = 0;

foreach ($collection as $product) {
    $currentImage = (string) $product->getData('image');
    if ($currentImage !== '' && $currentImage !== 'no_selection') {
        $skipped++;
        continue;
    }

    $sku = (string) $product->getSku();
    $sourceUrl = $resolver->resolveBySku($sku);
    if ($sourceUrl === '' || str_contains($sourceUrl, 'placeholder')) {
        $errors++;
        echo "SKIP {$sku}: no usable source\n";
        continue;
    }

    $filenameBase = strtolower(preg_replace('/[^a-z0-9]+/', '-', strtolower($sku)) ?: strtolower($sku));
    $tmpPath = downloadImage($sourceUrl, $syncDir, $filenameBase);
    if ($tmpPath === null) {
        $errors++;
        echo "FAIL {$sku}: download failed\n";
        continue;
    }

    try {
        $loaded = $productRepository->get($sku, true, 0, true);
        $loaded->addImageToMediaGallery($tmpPath, ['image', 'small_image', 'thumbnail'], false, false);
        $productRepository->save($loaded);
        $synced++;
        echo "SYNC {$sku}\n";
    } catch (\Throwable $e) {
        $errors++;
        echo "FAIL {$sku}: {$e->getMessage()}\n";
    }
}

echo "done synced={$synced} skipped={$skipped} errors={$errors}\n";

function downloadImage(string $url, string $dir, string $filenameBase): ?string
{
    $ch = curl_init($url);
    if ($ch === false) {
        return null;
    }

    $tmpPath = $dir . '/' . $filenameBase . '.bin';
    $handle = fopen($tmpPath, 'wb');
    if ($handle === false) {
        curl_close($ch);
        return null;
    }

    curl_setopt_array($ch, [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_FILE => $handle,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_USERAGENT => 'PVModernImageSync/1.0',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ]);

    $success = curl_exec($ch);
    $contentType = (string) curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    $httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    fclose($handle);
    curl_close($ch);

    if ($success === false || $httpCode < 200 || $httpCode >= 300 || !is_file($tmpPath) || filesize($tmpPath) === 0) {
        @unlink($tmpPath);
        return null;
    }

    $extension = 'jpg';
    if (str_contains($contentType, 'png')) {
        $extension = 'png';
    } elseif (str_contains($contentType, 'webp')) {
        $extension = 'webp';
    } elseif (str_contains($contentType, 'jpeg') || str_contains($contentType, 'jpg')) {
        $extension = 'jpg';
    } else {
        $path = parse_url($url, PHP_URL_PATH);
        $candidate = pathinfo((string) $path, PATHINFO_EXTENSION);
        if ($candidate !== '') {
            $extension = strtolower($candidate);
        }
    }

    $finalPath = $dir . '/' . $filenameBase . '.' . $extension;
    rename($tmpPath, $finalPath);

    return $finalPath;
}
