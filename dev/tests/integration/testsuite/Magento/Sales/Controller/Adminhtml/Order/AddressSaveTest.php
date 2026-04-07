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
declare(strict_types=1);

namespace Magento\Sales\Controller\Adminhtml\Order;

use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Sales\Api\Data\OrderAddressInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderInterfaceFactory;
use Magento\Sales\Api\OrderAddressRepositoryInterface;
use Magento\Sales\Model\Order\Address as AddressType;
use Magento\TestFramework\TestCase\AbstractBackendController;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class check address save action
 *
 * @see \Magento\Sales\Controller\Adminhtml\Order\AddressSave
 *
 * @magentoDbIsolation disabled
 * @magentoAppArea adminhtml
 */
class AddressSaveTest extends AbstractBackendController
{
    /** @var OrderInterfaceFactory */
    private $orderFactory;

    /** @var OrderAddressRepositoryInterface */
    private $orderAddressRepository;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->orderFactory = $this->_objectManager->get(OrderInterfaceFactory::class);
        $this->orderAddressRepository = $this->_objectManager->get(OrderAddressRepositoryInterface::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider addressTypeProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Sales/_files/order.php
     *
     * @param string $type
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('addressTypeProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSave(string $type): void
    {
        $data = [
            OrderAddressInterface::FIRSTNAME => 'New test name',
            OrderAddressInterface::LASTNAME => 'New test lastname',
            OrderAddressInterface::STREET => ['new test street'],
            OrderAddressInterface::CITY => 'New Test City',
            OrderAddressInterface::COUNTRY_ID => 'UA',
            OrderAddressInterface::REGION => '1111',
            OrderAddressInterface::POSTCODE => '97203',
            OrderAddressInterface::TELEPHONE => '5555555555',
        ];
        $order = $this->orderFactory->create()->loadByIncrementId(100000001);
        $addressId = $this->getAddressIdByType($order, $type);
        $this->dispatchWithParams(
            ['address_id' => $addressId],
            $data
        );
        $this->assertSessionMessages(
            $this->containsEqual((string)__('You updated the order address.'))
        );
        $this->assertRedirect(
            $this->stringContains(sprintf('sales/order/view/order_id/%s/', $order->getId()))
        );
        $this->assertAddressData($addressId, $data);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function addressTypeProvider(): array
=======
    public function addressTypeProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'billing_address' => [
                AddressType::TYPE_BILLING,
            ],
            'shipping_address' => [
                AddressType::TYPE_SHIPPING,
            ]
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider wrongRequestDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $params
     * @param array $post
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('wrongRequestDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testInvalidRequest(array $params, array $post = []): void
    {
        $this->dispatchWithParams($params, $post);
        $this->assertRedirect($this->stringContains('backend/sales/order/index/'));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function wrongRequestDataProvider(): array
=======
    public function wrongRequestDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'empty_post' => [
                ['address_id' => 1],
            ],
            'wrong_address_id' => [
                ['address_id' => 7852147],
            ],
        ];
    }

    /**
     * Check updated address data
     *
     * @param int $addressId
     * @param array $expectedData
     * @return void
     */
    private function assertAddressData(int $addressId, array $expectedData): void
    {
        $address = $this->orderAddressRepository->get($addressId);
        foreach ($expectedData as $key => $value) {
            $key === OrderAddressInterface::STREET
                ? $this->assertEquals(reset($value), $address->getData($key))
                : $this->assertEquals($value, $address->getData($key));
        }
    }

    /**
     * Get address id by address type
     *
     * @param OrderInterface $order
     * @param string $type
     * @return int
     */
    private function getAddressIdByType(OrderInterface $order, string $type): int
    {
        return $type === AddressType::TYPE_BILLING
            ? (int)$order->getBillingAddressId()
            : (int)$order->getShippingAddressId();
    }

    /**
     * Dispatch with params
     *
     * @param array $params
     * @param array $post
     * @return void
     */
    private function dispatchWithParams(array $params, array $post): void
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setParams($params);
        $this->getRequest()->setPostValue($post);
        $this->dispatch('backend/sales/order/addressSave');
    }
}
