<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Widget\Model;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Widget\Model;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class WidgetTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Widget\Model\Widget
     */
    protected $_model = null;

    protected function setUp(): void
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Widget\Model\Widget::class
        );
    }

    public function testGetWidgetsArray()
    {
        $declaredWidgets = $this->_model->getWidgetsArray();
        $this->assertNotEmpty($declaredWidgets);
        $this->assertIsArray($declaredWidgets);
        foreach ($declaredWidgets as $row) {
            $this->assertArrayHasKey('name', $row);
            $this->assertArrayHasKey('code', $row);
            $this->assertArrayHasKey('type', $row);
            $this->assertArrayHasKey('description', $row);
        }
    }

    /**
     * @param string $type
     * @param string $expectedFile
     * @return string
<<<<<<< HEAD
     * @magentoAppIsolation enabled
     */
    #[DataProvider('getPlaceholderImageUrlDataProvider')]
=======
     *
     * @dataProvider getPlaceholderImageUrlDataProvider
     * @magentoAppIsolation enabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetPlaceholderImageUrl($type, $expectedFile)
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        \Magento\TestFramework\Helper\Bootstrap::getInstance()
            ->loadArea(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE);
        $objectManager->get(\Magento\Framework\View\DesignInterface::class)->setDesignTheme('Magento/backend');
        $expectedFilePath = "/adminhtml/Magento/backend/en_US/{$expectedFile}";

        $url = $this->_model->getPlaceholderImageUrl($type);
        $this->assertStringEndsWith($expectedFilePath, $url);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getPlaceholderImageUrlDataProvider()
=======
    public function getPlaceholderImageUrlDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'custom image' => [\Magento\Catalog\Block\Product\Widget\NewWidget::class,
                'Magento_Catalog/images/product_widget_new.png',
            ],
            'default image' => ['non_existing_widget_type', 'Magento_Widget/placeholder.png']
        ];
    }
}
