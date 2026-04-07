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

namespace Magento\Customer\Block\Address;

<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\TestFramework\Helper\Bootstrap;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Integration tests for the \Magento\Customer\Block\Address\Grid class
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GridTest extends \PHPUnit\Framework\TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var \Magento\Framework\View\LayoutInterface
     */
    private $layout;

    /**
     * @var \Magento\Customer\Helper\Session\CurrentCustomer
     */
    protected $currentCustomer;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $blockMock = $this->createPartialMockWithReflection(
            \Magento\Framework\View\Element\BlockInterface::class,
            ['setTitle', 'toHtml']
        );
=======
        /** @var \PHPUnit\Framework\MockObject\MockObject $blockMock */
        $blockMock = $this->getMockBuilder(
            \Magento\Framework\View\Element\BlockInterface::class
        )->disableOriginalConstructor()->setMethods(
            ['setTitle', 'toHtml']
        )->getMock();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $blockMock->expects($this->any())->method('setTitle');

        $this->currentCustomer = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Customer\Helper\Session\CurrentCustomer::class);
        $this->layout = Bootstrap::getObjectManager()->get(\Magento\Framework\View\LayoutInterface::class);
        $this->layout->setBlock('head', $blockMock);
    }

    protected function tearDown(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var \Magento\Customer\Model\CustomerRegistry $customerRegistry */
        $customerRegistry = $objectManager->get(\Magento\Customer\Model\CustomerRegistry::class);
        // Cleanup customer from registry
        $customerRegistry->remove(1);
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoAppIsolation enabled
     */
    public function testGetAddressEditUrl()
    {
        $gridBlock = $this->createBlockForCustomer(1);

        $this->assertEquals(
            'http://localhost/index.php/customer/address/edit/id/1/',
            $gridBlock->getAddressEditUrl(1)
        );
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_two_addresses.php
     * @magentoAppIsolation enabled
     */
    public function testGetAdditionalAddresses()
    {
        $gridBlock = $this->createBlockForCustomer(1);
        $this->assertNotNull($gridBlock->getAdditionalAddresses());
        $this->assertCount(1, $gridBlock->getAdditionalAddresses());
        $this->assertInstanceOf(
            \Magento\Customer\Api\Data\AddressInterface::class,
            $gridBlock->getAdditionalAddresses()[0]
        );
        $this->assertEquals(2, $gridBlock->getAdditionalAddresses()[0]->getId());
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
<<<<<<< HEAD
     * @magentoAppIsolation enabled
     */
    #[DataProvider('getAdditionalAddressesDataProvider')]
=======
     * @dataProvider getAdditionalAddressesDataProvider
     * @magentoAppIsolation enabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAdditionalAddressesNegative($customerId, $expected)
    {
        $gridBlock = $this->createBlockForCustomer($customerId);
        $this->currentCustomer->setCustomerId($customerId);
        $this->assertEquals($expected, $gridBlock->getAdditionalAddresses());
    }

<<<<<<< HEAD
    public static function getAdditionalAddressesDataProvider()
=======
    public function getAdditionalAddressesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ['5' => [5, []]];
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
     * @magentoAppIsolation enabled
     */
    public function testGetAddressHtmlWithoutAddress()
    {
        $gridBlock = $this->createBlockForCustomer(5);
        $this->assertEquals('', $gridBlock->getAddressHtml(null));
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoAppIsolation enabled
     */
    public function testGetCustomer()
    {
        $gridBlock = $this->createBlockForCustomer(1);
        /** @var CustomerRepositoryInterface $customerRepository */
        $customerRepository = Bootstrap::getObjectManager()->get(
            \Magento\Customer\Api\CustomerRepositoryInterface::class
        );
        $customer = $customerRepository->getById(1);
        $object = $gridBlock->getCustomer();
        $this->assertEquals($customer, $object);
    }

    /**
     * Create address book block for customer
     *
     * @param int $customerId
     * @return \Magento\Framework\View\Element\BlockInterface
     */
    private function createBlockForCustomer($customerId)
    {
        $this->currentCustomer->setCustomerId($customerId);
        return $this->layout->createBlock(
            \Magento\Customer\Block\Address\Grid::class,
            '',
            ['currentCustomer' => $this->currentCustomer]
        );
    }
}
