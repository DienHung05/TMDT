<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Sales\Block\Adminhtml\Order\Create;

use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
class HeaderTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Sales\Block\Adminhtml\Order\Create\Header */
    protected $_block;

    protected function setUp(): void
    {
        $this->_block = Bootstrap::getObjectManager()->create(
            \Magento\Sales\Block\Adminhtml\Order\Create\Header::class
        );
        parent::setUp();
    }

    /**
     * @param int|null $customerId
     * @param int|null $storeId
     * @param string $expectedResult
     * @magentoDataFixture Magento/Customer/_files/customer.php
<<<<<<< HEAD
     */
    #[DataProvider('toHtmlDataProvider')]
=======
     * @dataProvider toHtmlDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testToHtml($customerId, $storeId, $expectedResult)
    {
        /** @var \Magento\Backend\Model\Session\Quote $session */
        $session = Bootstrap::getObjectManager()->get(\Magento\Backend\Model\Session\Quote::class);
        $session->setCustomerId($customerId);
        $session->setStoreId($storeId);
        $this->assertEquals($expectedResult, $this->_block->toHtml());
    }

<<<<<<< HEAD
    public static function toHtmlDataProvider(): array
=======
    public function toHtmlDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $customerIdFromFixture = 1;
        $defaultStoreView = 1;
        return [
            'Customer and store' => [
                $customerIdFromFixture,
                $defaultStoreView,
                'Create New Order for John Smith in Default Store View',
            ],
            'No store' => [$customerIdFromFixture, null, 'Create New Order for John Smith'],
            'No customer' => [null, $defaultStoreView, 'Create New Order in Default Store View'],
            'No customer, no store' => [null, null, 'Create New Order for New Customer']
        ];
    }
}
