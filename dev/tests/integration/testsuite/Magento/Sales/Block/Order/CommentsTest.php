<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Sales\Block\Order;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Order;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CommentsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Sales\Block\Order\Comments
     */
    protected $_block;

    protected function setUp(): void
    {
        $this->_block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Sales\Block\Order\Comments::class
        );
    }

    /**
     * @param string $commentedEntity
     * @param string $expectedClass
<<<<<<< HEAD
     */
    #[DataProvider('getCommentsDataProvider')]
=======
     * @dataProvider getCommentsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetComments($commentedEntity, $expectedClass)
    {
        $commentedEntity = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create($commentedEntity);
        $this->_block->setEntity($commentedEntity);
        $comments = $this->_block->getComments();
        $this->assertInstanceOf($expectedClass, $comments);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getCommentsDataProvider(): array
=======
    public function getCommentsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                \Magento\Sales\Model\Order\Invoice::class,
                \Magento\Sales\Model\ResourceModel\Order\Invoice\Comment\Collection::class,
            ],
            [
                \Magento\Sales\Model\Order\Creditmemo::class,
                \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Comment\Collection::class
            ],
            [
                \Magento\Sales\Model\Order\Shipment::class,
                \Magento\Sales\Model\ResourceModel\Order\Shipment\Comment\Collection::class
            ]
        ];
    }

    /**
     */
    public function testGetCommentsWrongEntityException()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $entity = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\Product::class
        );
        $this->_block->setEntity($entity);
        $this->_block->getComments();
    }
}
