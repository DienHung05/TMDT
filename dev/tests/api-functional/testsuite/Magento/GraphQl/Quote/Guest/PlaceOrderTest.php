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
declare(strict_types=1);

namespace Magento\GraphQl\Quote\Guest;

<<<<<<< HEAD
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Catalog\Test\Fixture\ProductStock as ProductStockFixture;
use Magento\Checkout\Test\Fixture\SetBillingAddress as SetBillingAddressFixture;
use Magento\Checkout\Test\Fixture\SetDeliveryMethod as SetDeliveryMethodFixture;
use Magento\Checkout\Test\Fixture\SetGuestEmail as SetGuestEmailFixture;
use Magento\Checkout\Test\Fixture\SetPaymentMethod as SetPaymentMethodFixture;
use Magento\Checkout\Test\Fixture\SetShippingAddress as SetShippingAddressFixture;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;
use Magento\GiftMessage\Test\Fixture\GiftMessage;
use Magento\Indexer\Test\Fixture\Indexer;
use Magento\Quote\Model\QuoteIdToMaskedQuoteIdInterface;
use Magento\Quote\Test\Fixture\AddProductToCart as AddProductToCartFixture;
use Magento\Quote\Test\Fixture\CustomerCart;
use Magento\Quote\Test\Fixture\GuestCart as GuestCartFixture;
use Magento\Quote\Test\Fixture\QuoteIdMask;
use Magento\QuoteGraphQl\Model\ErrorMapper;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\OrderFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQl\ResponseContainsErrorsException;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use Magento\OfflinePayments\Model\Checkmo;
=======
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;
use Magento\GraphQl\Quote\GetMaskedQuoteIdByReservedOrderId;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\OrderFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for placing an order for guest
 */
class PlaceOrderTest extends GraphQlAbstract
{
    /**
<<<<<<< HEAD
=======
     * @var GetMaskedQuoteIdByReservedOrderId
     */
    private $getMaskedQuoteIdByReservedOrderId;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var CollectionFactory
     */
    private $orderCollectionFactory;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var OrderFactory
     */
    private $orderFactory;

    /**
<<<<<<< HEAD
     * @var QuoteIdToMaskedQuoteIdInterface
     */
    private $quoteIdToMaskedQuoteIdInterface;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
<<<<<<< HEAD
        $this->quoteIdToMaskedQuoteIdInterface = $objectManager->get(QuoteIdToMaskedQuoteIdInterface::class);
        $this->orderFactory = $objectManager->get(OrderFactory::class);
        $this->orderCollectionFactory = $objectManager->get(CollectionFactory::class);
        $this->orderRepository = $objectManager->get(OrderRepositoryInterface::class);
=======
        $this->getMaskedQuoteIdByReservedOrderId = $objectManager->get(GetMaskedQuoteIdByReservedOrderId::class);
        $this->orderCollectionFactory = $objectManager->get(CollectionFactory::class);
        $this->orderRepository = $objectManager->get(OrderRepositoryInterface::class);
        $this->orderFactory = $objectManager->get(OrderFactory::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->registry = $objectManager->get(Registry::class);
        /** @var ScopeConfigInterface $scopeConfig */
        $scopeConfig = $objectManager->get(ScopeConfigInterface::class);
        $scopeConfig->clean();
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/banktransfer/active', '1', 'store', 'default'),
        Config('payment/cashondelivery/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        Config('payment/purchaseorder/active', '1', 'store', 'default'),
        Config('customer/create_account/auto_group_assign', '0', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrder()
    {
        $reservedOrderId = 'test_quote';
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
=======
    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 0
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrder()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $query = $this->getQuery($maskedQuoteId);
        $response = $this->graphQlMutation($query);

        self::assertArrayHasKey('placeOrder', $response);
        self::assertArrayHasKey('order_number', $response['placeOrder']['order']);
<<<<<<< HEAD
        self::assertArrayHasKey('number', $response['placeOrder']['orderV2']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['orderV2']['number']);
=======
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $orderIncrementId = $response['placeOrder']['order']['order_number'];
        $order = $this->orderFactory->create();
        $order->loadByIncrementId($orderIncrementId);
        $this->assertNotEmpty($order->getEmailSent());
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/banktransfer/active', '1', 'store', 'default'),
        Config('payment/cashondelivery/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        Config('payment/purchaseorder/active', '1', 'store', 'default'),
        Config('customer/create_account/auto_group_assign', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithAutoGroup()
    {
        $reservedOrderId = 'test_quote';
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
=======
    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrderWithAutoGroup()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $query = $this->getQuery($maskedQuoteId);
        $response = $this->graphQlMutation($query);

        self::assertArrayHasKey('placeOrder', $response);
        self::assertArrayHasKey('order_number', $response['placeOrder']['order']);
<<<<<<< HEAD
        self::assertArrayHasKey('number', $response['placeOrder']['orderV2']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['orderV2']['number']);
=======
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $orderIncrementId = $response['placeOrder']['order']['order_number'];
        $order = $this->orderFactory->create();
        $order->loadByIncrementId($orderIncrementId);
        $this->assertNotEmpty($order->getEmailSent());
    }

<<<<<<< HEAD
    #[
        Config('customer/create_account/auto_group_assign', '0', 'store', 'default'),
    ]
=======
    /**
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 0
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPlaceOrderIfCartIdIsEmpty()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Required parameter "cart_id" is missing');

        $maskedQuoteId = '';
        $query = $this->getQuery($maskedQuoteId);

        $this->graphQlMutation($query);
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/banktransfer/active', '1', 'store', 'default'),
        Config('payment/cashondelivery/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        Config('payment/purchaseorder/active', '1', 'store', 'default'),
        Config('customer/create_account/auto_group_assign', '0', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithNoEmail()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Guest email for cart is missing.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_GUEST_EMAIL_MISSING,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithNoItemsInCart()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: A server error stopped your order from being placed.' .
                ' Please try to place your order again',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
    ]
    public function testPlaceOrderWithNoShippingAddress()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Some addresses can\'t be used due to the' .
                ' configurations for specific countries.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithNoShippingMethod()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: The shipping method is missing. Select the shipping method and try again.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithNoBillingAddress()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Please check the billing address information. ' .
                '"firstname" is required. Enter and try again. "lastname" is required. Enter and try again. ' .
                '"street" is required. Enter and try again. "city" is required. Enter and try again. ' .
                '"telephone" is required. Enter and try again. "postcode" is required. Enter and try again. ' .
                '"countryId" is required. Enter and try again.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithNoPaymentMethod()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Enter a valid payment method and try again.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('cataloginventory/options/enable_inventory_check', 1),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(
            ProductStockFixture::class,
            [
                'prod_id' => '$product.id$',
                'is_in_stock' => 0,
                'prod_qty' => 0
            ],
            'prodStock'
        ),
    ]
    public function testPlaceOrderWithOutOfStockProduct()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Some of the products are out of stock.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('cataloginventory/options/enable_inventory_check', 0),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(
            ProductStockFixture::class,
            [
                'prod_id' => '$product.id$',
                'is_in_stock' => 0,
                'prod_qty' => 0
            ],
            'prodStock'
        )
    ]
    public function testPlaceOrderWithOutOfStockProductWithDisabledInventoryCheck()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query);
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Enter a valid payment method and try again.',
                $exceptionData['errors'][0]['message']
            );
            self::assertEquals(
                ErrorMapper::ERROR_UNABLE_TO_PLACE_ORDER,
                $exceptionData['errors'][0]['extensions']['error_code']
            );
        }
    }

    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/banktransfer/active', '1', 'store', 'default'),
        Config('payment/cashondelivery/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        Config('payment/purchaseorder/active', '1', 'store', 'default'),
        Config('customer/create_account/auto_group_assign', '0', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Customer::class, as: 'customer'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(CustomerCart::class, ['customer_id' => '$customer.id$'], as: 'cart'),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderOfCustomerCart()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
=======
    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 0
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     *
     */
    public function testPlaceOrderWithNoEmail()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Guest email for cart is missing.');

        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        $this->graphQlMutation($query);
    }

    /**
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     */
    public function testPlaceOrderWithNoItemsInCart()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage(
            'Unable to place order: A server error stopped your order from being placed. ' .
            'Please try to place your order again'
        );
        $this->graphQlMutation($query);
    }

    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     */
    public function testPlaceOrderWithNoShippingAddress()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage(
            'Unable to place order: Some addresses can\'t be used due to the configurations for specific countries'
        );
        $this->graphQlMutation($query);
    }

    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     */
    public function testPlaceOrderWithNoShippingMethod()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage(
            'Unable to place order: The shipping method is missing. Select the shipping method and try again'
        );
        $this->graphQlMutation($query);
    }

    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     */
    public function testPlaceOrderWithNoBillingAddress()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessageMatches(
            '/Unable to place order: Please check the billing address information*/'
        );
        $this->graphQlMutation($query);
    }

    /**
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     */
    public function testPlaceOrderWithNoPaymentMethod()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage('Unable to place order: Enter a valid payment method and try again');
        $this->graphQlMutation($query);
    }

    /**
     * @magentoConfigFixture cataloginventory/options/enable_inventory_check 1
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/set_simple_product_out_of_stock.php
     */
    public function testPlaceOrderWithOutOfStockProduct()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage('Unable to place order: Some of the products are out of stock');
        $this->graphQlMutation($query);
    }

    /**
     * @magentoConfigFixture cataloginventory/options/enable_inventory_check 0
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/set_simple_product_out_of_stock.php
     */
    public function testPlaceOrderWithOutOfStockProductWithDisabledInventoryCheck()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage('Unable to place order: Enter a valid payment method and try again.');
        $this->graphQlMutation($query);
    }

    /**
     * _security
     * @magentoApiDataFixture Magento/Customer/_files/three_customers.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 0
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrderOfCustomerCart()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessageMatches('/The current user cannot perform operations on cart*/');
        $this->graphQlMutation($query);
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/banktransfer/active', '1', 'store', 'default'),
        Config('payment/cashondelivery/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        Config('payment/purchaseorder/active', '1', 'store', 'default'),
        Config('sales/gift_options/allow_order', 1),
        Config('customer/create_account/auto_group_assign', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GiftMessage::class, as: 'message'),
        DataFixture(
            GuestCartFixture::class,
            [
                'reserved_order_id' => 'test_quote',
                'message_id' => '$message.id$'
            ],
            'cart'
        ),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderWithGiftMessage()
    {
        $reservedOrderId = 'test_quote';
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
=======
    /**
     * Test place order with gift message options
     *
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoConfigFixture sales/gift_options/allow_order 1
     * @magentoConfigFixture default_store customer/create_account/auto_group_assign 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/set_guest_email.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_gift_options.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrderWithGiftMessage()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query = $this->getQuery($maskedQuoteId);
        $response = $this->graphQlMutation($query);

        self::assertArrayHasKey('placeOrder', $response);
        self::assertArrayHasKey('order_number', $response['placeOrder']['order']);
<<<<<<< HEAD
        self::assertArrayHasKey('number', $response['placeOrder']['orderV2']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['orderV2']['number']);
=======
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $orderIncrementId = $response['placeOrder']['order']['order_number'];
        $order = $this->orderFactory->create();
        $order->loadByIncrementId($orderIncrementId);
        $this->assertNotEmpty($order->getGiftMessageId());
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('carriers/tablerate/active', '1', 'store', 'default'),
        Config('carriers/freeshipping/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(
            SetPaymentMethodFixture::class,
            ['cart_id' => '$cart.id$', 'method' => Checkmo::PAYMENT_METHOD_CHECKMO_CODE]
        ),
        Config('payment/checkmo/active', '0', 'store', 'default'),
    ]
    public function testSetPreviouslyAddedPaymentMethodAfterItWasDisabled()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int)$cart->getId());

        $query = $this->setPaymentMethodQuery($maskedQuoteId, Checkmo::PAYMENT_METHOD_CHECKMO_CODE);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The requested Payment Method is not available.');
        $this->graphQlMutation($query);
    }

    /**
     * @param string $maskedQuoteId
     * @param string $methodCode
     * @return string
     */
    private function setPaymentMethodQuery(string $maskedQuoteId, string $methodCode): string
    {
        return <<<QUERY
mutation {
  setPaymentMethodOnCart(input: {
    cart_id: "{$maskedQuoteId}",
    payment_method: { code: "{$methodCode}" }
  }) {
    cart {
      selected_payment_method { code }
    }
  }
}
QUERY;
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @param string $maskedQuoteId
     * @return string
     */
    private function getQuery(string $maskedQuoteId): string
    {
        return <<<QUERY
mutation {
  placeOrder(input: {cart_id: "{$maskedQuoteId}"}) {
    order {
      order_number
    }
<<<<<<< HEAD
    orderV2 {
      number
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
  }
}
QUERY;
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        $this->registry->unregister('isSecureArea');
        $this->registry->register('isSecureArea', true);

        $orderCollection = $this->orderCollectionFactory->create();
        foreach ($orderCollection as $order) {
            $this->orderRepository->delete($order);
        }
        $this->registry->unregister('isSecureArea');
        $this->registry->register('isSecureArea', false);

        parent::tearDown();
    }
}
