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
namespace Magento\Config\Model;

use Magento\Backend\App\Area\FrontNameResolver;
use Magento\Config\Model\ResourceModel\Config\Data\Collection;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory;
use Magento\Framework\Config\ScopeInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * @magentoAppArea adminhtml
 */
class ConfigTest extends TestCase
{
    /**
     * @covers \Magento\Config\Model\Config::save
     * @param array $groups
     * @magentoDbIsolation enabled
<<<<<<< HEAD
     * @magentoConfigFixture current_store general/single_store_mode/enabled 1
     */
    #[DataProvider('saveWithSingleStoreModeEnabledDataProvider')]
=======
     * @dataProvider saveWithSingleStoreModeEnabledDataProvider
     * @magentoConfigFixture current_store general/single_store_mode/enabled 1
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveWithSingleStoreModeEnabled($groups)
    {
        Bootstrap::getObjectManager()->get(
            ScopeInterface::class
        )->setCurrentScope(
            FrontNameResolver::AREA_CODE
        );
        /** @var $_configDataObject Config */
        $_configDataObject = Bootstrap::getObjectManager()->create(Config::class);
        $_configData = $_configDataObject->setSection('dev')->setWebsite('base')->load();
        $this->assertEmpty($_configData);

        $_configDataObject = Bootstrap::getObjectManager()->create(Config::class);
        $_configDataObject->setSection('dev')->setGroups($groups)->save();

        /** @var $_configDataObject Config */
        $_configDataObject = Bootstrap::getObjectManager()->create(Config::class);
        $_configData = $_configDataObject->setSection('dev')->load();
        $this->assertArrayHasKey('dev/debug/template_hints_admin', $_configData);
        $this->assertArrayHasKey('dev/debug/template_hints_blocks', $_configData);

        $_configDataObject = Bootstrap::getObjectManager()->create(Config::class);
        $_configData = $_configDataObject->setSection('dev')->setWebsite('base')->load();
        $this->assertArrayNotHasKey('dev/debug/template_hints_admin', $_configData);
        $this->assertArrayNotHasKey('dev/debug/template_hints_blocks', $_configData);
    }

<<<<<<< HEAD
    public static function saveWithSingleStoreModeEnabledDataProvider()
=======
    public function saveWithSingleStoreModeEnabledDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return require __DIR__ . '/_files/config_groups.php';
    }

    /**
     * @covers \Magento\Config\Model\Config::save
     * @param string $section
     * @param array $groups
     * @param array $expected
     * @magentoDbIsolation enabled
<<<<<<< HEAD
     */
    #[DataProvider('saveDataProvider')]
=======
     * @dataProvider saveDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSave($section, $groups, $expected)
    {
        $objectManager = Bootstrap::getObjectManager();

        /** @var $_configDataObject Config */
        $_configDataObject = $objectManager->create(Config::class);
        $_configDataObject->setSection($section)->setWebsite('base')->setGroups($groups)->save();

        foreach ($expected as $group => $expectedData) {
            $_configDataObject = $objectManager->create(Config::class);
            $_configData = $_configDataObject->setSection($group)->setWebsite('base')->load();
            if (array_key_exists('payment/payflow_link/pwd', $_configData)) {
                $_configData['payment/payflow_link/pwd'] = $objectManager->get(
                    EncryptorInterface::class
                )->decrypt(
                    $_configData['payment/payflow_link/pwd']
                );
            }
            $this->assertEquals($expectedData, $_configData);
        }
    }

<<<<<<< HEAD
    public static function saveDataProvider()
=======
    public function saveDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return require __DIR__ . '/_files/config_section.php';
    }

    /**
     * @param string $website
     * @param string $section
     * @param array $override
     * @param array $inherit
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('saveWebsiteScopeDataProvider')]
=======
     * @dataProvider saveWebsiteScopeDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveUseDefault(
        string $website,
        string $section,
        array $override,
        array $inherit,
        array $expected
    ): void {
        $objectManager = Bootstrap::getObjectManager();
        /** @var Config $config*/
        $configFactory = $objectManager->create(ConfigFactory::class);
        $config = $configFactory->create()
            ->setSection($section)
            ->setWebsite($website)
            ->setGroups($override['groups'])
            ->save();

        $paths = array_keys($expected);

        $this->assertEquals(
            $expected,
            $this->getConfigValues($config->getScope(), $config->getScopeId(), $paths)
        );

        $config = $configFactory->create()
            ->setSection($section)
            ->setWebsite($website)
            ->setGroups($inherit['groups'])
            ->save();

        $this->assertEmpty(
            $this->getConfigValues($config->getScope(), $config->getScopeId(), $paths)
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function saveWebsiteScopeDataProvider(): array
    {
        return [
            [
                'base',
                'payment',
=======
    public function saveWebsiteScopeDataProvider(): array
    {
        return [
            [
                'website' => 'base',
                'section' => 'payment',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'groups' => [
                        'account' => [
                            'fields' => [
                                'merchant_country' => ['value' => 'GB'],
                            ],
                        ],
                    ]
                ],
                [
                    'groups' => [
                        'account' => [
                            'fields' => [
                                'merchant_country' => ['inherit' => 1],
                            ],
                        ],
                    ],
                ],
<<<<<<< HEAD
                [
=======
                'expected' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'paypal/general/merchant_country' => 'GB',
                ],
            ]
        ];
    }

    /**
     * @param string $scope
     * @param int $scopeId
     * @param array $paths
     * @return array
     */
    private function getConfigValues(string $scope, int $scopeId, array $paths): array
    {
        $objectManager = Bootstrap::getObjectManager();
        /** @var Collection $configCollection */
        $configCollectionFactory = $objectManager->create(CollectionFactory::class);
        $configCollection = $configCollectionFactory->create();
        $configCollection->addFieldToFilter('scope', $scope);
        $configCollection->addFieldToFilter('scope_id', $scopeId);
        $configCollection->addFieldToFilter('path', ['in' => $paths]);
        $result = [];
        foreach ($configCollection as $data) {
            $result[$data->getPath()] = $data->getValue();
        }
        return $result;
    }
}
