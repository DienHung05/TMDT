<?php
/**
<<<<<<< HEAD
 * Copyright 2011 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
/**
 * Public media files entry point
 */
// phpcs:disable Magento2.Functions.DiscouragedFunction.DiscouragedWithAlternative
// phpcs:disable Magento2.Functions.DiscouragedFunction.Discouraged
// phpcs:disable Magento2.Security.IncludeFile.FoundIncludeFile
// phpcs:disable Magento2.Security.LanguageConstruct.ExitUsage

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Cache\Frontend\Factory;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\Stdlib\Cookie\PhpCookieReader;

require dirname(__DIR__) . '/app/bootstrap.php';

$mediaDirectory = null;
$allowedResources = [];
$configCacheFile = BP . '/var/resource_config.json';

$isAllowed = function ($resource, array $allowedResources) {
    foreach ($allowedResources as $allowedResource) {
        if (0 === stripos($resource, $allowedResource)) {
            return true;
        }
    }
    return false;
};

$createBootstrap = function (array $params = []) {
    // phpcs:ignore Magento2.Security.Superglobal.SuperglobalUsageWarning
    $params = array_merge($_SERVER, $params);

    return Bootstrap::create(BP, $params);
};

$request = new \Magento\MediaStorage\Model\File\Storage\Request(
    new Request(
        new PhpCookieReader(),
        new Magento\Framework\Stdlib\StringUtils()
    )
);
$relativePath = $request->getPathInfo();
if (file_exists($configCacheFile) && is_readable($configCacheFile)) {
    $config = json_decode(file_get_contents($configCacheFile), true);

<<<<<<< HEAD
    // Checking update time
    if (isset($config['update_time'], $config['media_directory'], $config['allowed_resources'])
        && filemtime($configCacheFile) + $config['update_time'] > time()
    ) {
=======
    //checking update time
    if (filemtime($configCacheFile) + $config['update_time'] > time()) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $mediaDirectory = $config['media_directory'];
        $allowedResources = $config['allowed_resources'];

        // Serve file if it's materialized
        if ($mediaDirectory) {
            $fileAbsolutePath = __DIR__ . '/' . $relativePath;
            $fileRelativePath = str_replace(rtrim($mediaDirectory, '/') . '/', '', $fileAbsolutePath);

            if (!$isAllowed($fileRelativePath, $allowedResources)) {
<<<<<<< HEAD
                require 'errors/404.php';
=======
                require_once 'errors/404.php';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                exit;
            }

            if (is_readable($fileAbsolutePath)) {
                if (is_dir($fileAbsolutePath)) {
<<<<<<< HEAD
                    require 'errors/404.php';
=======
                    require_once 'errors/404.php';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    exit;
                }

                // Need to run for object manager instantiation.
                $createBootstrap();

                $transfer = new \Magento\Framework\File\Transfer\Adapter\Http(
                    new \Magento\Framework\HTTP\PhpEnvironment\Response(),
                    new \Magento\Framework\File\Mime()
                );
                $transfer->send($fileAbsolutePath);
                exit;
            }
        }
    }
}

// Materialize file in application
$params = [];
if (empty($mediaDirectory)) {
    $params[ObjectManagerFactory::INIT_PARAM_DEPLOYMENT_CONFIG] = [];
    $params[Factory::PARAM_CACHE_FORCED_OPTIONS] = ['frontend_options' => ['disable_save' => true]];
}
$bootstrap = $createBootstrap($params);
/** @var \Magento\MediaStorage\App\Media $app */
$app = $bootstrap->createApplication(
    \Magento\MediaStorage\App\Media::class,
    [
        'mediaDirectory' => $mediaDirectory,
        'configCacheFile' => $configCacheFile,
        'isAllowed' => $isAllowed,
        'relativeFileName' => $relativePath,
    ]
);
$bootstrap->run($app);
