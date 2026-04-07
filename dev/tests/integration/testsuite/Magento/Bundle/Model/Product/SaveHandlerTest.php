<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Bundle\Model\Product;

<<<<<<< HEAD
use Magento\Bundle\Test\Fixture\Option as BundleOptionFixture;
use Magento\Bundle\Test\Fixture\Product as BundleProductFixture;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product\Copier;
use Magento\Catalog\Model\ResourceModel\Product\Relation;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Test\Fixture\Group as StoreGroupFixture;
use Magento\Store\Test\Fixture\Store as StoreFixture;
use Magento\Store\Test\Fixture\Website as WebsiteFixture;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorage;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\DbIsolation;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

=======
use Magento\Bundle\Api\Data\LinkInterface;
use Magento\Bundle\Api\Data\LinkInterfaceFactory;
use Magento\Bundle\Api\Data\OptionInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Model\Store;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Test class for \Magento\Bundle\Model\Product\SaveHandler
 * The tested class used indirectly
 *
 * @magentoDataFixture Magento/Bundle/_files/product.php
 * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
 * @magentoDbIsolation disabled
 * @magentoAppIsolation enabled
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class SaveHandlerTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
<<<<<<< HEAD
=======
     * @var Store
     */
    private $store;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
<<<<<<< HEAD
     * @var Relation
     */
    private $productRelationResourceModel;

    /**
     * @var DataFixtureStorage
     */
    private $fixtures;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
<<<<<<< HEAD
        /** @var ProductRepositoryInterface $productRepository */
        $this->productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        $this->productRelationResourceModel = $this->objectManager->create(Relation::class);
        $this->fixtures = DataFixtureStorageManager::getStorage();
    }

    #[
        DbIsolation(false),
        DataFixture(WebsiteFixture::class, as: 'website2'),
        DataFixture(StoreGroupFixture::class, ['website_id' => '$website2.id$'], 'group2'),
        DataFixture(StoreFixture::class, ['store_group_id' => '$group2.id$'], 'store2'),
        DataFixture(StoreFixture::class, ['store_group_id' => '$group2.id$'], 'store3'),
        DataFixture(ProductFixture::class, as: 'p1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p1$']], 'opt1'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1$']], 'bundle'),
    ]
=======
        $this->store = $this->objectManager->create(Store::class);
        /** @var ProductRepositoryInterface $productRepository */
        $this->productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
    }

    /**
     * Test option title on different stores
     *
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testOptionTitlesOnDifferentStores(): void
    {
        /** @var OptionList $optionList */
        $optionList = $this->objectManager->create(OptionList::class);

<<<<<<< HEAD
        $secondStoreId = (int)$this->fixtures->get('store2')->getId();
        $thirdStoreId = (int)$this->fixtures->get('store3')->getId();
        $secondStoreCode = $this->fixtures->get('store2')->getCode();
        $thirdStoreCode = $this->fixtures->get('store3')->getCode();
        $sku = $this->fixtures->get('bundle')->getSku();

        $product = $this->productRepository->get($sku, true, $secondStoreId, true);
        $options = $optionList->getItems($product);
        $title = $options[0]->getTitle();
        $newTitle = $title . ' ' . $secondStoreCode;
=======
        $secondStoreId = $this->store->load('fixture_second_store')->getId();
        $thirdStoreId = $this->store->load('fixture_third_store')->getId();

        $product = $this->productRepository->get('bundle-product', true, $secondStoreId, true);
        $options = $optionList->getItems($product);
        $title = $options[0]->getTitle();
        $newTitle = $title . ' ' . $this->store->load('fixture_second_store')->getCode();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $options[0]->setTitle($newTitle);
        $extension = $product->getExtensionAttributes();
        $extension->setBundleProductOptions($options);
        $product->setExtensionAttributes($extension);
        $product->save();

<<<<<<< HEAD
        $product = $this->productRepository->get($sku, true, $thirdStoreId, true);
        $options = $optionList->getItems($product);
        $newTitle = $title . ' ' . $thirdStoreCode;
=======
        $product = $this->productRepository->get('bundle-product', true, $thirdStoreId, true);
        $options = $optionList->getItems($product);
        $newTitle = $title . ' ' . $this->store->load('fixture_third_store')->getCode();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $options[0]->setTitle($newTitle);
        $extension = $product->getExtensionAttributes();
        $extension->setBundleProductOptions($options);
        $product->setExtensionAttributes($extension);
        $product->save();

<<<<<<< HEAD
        $product = $this->productRepository->get($sku, false, $secondStoreId, true);
        $options = $optionList->getItems($product);
        $this->assertCount(1, $options);
        $this->assertEquals(
            $title . ' ' . $secondStoreCode,
=======
        $product = $this->productRepository->get('bundle-product', false, $secondStoreId, true);
        $options = $optionList->getItems($product);
        $this->assertCount(1, $options);
        $this->assertEquals(
            $title . ' ' . $this->store->load('fixture_second_store')->getCode(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $options[0]->getTitle()
        );
    }

<<<<<<< HEAD
    #[
        DbIsolation(false),
        DataFixture(ProductFixture::class, as: 'p1'),
        DataFixture(ProductFixture::class, as: 'p2'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p1$']], 'opt1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p1$', '$p2$']], 'opt2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1$', '$opt2$']], 'bundle'),
    ]
    public function testOptionLinksOfSameProduct(): void
    {
        $bundleSku = $this->fixtures->get('bundle')->getSku();
        $bundleProduct = $this->productRepository->get($bundleSku, true, 0, true);
        $extension = $bundleProduct->getExtensionAttributes();
        $options = $extension->getBundleProductOptions();
        $this->assertCount(2, $options);
        $this->assertTrue($bundleProduct->isSalable());

        //remove one option and verify the count
        array_pop($options);
        $extension->setBundleProductOptions($options);
        $bundleProduct->setExtensionAttributes($extension);
        $this->productRepository->save($bundleProduct);

        // reload product and verify only one option is left and product is salable
        $bundleProduct = $this->productRepository->get($bundleSku, true, 0, true);
        $extension = $bundleProduct->getExtensionAttributes();
        $options = $extension->getBundleProductOptions();
        $this->assertCount(1, $options);
        $this->assertTrue($bundleProduct->isSalable());

        // check that p1 is still related to bundle product as the other option includes it
        $simpleProduct1 = $this->fixtures->get('p1');
        $parentIds = $this->productRelationResourceModel->getRelationsByChildren([$simpleProduct1->getId()]);
        $this->assertContains($bundleProduct->getId(), $parentIds[$simpleProduct1->getId()]);
        // check that p2 is not related to bundle product as the option including it was removed
        $simpleProduct2 = $this->fixtures->get('p2');
        $parentIds = $this->productRelationResourceModel->getRelationsByChildren([$simpleProduct2->getId()]);
        $this->assertNotContains($bundleProduct->getId(), $parentIds[$simpleProduct2->getId()] ?? []);
    }

    #[
        AppArea('adminhtml'),
        DbIsolation(false),
        DataFixture(ProductFixture::class, as: 'p1'),
        DataFixture(ProductFixture::class, as: 'p2'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p1$']], 'opt1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p2$']], 'opt2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1$', '$opt2$']], 'bundle'),
    ]
    public function testRemoveBundleOptionAfterDuplicate(): void
    {
        $bundleSku = $this->fixtures->get('bundle')->getSku();
        $bundleProduct = $this->productRepository->get($bundleSku, true, 0, true);
        $extension = $bundleProduct->getExtensionAttributes();
        $options = $extension->getBundleProductOptions();
        $this->assertCount(2, $options);

        // Duplicate the bundle product
        $copier = $this->objectManager->create(Copier::class);
        $duplicateBundleProduct = $copier->copy($bundleProduct);

        // Remove the second option from the original bundle product
        $bundleProduct = $this->productRepository->get($bundleSku, true, forceReload:  true);
        $extension = $bundleProduct->getExtensionAttributes();
        $extension->setBundleProductOptions([$options[0]]);
        $bundleProduct->setExtensionAttributes($extension);
        $this->productRepository->save($bundleProduct);

        // Check that the original bundle product has only one option left
        $options = $this->getBundleOptions($bundleSku);
        $this->assertCount(1, $options);
        $this->assertCount(1, $options[0]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p1')->getSku(), $options[0]->getProductLinks()[0]->getSku());

        // Check that the duplicated bundle product still has both options
        $options = $this->getBundleOptions($duplicateBundleProduct->getSku());
        $this->assertCount(2, $options);
        $this->assertCount(1, $options[0]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p1')->getSku(), $options[0]->getProductLinks()[0]->getSku());
        $this->assertCount(1, $options[1]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p2')->getSku(), $options[1]->getProductLinks()[0]->getSku());
    }

    #[
        AppArea('adminhtml'),
        DbIsolation(false),
        DataFixture(ProductFixture::class, as: 'p1'),
        DataFixture(ProductFixture::class, as: 'p2'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p1$']], 'opt1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$p2$']], 'opt2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1$', '$opt2$']], 'bundle'),
    ]
    public function testRemoveBundleOptionFromDuplicate(): void
    {
        $bundleSku = $this->fixtures->get('bundle')->getSku();
        $bundleProduct = $this->productRepository->get($bundleSku, true, 0, true);
        $extension = $bundleProduct->getExtensionAttributes();
        $options = $extension->getBundleProductOptions();
        $this->assertCount(2, $options);

        // Duplicate the bundle product
        $copier = $this->objectManager->create(Copier::class);
        $duplicateBundleProduct = $copier->copy($bundleProduct);

        // Remove the second option from the duplicated bundle product
        $bundleProduct = $this->productRepository->get($duplicateBundleProduct->getSku(), true, forceReload:  true);
        $extension = $bundleProduct->getExtensionAttributes();
        $options = $extension->getBundleProductOptions();
        $extension->setBundleProductOptions([$options[0]]);
        $bundleProduct->setExtensionAttributes($extension);
        $this->productRepository->save($bundleProduct);

        // Check that the original bundle product still has both options
        $options = $this->getBundleOptions($bundleSku);
        $this->assertCount(2, $options);
        $this->assertCount(1, $options[0]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p1')->getSku(), $options[0]->getProductLinks()[0]->getSku());
        $this->assertCount(1, $options[1]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p2')->getSku(), $options[1]->getProductLinks()[0]->getSku());

        // Check that the duplicated bundle product has only one option left
        $options = $this->getBundleOptions($duplicateBundleProduct->getSku());
        $this->assertCount(1, $options);
        $this->assertCount(1, $options[0]->getProductLinks());
        $this->assertEquals($this->fixtures->get('p1')->getSku(), $options[0]->getProductLinks()[0]->getSku());
    }

    private function getBundleOptions(string $bundleSku): array
    {
        $bundleProduct = $this->productRepository->get($bundleSku, true, forceReload: true);
        return $bundleProduct?->getExtensionAttributes()?->getBundleProductOptions() ?? [];
=======
    /**
     * Test option link of the same product
     *
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function testOptionLinksOfSameProduct(): void
    {
        /** @var OptionList $optionList */
        $optionList = $this->objectManager->create(OptionList::class);
        $product = $this->productRepository->get('bundle-product', true);

        //set the first option
        $options = $this->setBundleProductOptionData();
        $extension = $product->getExtensionAttributes();
        $extension->setBundleProductOptions($options);
        $product->setExtensionAttributes($extension);
        $product->save();

        $product = $this->productRepository->get('bundle-product', true);
        $options = $optionList->getItems($product);
        $this->assertCount(1, $options);

        //set the second option with same product
        $newOption = $this->setBundleProductOptionData();
        array_push($options, current($newOption));
        $extension = $product->getExtensionAttributes();
        $extension->setBundleProductOptions($options);
        $product->setExtensionAttributes($extension);
        $product->save();
        $this->assertCount(2, $options);

        //remove one option and verify the count
        array_pop($options);
        $extension = $product->getExtensionAttributes();
        $extension->setBundleProductOptions($options);
        $product->setExtensionAttributes($extension);
        $product->save();

        $product = $this->productRepository->get('bundle-product', true);
        $options = $optionList->getItems($product);
        $this->assertCount(1, $options);
    }

    /**
     * Set product option link
     *
     * @param $bundleLinks
     * @param $option
     * @return array
     * @throws NoSuchEntityException
     */
    private function setProductLink($bundleLinks, $option): array
    {
        $links = [];
        $options = [];
        if (!empty($bundleLinks)) {
            foreach ($bundleLinks as $linkData) {
                if (!(bool)$linkData['delete']) {
                    /** @var LinkInterface $link */
                    $link = $this->objectManager->create(LinkInterfaceFactory::class)
                        ->create(['data' => $linkData]);
                    $linkProduct = $this->productRepository->getById($linkData['product_id']);
                    $link->setSku($linkProduct->getSku());
                    $link->setQty($linkData['selection_qty']);
                    $link->setPrice($linkData['selection_price_value']);
                    if (isset($linkData['selection_can_change_qty'])) {
                        $link->setCanChangeQuantity($linkData['selection_can_change_qty']);
                    }
                    $links[] = $link;
                }
            }
            $option->setProductLinks($links);
            $options[] = $option;
        }
        return $options;
    }

    /**
     * Set product option
     *
     * @return array
     * @throws NoSuchEntityException
     */
    private function setProductOption(): array
    {
        $options = [];
        $product = $this->productRepository->get('bundle-product', true);
        foreach ($product->getBundleOptionsData() as $optionData) {
            if (!(bool)$optionData['delete']) {
                $option = $this->objectManager->create(OptionInterfaceFactory::class)
                    ->create(['data' => $optionData]);
                $option->setSku($product->getSku());
                $option->setOptionId(null);

                $bundleLinks = $product->getBundleSelectionsData();
                if (!empty($bundleLinks)) {
                    $options = $this->setProductLink(current($bundleLinks), $option);
                }
            }
        }
        return $options;
    }

    /**
     * Set bundle product option data
     *
     * @return array
     * @throws NoSuchEntityException
     */
    private function setBundleProductOptionData(): array
    {
        $options = [];
        $product = $this->productRepository->get('bundle-product', true);
        $simpleProduct = $this->productRepository->get('simple');
        $product->setBundleOptionsData(
            [
                [
                    'title' => 'Bundle Product Items',
                    'default_title' => 'Bundle Product Items',
                    'type' => 'select', 'required' => 1,
                    'delete' => '',
                ],
            ]
        );
        $product->setBundleSelectionsData(
            [
                [
                    [
                        'product_id' => $simpleProduct->getId(),
                        'selection_price_value' => 10,
                        'selection_qty' => 1,
                        'selection_can_change_qty' => 1,
                        'delete' => '',

                    ],
                ],
            ]
        );
        if ($product->getBundleOptionsData()) {
            $options = $this->setProductOption();
        }
        return $options;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
