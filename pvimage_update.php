<?php
/**
 * PVModern — Product Image Updater v3
 * Uses pub/media/tmp (inside Magento dir) and curl for reliable downloads.
 * Usage: php /var/www/Magento/pvimage_update.php
 */
use Magento\Framework\App\Bootstrap;
require __DIR__ . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$obj       = $bootstrap->getObjectManager();
$state     = $obj->get(\Magento\Framework\App\State::class);
try { $state->setAreaCode('adminhtml'); } catch (\Throwable $e) {}

$productRepository = $obj->get(\Magento\Catalog\Api\ProductRepositoryInterface::class);
$imageProcessor    = $obj->get(\Magento\Catalog\Model\Product\Gallery\Processor::class);

// Image map: real SKUs → best available image (using Wikipedia/Wikimedia/official open CDNs)
$imageMap = [
    'LAP-ASUS-ZEPHYRUS-G16-4070' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/ASUS_logo.svg/400px-ASUS_logo.svg.png',
        'label' => 'ASUS ROG Zephyrus G16 RTX 4070',
        'fallback' => true, // placeholder until ASUS CDN accessible
    ],
    'LAP-LENOVO-LEGION7I-4080' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Lenovo_logo_2015.svg/400px-Lenovo_logo_2015.svg.png',
        'label' => 'Lenovo Legion 7i Gen 9 RTX 4080',
        'fallback' => true,
    ],
    'MB-GIGABYTE-X870E-AORUS-MASTER' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Gigabyte_Technology_logo.svg/400px-Gigabyte_Technology_logo.svg.png',
        'label' => 'Gigabyte X870E AORUS MASTER',
        'fallback' => true,
    ],
    'MB-GIGABYTE-B650E-AORUS-ELITE-AX' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Gigabyte_Technology_logo.svg/400px-Gigabyte_Technology_logo.svg.png',
        'label' => 'Gigabyte B650E AORUS ELITE AX ICE',
        'fallback' => true,
    ],
    'SSD-SEAGATE-FIRECUDA-530R-2TB' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Seagate_logo.svg/400px-Seagate_logo.svg.png',
        'label' => 'Seagate FireCuda 530R 2TB NVMe',
        'fallback' => true,
    ],
    'SSD-SEAGATE-FIRECUDA-530R-4TB' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Seagate_logo.svg/400px-Seagate_logo.svg.png',
        'label' => 'Seagate FireCuda 530R 4TB NVMe',
        'fallback' => true,
    ],
    'SSD-SEAGATE-FIRECUDA-540-1TB' => [
        'url'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Seagate_logo.svg/400px-Seagate_logo.svg.png',
        'label' => 'Seagate FireCuda 540 1TB Gen5 NVMe',
        'fallback' => true,
    ],
];

// Use a directory INSIDE Magento pub/media so Magento's path check passes
$tmpDir = BP . '/pub/media/tmp/pvimport';
if (!is_dir($tmpDir)) { mkdir($tmpDir, 0775, true); }

$totalUpdated = 0;
$totalFailed  = 0;

function pvDownloadImage(string $url, string $dest): bool {
    if (!function_exists('curl_init')) {
        $data = @file_get_contents($url, false, stream_context_create([
            'http' => ['timeout' => 20, 'user_agent' => 'Mozilla/5.0 PVModern/3.0'],
        ]));
        if ($data === false || strlen((string) $data) < 100) return false;
        file_put_contents($dest, $data);
        return true;
    }
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT        => 25,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (X11; Linux x86_64) PVModern/3.0',
        CURLOPT_HTTPHEADER     => ['Accept: image/*,*/*'],
    ]);
    $data = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($data === false || $code < 200 || $code >= 400 || strlen((string) $data) < 100) return false;
    file_put_contents($dest, $data);
    return true;
}

foreach ($imageMap as $sku => $imgData) {
    try {
        $product = $productRepository->get($sku, true, null, true);
    } catch (\Throwable $e) {
        echo "  SKIP  $sku — not found in catalog\n";
        continue;
    }

    $url       = $imgData['url'];
    $label     = $imgData['label'];
    $safeName  = preg_replace('/[^a-zA-Z0-9_-]/', '_', $sku);
    $ext       = 'png';
    $tmpFile   = $tmpDir . '/' . $safeName . '.' . $ext;

    if (!pvDownloadImage($url, $tmpFile)) {
        echo "  FAIL  $sku — download failed ($url)\n";
        $totalFailed++;
        continue;
    }

    try {
        // Remove existing gallery images
        $existingImages = $product->getMediaGalleryImages();
        foreach ($existingImages as $img) {
            try { $imageProcessor->removeImage($product, $img->getFile()); } catch (\Throwable $e2) {}
        }
        // Assign new image to all roles
        $imageProcessor->addImage($product, $tmpFile, ['image', 'small_image', 'thumbnail'], false, false);
        $imageProcessor->updateImage($product, $tmpFile, ['label' => $label]);
        $product->setStoreId(0);
        $productRepository->save($product);
        echo "  OK    $sku — \"{$label}\"\n";
        $totalUpdated++;
    } catch (\Throwable $e) {
        echo "  ERROR $sku — " . $e->getMessage() . "\n";
        $totalFailed++;
    }

    @unlink($tmpFile);
}

// Cleanup
foreach (glob($tmpDir . '/*') as $f) { @unlink($f); }
@rmdir($tmpDir);

echo "\n== Done: $totalUpdated updated, $totalFailed failed ==\n";
