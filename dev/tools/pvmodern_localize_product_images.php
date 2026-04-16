<?php
declare(strict_types=1);

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\State;
use YourVendor\PVModern\Model\ProductVisualResolver;

require dirname(__DIR__, 2) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

try {
    $objectManager->get(State::class)->setAreaCode('adminhtml');
} catch (\Throwable $e) {
}

$collectionFactory = $objectManager->get(CollectionFactory::class);
$resolver = $objectManager->get(ProductVisualResolver::class);

$targetDir = BP . '/pub/media/pvmodern/products';
if (!is_dir($targetDir) && !mkdir($targetDir, 0775, true) && !is_dir($targetDir)) {
    throw new RuntimeException('Unable to create target dir: ' . $targetDir);
}

$collection = $collectionFactory->create();
$collection->addAttributeToSelect(['sku', 'name', 'status'])->addAttributeToFilter('status', 1);

$downloaded = 0;
$skipped = 0;
$failed = 0;

foreach ($collection as $product) {
    $sku = (string) $product->getSku();
    $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', strtolower($sku)) ?: strtolower($sku));

    if (hasLocalImage($targetDir, $slug)) {
        $skipped++;
        continue;
    }

    $sourceUrl = $resolver->resolveBySku($sku);
    if ($sourceUrl === '' || str_contains($sourceUrl, 'placeholder')) {
        $failed++;
        echo "SKIP {$sku}: no usable source\n";
        continue;
    }

    $saved = downloadToLocal($sourceUrl, $targetDir, $slug);
    if ($saved === null) {
        $failed++;
        echo "FAIL {$sku}: {$sourceUrl}\n";
        continue;
    }

    $downloaded++;
    echo "OK {$sku}: {$saved}\n";
}

echo "done downloaded={$downloaded} skipped={$skipped} failed={$failed}\n";

function hasLocalImage(string $dir, string $slug): bool
{
    foreach (['jpg', 'jpeg', 'png', 'webp'] as $extension) {
        if (is_file($dir . '/' . $slug . '.' . $extension)) {
            return true;
        }
    }

    return false;
}

function downloadToLocal(string $url, string $dir, string $slug): ?string
{
    $tmpPath = $dir . '/' . $slug . '.tmp';
    $handle = fopen($tmpPath, 'wb');
    if ($handle === false) {
        return null;
    }

    $ch = curl_init($url);
    if ($ch === false) {
        fclose($handle);
        @unlink($tmpPath);
        return null;
    }

    curl_setopt_array($ch, [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_FILE => $handle,
        CURLOPT_TIMEOUT => 90,
        CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_USERAGENT => 'PVModernImageLocalizer/1.0',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ]);

    $success = curl_exec($ch);
    $httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    $contentType = (string) curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

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
        $candidate = strtolower((string) pathinfo((string) $path, PATHINFO_EXTENSION));
        if (in_array($candidate, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            $extension = $candidate;
        }
    }

    $finalPath = $dir . '/' . $slug . '.' . $extension;
    rename($tmpPath, $finalPath);

    return basename($finalPath);
}
