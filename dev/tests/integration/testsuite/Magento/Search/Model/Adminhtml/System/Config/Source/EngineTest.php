<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Search\Model\Adminhtml\System\Config\Source;

/**
 * @magentoAppArea adminhtml
 */
class EngineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Search\Model\Adminhtml\System\Config\Source\Engine
     */
    protected $_model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Search\Model\Adminhtml\System\Config\Source\Engine::class
        );
    }

    public function testToOptionArray()
    {
        $options = $this->_model->toOptionArray();
        $this->assertNotEmpty($options);

        foreach ($options as $option) {
            $this->assertArrayHasKey('label', $option);
            $this->assertArrayHasKey('value', $option);
        }
    }
}
