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

namespace Magento\CatalogImportExport\Model\Import\ProductTest;

<<<<<<< HEAD
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Attribute\ScopeOverriddenValue;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\CatalogImportExport\Model\Import\Product\RowValidatorInterface;
use Magento\CatalogImportExport\Model\Import\Product\StoreResolver;
use Magento\CatalogImportExport\Model\Import\ProductTestBase;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
use Magento\ImportExport\Model\Import\Source\Csv;
use Magento\ImportExport\Test\Fixture\CsvFile as CsvFileFixture;
use Magento\Store\Test\Fixture\Store;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogImportExport\Model\Import\Product\RowValidatorInterface;
use Magento\CatalogImportExport\Model\Import\ProductTestBase;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\Source\Csv;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Integration test for \Magento\CatalogImportExport\Model\Import\Product class.
 *
 * @magentoDbIsolation disabled
 * @magentoAppArea adminhtml
 * @magentoDataFixtureBeforeTransaction Magento/Catalog/_files/enable_reindex_schedule.php
 * @magentoDataFixtureBeforeTransaction Magento/Catalog/_files/enable_catalog_product_reindex_schedule.php
 */
class ProductUrlKeyTest extends ProductTestBase
{
    /**
     * Make sure the absence of a url_key column in the csv file won't erase the url key of the existing products.
     * To reach the goal we need to not send the name column, as the url key is generated from it.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_url_key.php
     */
    public function testImportWithoutUrlKeysAndName()
    {
        $products = [
            'simple1' => 'url-key',
            'simple2' => 'url-key2',
        ];
<<<<<<< HEAD
        $filesystem = $this->objectManager->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = $this->objectManager->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_without_url_keys_and_name.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )
            ->setSource($source)
            ->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
        $this->_model->importData();

<<<<<<< HEAD
        $productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
=======
        $productRepository = $this->objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        foreach ($products as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }

    /**
     * @magentoDataFixture Magento/Catalog/Model/ResourceModel/_files/product_simple.php
<<<<<<< HEAD
     * @param $importFile string
     * @param $expectedErrors array
     * @throws LocalizedException
     */
    #[DataProvider('validateUrlKeysDataProvider')]
    public function testValidateUrlKeys($importFile, $expectedErrors)
    {
        $filesystem = Bootstrap::getObjectManager()->create(
            Filesystem::class
=======
     * @dataProvider validateUrlKeysDataProvider
     * @param $importFile string
     * @param $expectedErrors array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function testValidateUrlKeys($importFile, $expectedErrors)
    {
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Filesystem::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);

        $source = $this->objectManager->create(
<<<<<<< HEAD
            Csv::class,
=======
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/' . $importFile,
                'directory' => $directory
            ]
        );
<<<<<<< HEAD
        /** @var ProcessingErrorAggregatorInterface $errors */
        $errors = $this->_model->setParameters(
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
=======
        /** @var \Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface $errors */
        $errors = $this->_model->setParameters(
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )->setSource(
            $source
        )->validateData();
        $this->assertEquals(
            $expectedErrors[RowValidatorInterface::ERROR_DUPLICATE_URL_KEY],
            count($errors->getErrorsByCode([RowValidatorInterface::ERROR_DUPLICATE_URL_KEY]))
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function validateUrlKeysDataProvider()
=======
    public function validateUrlKeysDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'products_to_check_valid_url_keys.csv',
                [
                    RowValidatorInterface::ERROR_DUPLICATE_URL_KEY => 0
                ]
            ],
            [
                'products_to_check_valid_url_keys_with_different_language.csv',
                [
                    RowValidatorInterface::ERROR_DUPLICATE_URL_KEY => 0
                ]
            ],
            [
                'products_to_check_duplicated_url_keys.csv',
                [
                    RowValidatorInterface::ERROR_DUPLICATE_URL_KEY => 2
                ]
            ],
            [
                'products_to_check_duplicated_names.csv' ,
                [
                    RowValidatorInterface::ERROR_DUPLICATE_URL_KEY => 1
                ]
            ]
        ];
    }

    /**
     * @magentoDataFixture Magento/Store/_files/website.php
     * @magentoDataFixture Magento/Store/_files/core_fixturestore.php
     * @magentoDataFixture Magento/Catalog/Model/ResourceModel/_files/product_simple.php
     */
    public function testValidateUrlKeysMultipleStores()
    {
<<<<<<< HEAD
        $filesystem = Bootstrap::getObjectManager()->create(
            Filesystem::class
=======
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Filesystem::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);

        $source = $this->objectManager->create(
<<<<<<< HEAD
            Csv::class,
=======
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_check_valid_url_keys_multiple_stores.csv',
                'directory' => $directory
            ]
        );
        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )->setSource(
            $source
        )->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_url_key.php
     */
    public function testExistingProductWithUrlKeys()
    {
        $products = [
            'simple1' => 'url-key1',
            'simple2' => 'url-key2',
            'simple3' => 'url-key3'
        ];
        // added by _files/products_to_import_with_valid_url_keys.csv
        $this->importedProducts[] = 'simple3';

<<<<<<< HEAD
        $filesystem = Bootstrap::getObjectManager()
            ->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_with_valid_url_keys.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )->setSource(
            $source
        )->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
        $this->_model->importData();

<<<<<<< HEAD
        $productRepository = Bootstrap::getObjectManager()->create(
            ProductRepositoryInterface::class
=======
        $productRepository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Api\ProductRepositoryInterface::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        foreach ($products as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_wrong_url_key.php
     */
    public function testAddUpdateProductWithInvalidUrlKeys() : void
    {
        $products = [
            'simple1' => 'cuvee-merlot-cabernet-igp-pays-d-oc-frankrijk',
            'simple2' => 'normal-url',
            'simple3' => 'some-wrong-url'
        ];
        // added by _files/products_to_import_with_invalid_url_keys.csv
        $this->importedProducts[] = 'simple3';

<<<<<<< HEAD
        $filesystem = Bootstrap::getObjectManager()
            ->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_with_invalid_url_keys.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )->setSource(
            $source
        )->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
        $this->_model->importData();

<<<<<<< HEAD
        $productRepository = Bootstrap::getObjectManager()->create(
            ProductRepositoryInterface::class
=======
        $productRepository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Api\ProductRepositoryInterface::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        foreach ($products as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_url_key.php
     */
    public function testImportWithoutChangingUrlKeys()
    {
        $filesystem = $this->objectManager->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
            [
                'file' => __DIR__ . '/../_files/products_to_import_without_url_key_column.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
        )
            ->setSource($source)
            ->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
        $this->_model->importData();
        $productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        $this->assertEquals('url-key', $productRepository->get('simple1')->getUrlKey());
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_url_key.php
     */
    public function testImportWithoutUrlKeys()
    {
        $products = [
            'simple1' => 'simple-1',
            'simple2' => 'simple-2',
            'simple3' => 'simple-3'
        ];
        // added by _files/products_to_import_without_url_keys.csv
        $this->importedProducts[] = 'simple3';

<<<<<<< HEAD
        $filesystem = $this->objectManager->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = $this->objectManager->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_without_url_keys.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )
            ->setSource($source)
            ->validateData();

        $this->assertTrue($errors->getErrorsCount() == 0);
        $this->_model->importData();

<<<<<<< HEAD
        $productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
=======
        $productRepository = $this->objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        foreach ($products as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_non_latin_url_key.php
     * @return void
<<<<<<< HEAD
     * @throws LocalizedException
=======
     * @throws \Magento\Framework\Exception\LocalizedException
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testImportWithNonLatinUrlKeys()
    {
        $productsCreatedByFixture = [
            'ukrainian-with-url-key' => 'nove-im-ja-pislja-importu-scho-stane-url-key',
            'ukrainian-without-url-key' => 'novij-url-key-pislja-importu',
        ];
        $productsImportedByCsv = [
            'imported-ukrainian-with-url-key' => 'importovanij-produkt',
            'imported-ukrainian-without-url-key' => 'importovanij-produkt-bez-url-key',
        ];
        $productSkuMap = array_merge($productsCreatedByFixture, $productsImportedByCsv);
        $this->importedProducts = array_keys($productsImportedByCsv);

<<<<<<< HEAD
        $filesystem = $this->objectManager->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = $this->objectManager->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_with_non_latin_url_keys.csv',
                'directory' => $directory,
            ]
        );

        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )
            ->setSource($source)
            ->validateData();

        $this->assertEquals($errors->getErrorsCount(), 0);
        $this->_model->importData();

        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        foreach ($productSkuMap as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_spaces_in_url_key.php
     * @magentoDbIsolation disabled
     * @magentoAppIsolation enabled
     * @return void
<<<<<<< HEAD
     * @throws LocalizedException
=======
     * @throws \Magento\Framework\Exception\LocalizedException
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testImportWithSpacesInUrlKeys()
    {
        $products = [
            'simple1' => 'url-with-spaces-1',
            'simple2' => 'url-with-spaces-2'
        ];
<<<<<<< HEAD
        $filesystem = $this->objectManager->create(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            Csv::class,
=======
        $filesystem = $this->objectManager->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = $this->objectManager->create(
            \Magento\ImportExport\Model\Import\Source\Csv::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'file' => __DIR__ . '/../_files/products_to_import_with_spaces_in_url_keys.csv',
                'directory' => $directory,
            ]
        );
        $errors = $this->_model->setParameters(
<<<<<<< HEAD
            ['behavior' => Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
=======
            ['behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_ADD_UPDATE, 'entity' => 'catalog_product']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        )
            ->setSource($source)
            ->validateData();

        $this->assertEquals($errors->getErrorsCount(), 0);
        $this->_model->importData();

        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        foreach ($products as $productSku => $productUrlKey) {
            $this->assertEquals($productUrlKey, $productRepository->get($productSku)->getUrlKey());
        }
    }
<<<<<<< HEAD

    /**
     * Validate import file when we have an existing product with UrlKey that consists of numbers with an alphabetical
     * characters in the end against the same imported UrlKey but without the character at the end,
     * when Product URL Suffix is set to be empty in the admin.
     *
     * @throws LocalizedException
     */
    #[
        Config('catalog/seo/product_url_suffix', null, 'store', 'default'),
        DataFixture(
            ProductFixture::class,
            [
                'url_key' => '1234t',
                'url_path' => '1234t'
            ],
        ),
    ]
    public function testValidateMixedCharNumUrlKeysWithNullUrlSuffix()
    {
        $filesystem = Bootstrap::getObjectManager()->create(
            Filesystem::class
        );
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);

        $source = $this->objectManager->create(
            Csv::class,
            [
                'file' => __DIR__ . '/../_files/products_to_check_valid_url_keys_mixed_chars_nums.csv',
                'directory' => $directory
            ]
        );

        $errors = $this->_model->setParameters(
            ['behavior' => Import::BEHAVIOR_APPEND, 'entity' => 'catalog_product']
        )->setSource(
            $source
        )->validateData();

        $this->assertEmpty($errors->getAllErrors(), 'Assert that import validation returns no errors');
    }

    #[
        DataFixture(Store::class, as: 'store2'),
        DataFixture(
            CsvFileFixture::class,
            [
                'rows' => [
                    ['sku', 'store_view_code', 'attribute_set_code', 'product_type', 'price', 'name', 'url_key'],
                    // simple1 has url_key specified in the main row
                    ['simple1%uniqid%', '', 'Default', 'simple', '10.00', 'Simple Product 1%uniqid%', 's1%uniqid%'],
                    ['simple1%uniqid%', '$store2.code$', 'Default', 'simple', '', '', ''],
                    // simple2 has no url_key specified in the main row
                    ['simple2%uniqid%', '', 'Default', 'simple', '10.00', 'Simple Product 1%uniqid%', ''],
                    ['simple2%uniqid%', '$store2.code$', 'Default', 'simple', '', '', '']
                ]
            ],
            'file'
        ),
    ]
    public function testStoreViewShouldInheritUrlKeyIfNotSpecified(): void
    {
        // reset store resolver cache to ensure that new store view code is resolved correctly
        $this->objectManager->removeSharedInstance(StoreResolver::class);
        $fixtures = DataFixtureStorageManager::getStorage();
        $store = $fixtures->get('store2')->getCode();
        $pathToFile = $fixtures->get('file')->getAbsolutePath();
        $model = $this->createImportModel($pathToFile);
        $this->assertErrorsCount(0, $model->validateData());
        $model->importData();
        [$headers, $row1,, $row3,] = $fixtures->get('file')->getRows();
        $row1 = array_combine($headers, $row1);
        $row3 = array_combine($headers, $row3);
        // generate url_key for simple2 based on name
        $row3['url_key'] = strtolower(preg_replace('/\s+/', '-', $row3['name']));
        foreach ([$row1, $row3] as $row) {
            $product = $this->getProductBySku($row['sku'], $store);
            $this->assertFalse(
                $this->objectManager->create(ScopeOverriddenValue::class)->containsValue(
                    ProductInterface::class,
                    $product,
                    'url_key',
                    $store
                ),
                "Assert that url_key is not overridden in store '{$store}' for SKU '{$row['sku']}'"
            );
            $this->assertEquals(
                $row['url_key'],
                $product->getUrlKey(),
                "Assert that url_key is set to '{$row['url_key']}' for SKU '{$row['sku']}' in store '{$store}'"
            );
        }
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
