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

namespace Magento\Customer\Block\Account\Dashboard;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class address test.
 */
class AddressTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Customer\Block\Account\Dashboard\Address
     */
    protected $_block;

    /** @var  \Magento\Customer\Model\Session */
    protected $_customerSession;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_customerSession = $this->objectManager->get(\Magento\Customer\Model\Session::class);
        $this->_block = $this->objectManager->get(\Magento\Framework\View\LayoutInterface::class)
            ->createBlock(
                \Magento\Customer\Block\Account\Dashboard\Address::class,
                '',
                ['customerSession' => $this->_customerSession]
            );
        $this->objectManager->get(\Magento\Framework\App\ViewInterface::class)->setIsLayoutLoaded(true);
    }

    protected function tearDown(): void
    {
        $this->_customerSession->unsCustomerId();
        /** @var \Magento\Customer\Model\CustomerRegistry $customerRegistry */
        $customerRegistry = $this->objectManager->get(\Magento\Customer\Model\CustomerRegistry::class);
        //Cleanup customer from registry
        $customerRegistry->remove(1);
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testGetCustomer()
    {
        $objectManager = Bootstrap::getObjectManager();
        $layout = $objectManager->get(\Magento\Framework\View\LayoutInterface::class);
        $layout->setIsCacheable(false);
        /** @var CustomerRepositoryInterface $customerRepository */
        $customerRepository = $objectManager
            ->get(\Magento\Customer\Api\CustomerRepositoryInterface::class);
        $customer = $customerRepository->getById(1);
        $this->_customerSession->setCustomerId(1);
        $object = $this->_block->getCustomer();
        $this->assertEquals($customer, $object);
        $layout->setIsCacheable(true);
    }

    public function testGetCustomerMissingCustomer()
    {
        $moduleManager = $this->objectManager->get(\Magento\Framework\Module\Manager::class);
        if ($moduleManager->isEnabled('Magento_PageCache')) {
            $customerDataFactory = $this->objectManager->create(
                \Magento\Customer\Api\Data\CustomerInterfaceFactory::class
            );
            $customerData = $customerDataFactory->create()->setGroupId($this->_customerSession->getCustomerGroupId());
            $this->assertEquals($customerData, $this->_block->getCustomer());
        } else {
            $this->assertNull($this->_block->getCustomer());
        }
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_two_addresses.php
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
<<<<<<< HEAD
     */
    #[DataProvider('getPrimaryShippingAddressHtmlDataProvider')]
=======
     * @dataProvider getPrimaryShippingAddressHtmlDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetPrimaryShippingAddressHtml($customerId, $expected)
    {
        // todo: this test is sensitive to caching impact

        if (!empty($customerId)) {
            $this->_customerSession->setCustomerId($customerId);
        }
        $html = $this->_block->getPrimaryShippingAddressHtml();
        $this->assertEquals($expected, $html);
    }

<<<<<<< HEAD
    public static function getPrimaryShippingAddressHtmlDataProvider()
=======
    public function getPrimaryShippingAddressHtmlDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $expected = "John Smith<br />\nCompanyName<br />\nGreen str, 67<br />\n\n\n\nCityM,  Alabama, 75477<br />"
            . "\nUnited States<br />\nT: <a href=\"tel:3468676\">3468676</a>\n\n";

        return [
            '0' => [0, 'You have not set a default shipping address.'],
            '1' => [1, $expected],
            '5' => [5, 'You have not set a default shipping address.']
        ];
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_two_addresses.php
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
<<<<<<< HEAD
     */
    #[DataProvider('getPrimaryBillingAddressHtmlDataProvider')]
=======
     * @dataProvider getPrimaryBillingAddressHtmlDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetPrimaryBillingAddressHtml($customerId, $expected)
    {
        if (!empty($customerId)) {
            $this->_customerSession->setCustomerId($customerId);
        }
        $html = $this->_block->getPrimaryBillingAddressHtml();
        $this->assertEquals($expected, $html);
    }

<<<<<<< HEAD
    public static function getPrimaryBillingAddressHtmlDataProvider()
=======
    public function getPrimaryBillingAddressHtmlDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $expected = "John Smith<br />\nCompanyName<br />\nGreen str, 67<br />\n\n\n\nCityM,  Alabama, 75477<br />"
            . "\nUnited States<br />\nT: <a href=\"tel:3468676\">3468676</a>\n\n";
        return [
            '0' => [0, 'You have not set a default billing address.'],
            '1' => [1, $expected],
            '5' => [5, 'You have not set a default billing address.'],
        ];
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_two_addresses.php
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
<<<<<<< HEAD
     */
    #[DataProvider('getPrimaryAddressEditUrlDataProvider')]
=======
     * @dataProvider getPrimaryAddressEditUrlDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetPrimaryShippingAddressEditUrl($customerId, $expected)
    {
        if (!empty($customerId)) {
            $this->_customerSession->setCustomerId($customerId);
        }
        $url = $this->_block->getPrimaryShippingAddressEditUrl();
        $this->assertEquals($expected, $url);
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_two_addresses.php
     * @magentoDataFixture Magento/Customer/_files/customer_no_address.php
<<<<<<< HEAD
     */
    #[DataProvider('getPrimaryAddressEditUrlDataProvider')]
=======
     * @dataProvider getPrimaryAddressEditUrlDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetPrimaryBillingAddressEditUrl($customerId, $expected)
    {
        if (!empty($customerId)) {
            $this->_customerSession->setCustomerId($customerId);
        }
        $url = $this->_block->getPrimaryBillingAddressEditUrl();
        $this->assertEquals($expected, $url);
    }

<<<<<<< HEAD
    public static function getPrimaryAddressEditUrlDataProvider()
=======
    public function getPrimaryAddressEditUrlDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            '1' => [1, 'http://localhost/index.php/customer/address/edit/id/1/'],
        ];
    }
}
