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
namespace Magento\Framework\Model\ResourceModel;

class IteratorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Model\ResourceModel\Iterator
     */
    protected $_model;

    /**
     * Counter for testing walk() callback
     *
     * @var int
     */
    protected $_callbackCounter = 0;

    protected function setUp(): void
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Model\ResourceModel\Iterator::class
        );
    }

    public function testWalk()
    {
        $collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Store\Model\ResourceModel\Store\Collection::class
        );
        $this->_model->walk($collection->getSelect(), [[$this, 'walkCallback']]);
        $this->assertGreaterThan(0, $this->_callbackCounter);
    }

    /**
     * Helper callback for testWalk()
     *
     * @param array $data
     * @return bool
     */
    public function walkCallback($data)
    {
        $this->_callbackCounter = $data['idx'];
        return true;
    }

    /**
     */
    public function testWalkException()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $this->_model->walk('test', [[$this, 'walkCallback']]);
    }
}
