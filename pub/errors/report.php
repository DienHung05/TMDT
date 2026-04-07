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

require_once 'processorFactory.php';

$processorFactory = new \Magento\Framework\Error\ProcessorFactory();
$processor = $processorFactory->createProcessor();

if (isset($reportData) && is_array($reportData)) {
    $reportUrl = $processor->saveReport($reportData);
    if (headers_sent()) {
        echo '<script type="text/javascript">';
        echo "window.location.href = '{$reportUrl}';";
        echo '</script>';
        exit;
    }
}

$response = $processor->processReport();
$response->sendResponse();
