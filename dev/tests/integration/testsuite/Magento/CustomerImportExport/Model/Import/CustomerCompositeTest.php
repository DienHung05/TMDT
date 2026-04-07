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
namespace Magento\CustomerImportExport\Model\Import;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for CustomerComposite import class
 */
class CustomerCompositeTest extends \PHPUnit\Framework\TestCase
{
    /**#@+
     * Attributes used in test assertions
     */
<<<<<<< HEAD
    public const ATTRIBUTE_CODE_FIRST_NAME = 'firstname';

    public const ATTRIBUTE_CODE_LAST_NAME = 'lastname';
=======
    const ATTRIBUTE_CODE_FIRST_NAME = 'firstname';

    const ATTRIBUTE_CODE_LAST_NAME = 'lastname';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**#@-*/

    /**#@+
     * Source *.csv file names for different behaviors
     */
<<<<<<< HEAD
    public const UPDATE_FILE_NAME = 'customer_composite_update.csv';

    public const DELETE_FILE_NAME = 'customer_composite_delete.csv';
=======
    const UPDATE_FILE_NAME = 'customer_composite_update.csv';

    const DELETE_FILE_NAME = 'customer_composite_delete.csv';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**#@-*/

    /**
     * Object Manager instance
     *
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $_objectManager;

    /**
     * Composite customer entity adapter instance
     *
     * @var CustomerComposite
     */
    protected $_entityAdapter;

    /**
     * Additional customer attributes for assertion
     *
     * @var array
     */
    protected $_customerAttributes = [self::ATTRIBUTE_CODE_FIRST_NAME, self::ATTRIBUTE_CODE_LAST_NAME];

    /**
     * Customers and addresses before import, address ID is postcode
     *
     * @var array
     */
<<<<<<< HEAD
    protected static $_beforeImport = [
=======
    protected $_beforeImport = [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        'betsyparker@example.com' => [
            'addresses' => ['19107', '72701'],
            'data' => [self::ATTRIBUTE_CODE_FIRST_NAME => 'Betsy', self::ATTRIBUTE_CODE_LAST_NAME => 'Parker'],
        ],
    ];

    /**
     * Customers and addresses after import, address ID is postcode
     *
     * @var array
     */
<<<<<<< HEAD
    protected static $_afterImport = [
=======
    protected $_afterImport = [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        'betsyparker@example.com' => [
            'addresses' => ['19107', '72701', '19108'],
            'data' => [
                self::ATTRIBUTE_CODE_FIRST_NAME => 'NotBetsy',
                self::ATTRIBUTE_CODE_LAST_NAME => 'NotParker',
            ],
        ],
        'anthonyanealy@magento.com' => ['addresses' => ['72701', '92664']],
        'loribbanks@magento.com' => ['addresses' => ['98801']],
        'kellynilson@magento.com' => ['addresses' => []],
    ];

    protected function setUp(): void
    {
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_entityAdapter = $this->_objectManager->create(
            \Magento\CustomerImportExport\Model\Import\CustomerComposite::class
        );
    }

    /**
     * Assertion of current customer and address data
     *
     * @param array $expectedData
     */
    protected function _assertCustomerData(array $expectedData)
    {
        /** @var $collection \Magento\Customer\Model\ResourceModel\Customer\Collection */
        $collection = $this->_objectManager->create(\Magento\Customer\Model\ResourceModel\Customer\Collection::class);
        $collection->addAttributeToSelect($this->_customerAttributes);
        $customers = $collection->getItems();

        $this->assertSameSize($expectedData, $customers);

        /** @var $customer \Magento\Customer\Model\Customer */
        foreach ($customers as $customer) {
            // assert customer existence
            $email = strtolower($customer->getEmail());
            $this->assertArrayHasKey($email, $expectedData);

            // assert customer data (only for required customers)
            if (isset($expectedData[$email]['data'])) {
                foreach ($expectedData[$email]['data'] as $attribute => $expectedValue) {
                    $this->assertEquals($expectedValue, $customer->getData($attribute));
                }
            }

            // assert address data
            $addresses = $customer->getAddresses();
            $this->assertSameSize($expectedData[$email]['addresses'], $addresses);
            /** @var $address \Magento\Customer\Model\Address */
            foreach ($addresses as $address) {
                $this->assertContains($address->getData('postcode'), $expectedData[$email]['addresses']);
            }
        }
    }

    /**
     * @param string $behavior
     * @param string $sourceFile
     * @param array $dataBefore
     * @param array $dataAfter
     * @param int $updatedItemsCount
     * @param int $createdItemsCount
     * @param int $deletedItemsCount
     * @param array $errors
     *
     * @magentoDataFixture Magento/Customer/_files/import_export/customers_for_address_import.php
     * @magentoAppIsolation enabled
<<<<<<< HEAD
     */
    #[DataProvider('importDataDataProvider')]
=======
     *
     * @dataProvider importDataDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testImportData(
        $behavior,
        $sourceFile,
        array $dataBefore,
        array $dataAfter,
        $updatedItemsCount,
        $createdItemsCount,
        $deletedItemsCount,
        array $errors = []
    ) {
        \Magento\TestFramework\Helper\Bootstrap::getInstance()
            ->loadArea(\Magento\Framework\App\Area::AREA_FRONTEND);
        // set entity adapter parameters
        $this->_entityAdapter->setParameters(['behavior' => $behavior]);
        /** @var \Magento\Framework\Filesystem $filesystem */
        $filesystem = $this->_objectManager->create(\Magento\Framework\Filesystem::class);
        $rootDirectory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);

        $this->_entityAdapter->getErrorAggregator()->initValidationStrategy(
            ProcessingErrorAggregatorInterface::VALIDATION_STRATEGY_STOP_ON_ERROR,
            10
        );

        // set fixture CSV file
        $result = $this->_entityAdapter->setSource(
            \Magento\ImportExport\Model\Import\Adapter::findAdapterFor($sourceFile, $rootDirectory)
        )
            ->validateData()
            ->hasToBeTerminated();
        if ($errors) {
            $this->assertTrue($result);
        } else {
            $this->assertFalse($result);
        }

        // assert validation errors
        // can't use error codes because entity adapter gathers only error messages from aggregated adapters
        $actualErrors = array_values($this->_entityAdapter->getErrorAggregator()->getRowsGroupedByErrorCode());
        $this->assertEquals($errors, $actualErrors);

        // assert data before import
        $this->_assertCustomerData($dataBefore);

        // import data
        $this->_entityAdapter->importData();
        $this->assertSame($updatedItemsCount, $this->_entityAdapter->getUpdatedItemsCount());
        $this->assertSame($createdItemsCount, $this->_entityAdapter->getCreatedItemsCount());
        $this->assertSame($deletedItemsCount, $this->_entityAdapter->getDeletedItemsCount());

        // assert data after import
        $this->_assertCustomerData($dataAfter);
    }

    /**
     * Data provider for testImportData
     *
     * @return array
     */
<<<<<<< HEAD
    public static function importDataDataProvider()
    {
        $filesDirectory = __DIR__ . '/_files/';
        $beforeImport = [
            'betsyparker@example.com' => [
                'addresses' => ['19107', '72701'],
                'data' => ['firstname' => 'Betsy', 'lastname' => 'Parker'],
            ],
        ];
        $afterImport = [
            'betsyparker@example.com' => [
                'addresses' => ['19107', '72701', '19108'],
                'data' => ['firstname' => 'NotBetsy', 'lastname' => 'NotParker'],
            ],
            'anthonyanealy@magento.com' => ['addresses' => ['72701', '92664']],
            'loribbanks@magento.com' => ['addresses' => ['98801']],
            'kellynilson@magento.com' => ['addresses' => []],
        ];

        $sourceData = [
            'delete_behavior' => [
                \Magento\ImportExport\Model\Import::BEHAVIOR_DELETE,  // $behavior
                $filesDirectory . self::DELETE_FILE_NAME,  // $sourceFile
                $beforeImport,  // $dataBefore
                [],  // $dataAfter
                0,  // $updatedItemsCount
                0,  // $createdItemsCount
                1,  // $deletedItemsCount
                []  // $errors
            ],
            'add_update_behavior' => [
                \Magento\ImportExport\Model\Import::BEHAVIOR_ADD_UPDATE,  // $behavior
                $filesDirectory . self::UPDATE_FILE_NAME,  // $sourceFile
                $beforeImport,  // $dataBefore
                $afterImport,  // $dataAfter
                1,  // $updatedItemsCount
                3,  // $createdItemsCount
                0,  // $deletedItemsCount
                []  // $errors
            ]
=======
    public function importDataDataProvider()
    {
        $filesDirectory = __DIR__ . '/_files/';
        $sourceData = [
            'delete_behavior' => [
                '$behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_DELETE,
                '$sourceFile' => $filesDirectory . self::DELETE_FILE_NAME,
                '$dataBefore' => $this->_beforeImport,
                '$dataAfter' => [],
                '$updatedItemsCount' => 0,
                '$createdItemsCount' => 0,
                '$deletedItemsCount' => 1,
                '$errors' => [],
            ],
        ];

        $sourceData['add_update_behavior'] = [
            '$behavior' => \Magento\ImportExport\Model\Import::BEHAVIOR_ADD_UPDATE,
            '$sourceFile' => $filesDirectory . self::UPDATE_FILE_NAME,
            '$dataBefore' => $this->_beforeImport,
            '$dataAfter' => $this->_afterImport,
            '$updatedItemsCount' => 1,
            '$createdItemsCount' => 3,
            '$deletedItemsCount' => 0,
            '$errors' => [],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];

        return $sourceData;
    }
}
