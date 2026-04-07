<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\CatalogUrlRewrite\Observer;

use Magento\Catalog\Api\CategoryListInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
<<<<<<< HEAD
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
=======
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;
use PHPUnit\Framework\TestCase;

/**
 * @magentoAppArea adminhtml
 * @magentoDbIsolation disabled
 */
class UrlRewriteHandlerTest extends TestCase
{
    /**
     * @var UrlRewriteHandler
     */
<<<<<<< HEAD
    private UrlRewriteHandler $handler;
=======
    private $handler;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var ProductRepositoryInterface
     */
<<<<<<< HEAD
    private ProductRepositoryInterface $productRepository;

    /**
     * @var ObjectManagerInterface
     */
    private ObjectManagerInterface $objectManager;
=======
    private $productRepository;

    /**
     * @var ObjectManager
     */
    private $objectManager;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->productRepository = $this->objectManager->get(ProductRepositoryInterface::class);
        $this->handler = $this->objectManager->create(UrlRewriteHandler::class);
    }

    /**
     * Checks category URLs rewrites generation with enabled `Use Categories Path for Product URLs` option and
<<<<<<< HEAD
     * store's specific product URL key in store view context.
     *
     * @magentoDataFixture Magento/CatalogUrlRewrite/Fixtures/product_custom_url_key.php
     * @magentoConfigFixture admin_store catalog/seo/product_use_categories 1
     * @magentoConfigFixture default/catalog/seo/generate_category_product_rewrites 1
     * @magentoConfigFixture default/catalog/seo/product_rewrite_context store_view
     *
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGenerateProductUrlRewriteStoreViewContext(): void
    {
        $product = $this->productRepository->get('p002');
        $category = $this->getCategory('category 1');
        // change the category scope to the global
        $category->setStoreId(1)
            ->setChangedProductIds([$product->getId()])
            ->setAffectedProductIds([$product->getId()])
            ->setAnchorsAbove(false);

        $generatedUrls = $this->handler->generateProductUrlRewrites($category);
        $actual = array_values(
            array_map(
                function (UrlRewrite $urlRewrite) {
                    return $urlRewrite->getRequestPath();
                },
                $generatedUrls
            )
        );

        $expected = [
            'store-1-key.html',
            'cat-1/store-1-key.html',
            'p002.html'
        ];
        self::assertEquals($expected, $actual, 'Generated URLs rewrites do not match.');
    }

    /**
     * Checks category URLs rewrites generation with enabled `Use Categories Path for Product URLs` option and
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * store's specific product URL key.
     *
     * @magentoDataFixture Magento/CatalogUrlRewrite/Fixtures/product_custom_url_key.php
     * @magentoConfigFixture admin_store catalog/seo/product_use_categories 1
     * @magentoConfigFixture default/catalog/seo/generate_category_product_rewrites 1
<<<<<<< HEAD
     * @magentoConfigFixture default/catalog/seo/product_rewrite_context website
     *
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGenerateProductUrlRewritesWebsiteContext(): void
=======
     */
    public function testGenerateProductUrlRewrites()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $product = $this->productRepository->get('p002');
        $category = $this->getCategory('category 1');
        // change the category scope to the global
        $category->setStoreId(0)
            ->setChangedProductIds([$product->getId()])
            ->setAffectedProductIds([$product->getId()])
            ->setAnchorsAbove(false);

        $generatedUrls = $this->handler->generateProductUrlRewrites($category);
        $actual = array_values(
            array_map(
                function (UrlRewrite $urlRewrite) {
                    return $urlRewrite->getRequestPath();
                },
                $generatedUrls
            )
        );
<<<<<<< HEAD
        sort($actual);

        $expected = [
            'cat-1-2/p002.html', // the Secondary store with Category URL key, first store view
            'cat-1-2/p002.html', // the Secondary store with Category URL key, second store view
            'cat-1/store-1-key.html', // the Default store with Category URL key, first store view
            'cat-1/store-1-key.html', // the Default store with Category URL key, second store view
            'p002.html', // the Secondary store
            'p002.html', // the Default store
            'store-1-key.html', // the Default store
            'store-1-key.html', // the Secondary store
=======

        $expected = [
            'store-1-key.html', // the Default store
            'cat-1/store-1-key.html', // the Default store with Category URL key
            '/store-1-key.html', // an anchor URL the Default store
            'p002.html', // the Secondary store
            'cat-1-2/p002.html', // the Secondary store with Category URL key
            '/p002.html', // an anchor URL the Secondary store
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
        self::assertEquals($expected, $actual, 'Generated URLs rewrites do not match.');
    }

    /**
     * @magentoDataFixture Magento/CatalogUrlRewrite/_files/category_with_products.php
<<<<<<< HEAD
     * @magentoConfigFixture default/catalog/seo/generate_category_product_rewrites 1
     *
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGenerateProductUrlRewrites2(): void
=======
     */
    public function testGenerateProductUrlRewrites2()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $product1 = $this->productRepository->get('simple');
        $product2 = $this->productRepository->get('12345');
        $category = $this->getCategory('Category 1');

        $category->setChangedProductIds([$product1->getId()]);
        $category->setAffectedProductIds([$product1->getId(), $product2->getId()]);
        $category->setAnchorsAbove(false);
        $generatedUrls = $this->handler->generateProductUrlRewrites($category);
        $actual = array_values(
            array_map(
                function (UrlRewrite $urlRewrite) {
                    return $urlRewrite->getRequestPath();
                },
                $generatedUrls
            )
        );

        $expected = [
            'simple-product.html',
<<<<<<< HEAD
            'category-1/simple-product.html'
=======
            'category-1/simple-product.html',
            '/simple-product.html',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
        $this->assertEquals($expected, $actual, 'Generated URLs rewrites do not match.');
    }

    /**
     * Gets category by name.
     *
     * @param string $name
     * @return CategoryInterface
     */
    private function getCategory(string $name): CategoryInterface
    {
        /** @var SearchCriteriaBuilder $searchCriteriaBuilder */
        $searchCriteriaBuilder = $this->objectManager->get(SearchCriteriaBuilder::class);
        $searchCriteria = $searchCriteriaBuilder->addFilter('name', $name)
            ->create();
        /** @var CategoryListInterface $repository */
        $repository = $this->objectManager->get(CategoryListInterface::class);
        $items = $repository->getList($searchCriteria)
            ->getItems();

        return array_pop($items);
    }
}
