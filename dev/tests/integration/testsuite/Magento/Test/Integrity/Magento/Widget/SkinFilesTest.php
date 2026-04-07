<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Test\Integrity\Magento\Widget;

use PHPUnit\Framework\Attributes\DataProvider;

class SkinFilesTest extends \PHPUnit\Framework\TestCase
{
    #[DataProvider('widgetPlaceholderImagesDataProvider')]
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Magento\Widget;

class SkinFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider widgetPlaceholderImagesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testWidgetPlaceholderImages($skinImage)
    {
        /** @var \Magento\Framework\View\Asset\Repository $assetRepo */
        $assetRepo = \Magento\TestFramework\Helper\Bootstrap::getObjectmanager()
            ->get(\Magento\Framework\View\Asset\Repository::class);
        $this->assertFileExists(
            $assetRepo->createAsset($skinImage, ['area' => 'adminhtml'])->getSourceFile()
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function widgetPlaceholderImagesDataProvider()
=======
    public function widgetPlaceholderImagesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $result = [];
        /** @var $model \Magento\Widget\Model\Widget */
        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Widget\Model\Widget::class
        );
        foreach ($model->getWidgetsArray() as $row) {
            /** @var $instance \Magento\Widget\Model\Widget\Instance */
            $instance = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
                \Magento\Widget\Model\Widget\Instance::class
            );
            $config = $instance->setType($row['type'])->getWidgetConfigAsArray();
            if (isset($config['placeholder_image'])) {
                $result[] = [(string)$config['placeholder_image']];
            }
        }
        return $result;
    }
}
