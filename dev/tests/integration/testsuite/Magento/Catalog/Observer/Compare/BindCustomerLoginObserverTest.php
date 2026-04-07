<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Observer\Compare;

use Magento\Catalog\Model\Product\Compare\ListCompareFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Visitor;
<<<<<<< HEAD
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureBeforeTransaction;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\DbIsolation;
=======
use Magento\Eav\Model\Entity\Collection\AbstractCollection;
use Magento\Framework\ObjectManagerInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Checks customer and visitor compare list merging after customer login
 *
 * @see \Magento\Catalog\Observer\Compare\BindCustomerLoginObserver
 *
<<<<<<< HEAD
 * Attributes-based fixtures used for new test methods
 */
#[
    AppArea('frontend'),
    DbIsolation(true),
]
class BindCustomerLoginObserverTest extends TestCase
{
    /** @var $objectManager */
=======
 * @magentoAppArea frontend
 * @magentoDbIsolation enabled
 */
class BindCustomerLoginObserverTest extends TestCase
{
    /** @var ObjectManagerInterface */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    private $objectManager;

    /** @var Session */
    private $session;

    /** @var Visitor */
    private $visitor;

    /** @var ListCompareFactory */
    private $listCompareFactory;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->session = $this->objectManager->get(Session::class);
        $this->visitor = $this->objectManager->get(Visitor::class);
        $this->listCompareFactory = $this->objectManager->get(ListCompareFactory::class);
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        $this->session->logout();
        $this->visitor->setId(null);

        parent::tearDown();
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/visitor_compare_list.php
     * @magentoDataFixture Magento/Customer/_files/customer.php
     *
     * @return void
     */
    public function testExecute(): void
    {
        $this->visitor->setId(123);
        $this->session->loginById(1);
        $this->assertCustomerItems(1, ['simple']);
        $this->assertVisitorItems(123, []);
    }

    /**
<<<<<<< HEAD
     * Ensures visitor compare items from different store views are merged and remain store-scoped after login,
     * using new DataFixtures.
     */
    #[
        AppArea('frontend'),
        DbIsolation(true),

        // Create a second store view in default website/group
        DataFixtureBeforeTransaction(
            'Magento\Store\Test\Fixture\Store',
            [
                'code'      => 'fixture_second_store',
                'name'      => 'Fixture Store',
                'is_active'=> 1,
            ],
            'second_store'
        ),

        // Create a simple product
        DataFixture(
            'Magento\Catalog\Test\Fixture\Product',
            [
                'sku'   => 'simple',
                'name'  => 'Simple Product',
                'price' => 10,
            ],
            'simple_product'
        ),

        // Create a customer
        DataFixture(
            'Magento\Customer\Test\Fixture\Customer',
            [
                'email'     => 'customer@example.com',
                'firstname' => 'John',
                'lastname'  => 'Doe',
            ],
            'customer'
        ),

        // Website-scoped customer sharing
        Config('customer/account_share/scope', 1),
    ]
    public function testExecuteWithItemsAcrossTwoStores(): void
    {
        $storeManager = $this->objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $storage = DataFixtureStorageManager::getStorage();
        $defaultStore = $storeManager->getStore();
        $secondStoreData = $storage->get('second_store');
        $secondStore = $storeManager->getStore((int)$secondStoreData->getId());
        $product = $storage->get('simple_product');
        $customer = $storage->get('customer');
        $productId = (int)$product->getId();

        // Add the same product to visitor compare list in two different stores
        $this->visitor->setId(777);

        $storeManager->setCurrentStore($defaultStore->getId());
        $this->listCompareFactory->create()->addProduct($productId);

        $storeManager->setCurrentStore($secondStore->getId());
        $this->listCompareFactory->create()->addProduct($productId);

        // Login customer to trigger merge
        $this->session->loginById((int)$customer->getId());

        // Assert customer has one item per store view after merge (store-scoped)
        $defaultCustomerCollection = $this->listCompareFactory->create()
            ->getItemCollection()
            ->useProductItem()
            ->setStoreId((int)$defaultStore->getId())
            ->setCustomerId((int)$customer->getId());
        $this->assertCount(1, $defaultCustomerCollection);

        $secondCustomerCollection = $this->listCompareFactory->create()
            ->getItemCollection()
            ->useProductItem()
            ->setStoreId((int)$secondStore->getId())
            ->setCustomerId((int)$customer->getId());
        $this->assertCount(1, $secondCustomerCollection);

        // Assert visitor lists are cleared in both stores
        $defaultVisitorCollection = $this->listCompareFactory->create()
            ->getItemCollection()
            ->useProductItem()
            ->setStoreId((int)$defaultStore->getId())
            ->setVisitorId(777);
        $defaultVisitorCollection->addFieldToFilter('customer_id', ['null' => true]);
        $this->assertCount(0, $defaultVisitorCollection);

        $secondVisitorCollection = $this->listCompareFactory->create()
            ->getItemCollection()
            ->useProductItem()
            ->setStoreId((int)$secondStore->getId())
            ->setVisitorId(777);
        $secondVisitorCollection->addFieldToFilter('customer_id', ['null' => true]);
        $this->assertCount(0, $secondVisitorCollection);
    }

    /**
     * Ensures duplicates are not created when visitor and customer have same product in compare list,
     * and visitor list is cleared after merge, using DataFixtures and programmatic setup.
     */
    #[
        DataFixture(
            'Magento\Catalog\Test\Fixture\Product',
            [
                'sku'   => 'simple',
                'name'  => 'Simple',
                'price' => 10,
            ],
            'p1'
        ),
        DataFixture(
            'Magento\Catalog\Test\Fixture\Product',
            [
                'sku'   => 'simple2',
                'name'  => 'Simple 2',
                'price' => 20,
            ],
            'p2'
        ),
        DataFixture(
            'Magento\Customer\Test\Fixture\Customer',
            [
                'email'     => 'customer2@example.com',
                'firstname' => 'Jane',
                'lastname'  => 'Doe',
            ],
            'cust2'
        ),
    ]
    public function testExecuteWithSameProducts(): void
    {
        $storage = DataFixtureStorageManager::getStorage();
        $product1 = $storage->get('p1');
        $product2 = $storage->get('p2');
        $customer = $storage->get('cust2');

        // Customer has 'simple' and 'simple2'
        $this->session->loginById((int)$customer->getId());
        $compare = $this->listCompareFactory->create();
        $compare->addProduct((int)$product1->getId());
        $compare->addProduct((int)$product2->getId());
        $this->session->logout();

        // Visitor (guest) has 'simple'
        $this->visitor->setId(123);
        $this->listCompareFactory->create()->addProduct((int)$product1->getId());

        // Merge visitor list into customer using explicit visitor/customer ids to avoid visitor id rotation on login
        $mergeItem = $this->objectManager->create('Magento\Catalog\Model\Product\Compare\Item');
        $mergeItem->setCustomerId((int)$customer->getId());
        $mergeItem->setVisitorId(123);
        $mergeItem->bindCustomerLogin();
        $this->assertCustomerItems((int)$customer->getId(), ['simple', 'simple2']);
=======
     * @magentoDataFixture Magento/Catalog/_files/customer_compare_list_with_simple_product.php
     * @magentoDataFixture Magento/Catalog/_files/product_in_compare_list_with_customer.php
     * @magentoDataFixture Magento/Catalog/_files/visitor_compare_list.php
     *
     * @return void
     */
    public function testExecuteWithSameProducts(): void
    {
        $this->visitor->setId(123);
        $this->session->loginById(1);
        $this->assertCustomerItems(1, ['simple', 'simple2']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertVisitorItems(123, []);
    }

    /**
     * Check customer compare items
     *
     * @param int $customerId
     * @param array $expectedProductSkus
     * @return void
     */
    private function assertCustomerItems(int $customerId, array $expectedProductSkus): void
    {
        $collection = $this->listCompareFactory->create()->getItemCollection()->useProductItem()
            ->setCustomerId($customerId);
        $this->checkCollection($collection, $expectedProductSkus);
    }

    /**
     * Checks visitor compare items
     *
     * @param int $visitorId
     * @param array $expectedProductSkus
     * @return void
     */
    private function assertVisitorItems(int $visitorId, array $expectedProductSkus): void
    {
        $collection = $this->listCompareFactory->create()->getItemCollection()->useProductItem()
            ->setVisitorId($visitorId);
        $collection->addFieldToFilter('customer_id', ['null' => true]);
        $this->checkCollection($collection, $expectedProductSkus);
    }

    /**
     * Check collection
     *
<<<<<<< HEAD
     * @param mixed $collection
     * @param array $expectedSkus
     * @return void
     */
    private function checkCollection($collection, array $expectedSkus): void
=======
     * @param AbstractCollection $collection
     * @param array $expectedSkus
     * @return void
     */
    private function checkCollection(AbstractCollection $collection, array $expectedSkus): void
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->assertCount(count($expectedSkus), $collection);
        foreach ($expectedSkus as $expectedSku) {
            $this->assertNotNull($collection->getItemByColumnValue('sku', $expectedSku));
        }
    }
}
