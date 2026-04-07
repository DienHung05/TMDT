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

namespace Magento\GraphQl\Quote\Customer;

<<<<<<< HEAD
use Magento\Catalog\Test\Fixture\ProductStock as ProductStockFixture;
use Magento\Checkout\Test\Fixture\SetGuestEmail as SetGuestEmailFixture;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\Registry;
use Magento\Indexer\Test\Fixture\Indexer;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\Quote\Model\QuoteIdToMaskedQuoteIdInterface;
use Magento\Quote\Test\Fixture\CustomerCart;
use Magento\Quote\Test\Fixture\GuestCart as GuestCartFixture;
use Magento\Quote\Test\Fixture\QuoteIdMask;
use Magento\QuoteGraphQl\Model\ErrorMapper;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQl\ResponseContainsErrorsException;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use Magento\Checkout\Test\Fixture\SetBillingAddress as SetBillingAddressFixture;
use Magento\Checkout\Test\Fixture\SetDeliveryMethod as SetDeliveryMethodFixture;
use Magento\Checkout\Test\Fixture\SetPaymentMethod as SetPaymentMethodFixture;
use Magento\Checkout\Test\Fixture\SetShippingAddress as SetShippingAddressFixture;
use Magento\Quote\Test\Fixture\AddProductToCart as AddProductToCartFixture;
=======
use Exception;
use Magento\Framework\Registry;
use Magento\GraphQl\Quote\GetMaskedQuoteIdByReservedOrderId;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for placing an order for customer
 */
class PlaceOrderTest extends GraphQlAbstract
{
    /**
     * @var CustomerTokenServiceInterface
     */
    private $customerTokenService;

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
=======
        $this->getMaskedQuoteIdByReservedOrderId = $objectManager->get(GetMaskedQuoteIdByReservedOrderId::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->customerTokenService = $objectManager->get(CustomerTokenServiceInterface::class);
        $this->orderCollectionFactory = $objectManager->get(CollectionFactory::class);
        $this->orderRepository = $objectManager->get(OrderRepositoryInterface::class);
        $this->registry = Bootstrap::getObjectManager()->get(Registry::class);
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
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrder()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $response = $this->graphQlMutation($query, [], '', $this->getHeaderMap());

        self::assertArrayHasKey('placeOrder', $response);
        self::assertArrayHasKey('order_number', $response['placeOrder']['order']);
        self::assertEquals($reservedOrderId, $response['placeOrder']['order']['order_number']);
    }

<<<<<<< HEAD
    #[
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
    ]
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPlaceOrderIfCartIdIsEmpty()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Required parameter "cart_id" is missing');

        $maskedQuoteId = '';
        $query = $this->getQuery($maskedQuoteId);

        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

<<<<<<< HEAD
    #[
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithNoItemsInCart(): void
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);
        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithNoShippingAddress()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Some addresses can\'t be used' .
                ' due to the configurations for specific countries.',
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithNoShippingMethod()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithNoBillingAddress()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
        } catch (ResponseContainsErrorsException $exception) {
            $exceptionData = $exception->getResponseData();
            self::assertEquals(1, count($exceptionData['errors']));
            self::assertEquals(
                'Unable to place order: Please check the billing address information.' .
                ' "firstname" is required. Enter and try again. "lastname" is required. Enter and try again.' .
                ' "street" is required. Enter and try again. "city" is required. ' .
                'Enter and try again. "telephone" is required. Enter and try again. ' .
                '"postcode" is required. Enter and try again. "countryId" is required. Enter and try again.',
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithNoPaymentMethod()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
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
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithOutOfStockProduct()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
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
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderWithOutOfStockProductWithDisabledInventoryCheck()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        try {
            $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(GuestCartFixture::class, ['reserved_order_id' => 'test_quote'], as: 'cart'),
        DataFixture(SetGuestEmailFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
    ]
    public function testPlaceOrderOfGuestCart()
    {
        $cart = DataFixtureStorageManager::getStorage()->get('cart');
        $maskedQuoteId = $this->quoteIdToMaskedQuoteIdInterface->execute((int) $cart->getId());
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoConfigFixture cataloginventory/options/enable_inventory_check 1
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * @magentoConfigFixture cataloginventory/options/enable_inventory_check 0
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
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
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

    /**
     * _security
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     * @magentoConfigFixture default_store carriers/flatrate/active 1
     * @magentoConfigFixture default_store carriers/tablerate/active 1
     * @magentoConfigFixture default_store carriers/freeshipping/active 1
     * @magentoConfigFixture default_store payment/banktransfer/active 1
     * @magentoConfigFixture default_store payment/cashondelivery/active 1
     * @magentoConfigFixture default_store payment/checkmo/active 1
     * @magentoConfigFixture default_store payment/purchaseorder/active 1
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/guest/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrderOfGuestCart()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessageMatches('/The current user cannot perform operations on cart*/');
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
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
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(Customer::class, ['email' => 'customer3@search.example.com'], as: 'customer2'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
    ]
    public function testPlaceOrderOfAnotherCustomerCart()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
=======
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
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/customer/create_empty_cart.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/add_simple_product.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_shipping_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_new_billing_address.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_flatrate_shipping_method.php
     * @magentoApiDataFixture Magento/GraphQl/Quote/_files/set_checkmo_payment_method.php
     */
    public function testPlaceOrderOfAnotherCustomerCart()
    {
        $reservedOrderId = 'test_quote';
        $maskedQuoteId = $this->getMaskedQuoteIdByReservedOrderId->execute($reservedOrderId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessageMatches('/The current user cannot perform operations on cart*/');
        $this->graphQlMutation($query, [], '', $this->getHeaderMap('customer3@search.example.com'));
    }

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
  }
}
QUERY;
    }

    /**
     * @param string $username
     * @param string $password
     * @return array
     * @throws \Magento\Framework\Exception\AuthenticationException
     */
    private function getHeaderMap(string $username = 'customer@example.com', string $password = 'password'): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($username, $password);
        $headerMap = ['Authorization' => 'Bearer ' . $customerToken];
        return $headerMap;
    }

<<<<<<< HEAD
    #[
        Config('carriers/flatrate/active', '1', 'store', 'default'),
        Config('payment/checkmo/active', '1', 'store', 'default'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(Indexer::class, as: 'indexer'),
        DataFixture(Customer::class, ['email' => 'customer@example.com'], as: 'customer'),
        DataFixture(
            CustomerCart::class,
            [
                'customer_id' => '$customer.id$',
                'reserved_order_id' => 'test_quote'
            ],
            'cart'
        ),
        DataFixture(AddProductToCartFixture::class, ['cart_id' => '$cart.id$', 'product_id' => '$product.id$']),
        DataFixture(SetShippingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetBillingAddressFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetDeliveryMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(SetPaymentMethodFixture::class, ['cart_id' => '$cart.id$']),
        DataFixture(QuoteIdMask::class, ['cart_id' => '$cart.id$'], 'quoteIdMask'),
        Config('carriers/flatrate/active', '0', 'store', 'default'),
    ]
    public function testPlaceOrderWithDisabledShippingMethod()
    {
        $maskedQuoteId = DataFixtureStorageManager::getStorage()->get('quoteIdMask')->getMaskedId();
        $query = $this->getQuery($maskedQuoteId);

        self::expectExceptionMessage(
            'Unable to place order: The shipping method is missing. Select the shipping method and try again'
        );
        $this->graphQlMutation($query, [], '', $this->getHeaderMap());
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
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
