<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

$rewritesData = [
    [
        'string', 'test_page1', 0
    ],
    [
        'string_permanent', 'test_page1', \Magento\UrlRewrite\Model\OptionProvider::PERMANENT
    ],
    [
        'string_temporary', 'test_page1', \Magento\UrlRewrite\Model\OptionProvider::TEMPORARY
    ],
    [
        'строка', 'test_page1', 0
    ],
    [
        urlencode('строка'), 'test_page2', 0
    ],
    [
        'другая_строка', 'test_page1', \Magento\UrlRewrite\Model\OptionProvider::TEMPORARY
    ],
    [
        'السلسلة', 'test_page1', 0
    ],
];

$rewriteResource = $objectManager->create(\Magento\UrlRewrite\Model\ResourceModel\UrlRewrite::class);
foreach ($rewritesData as $rewriteData) {
    list ($requestPath, $targetPath, $redirectType) = $rewriteData;
    $rewrite = $objectManager->create(\Magento\UrlRewrite\Model\UrlRewrite::class);
    $rewrite->setEntityType('custom')
        ->setRequestPath($requestPath)
        ->setTargetPath($targetPath)
        ->setRedirectType($redirectType);
    $rewriteResource->save($rewrite);
}
