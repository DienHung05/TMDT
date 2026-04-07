<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Test class for \Magento\TestFramework\Bootstrap\Settings.
 */
namespace Magento\Test\Bootstrap;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
use Magento\TestFramework\Bootstrap\Settings;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class SettingsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Bootstrap\Settings
     */
    protected $_object;

    /**
<<<<<<< HEAD
     * Get fixture directory path
     *
     * @return string
     */
    private static function getFixtureDir(): string
    {
        return realpath(__DIR__ . '/_files') . '/';
=======
     * @var string
     */
    protected $_fixtureDir;

    /**
     * Define the fixture directory to be used in both data providers and tests
     *
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->_fixtureDir = realpath(__DIR__ . '/_files') . '/';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->_object = new Settings(
            self::getFixtureDir(),
=======
        $this->_object = new \Magento\TestFramework\Bootstrap\Settings(
            $this->_fixtureDir,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'item_label' => 'Item Label',
                'number_of_items' => 42,
                'item_price' => 12.99,
                'is_in_stock' => true,
                'free_shipping' => 'enabled',
                'zero_value' => '0',
                'test_file' => 'metrics.php',
                'all_xml_files' => '*.xml',
                'all_xml_or_one_php_file' => '{*.xml,4.php}',
                'one_xml_or_any_php_file' => '1.xml;?.php',
                'config_file_with_dist' => '1.xml',
                'config_file_no_dist' => '2.xml',
                'no_config_file_dist' => '3.xml'
            ]
        );
    }

    protected function tearDown(): void
    {
        $this->_object = null;
    }

    /**
     */
    public function testConstructorNonExistingBaseDir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Base path \'non_existing_dir\' has to be an existing directory.');

<<<<<<< HEAD
        new Settings('non_existing_dir', []);
=======
        new \Magento\TestFramework\Bootstrap\Settings('non_existing_dir', []);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param string $settingName
     * @param mixed $defaultValue
     * @param mixed $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getDataProvider')]
=======
     * @dataProvider getDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGet($settingName, $defaultValue, $expectedResult)
    {
        $this->assertSame($expectedResult, $this->_object->get($settingName, $defaultValue));
    }

<<<<<<< HEAD
    public static function getDataProvider(): array
=======
    public function getDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'string type' => ['item_label', null, 'Item Label'],
            'integer type' => ['number_of_items', null, 42],
            'float type' => ['item_price', null, 12.99],
            'boolean type' => ['is_in_stock', null, true],
            'non-existing' => ['non_existing', null, null],
            'zero string' => ['zero_value', '1', '0'],
            'default value' => ['non_existing', 'default', 'default']
        ];
    }

    /**
     * @param string $settingName
     * @param bool $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getAsBooleanDataProvider')]
=======
     * @dataProvider getAsBooleanDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAsBoolean($settingName, $expectedResult)
    {
        $this->assertSame($expectedResult, $this->_object->getAsBoolean($settingName));
    }

<<<<<<< HEAD
    public static function getAsBooleanDataProvider(): array
=======
    public function getAsBooleanDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'non-enabled string' => ['item_label', false],
            'non-enabled boolean' => ['is_in_stock', false],
            'enabled string' => ['free_shipping', true]
        ];
    }

    /**
     * @param string $settingName
     * @param mixed $defaultValue
     * @param string $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getAsFileDataProvider')]
=======
     * @dataProvider getAsFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAsFile($settingName, $defaultValue, $expectedResult)
    {
        $this->assertSame($expectedResult, $this->_object->getAsFile($settingName, $defaultValue));
    }

<<<<<<< HEAD
    public static function getAsFileDataProvider(): array
    {
        return [
            'existing file' => ['test_file', '', self::getFixtureDir(). 'metrics.php'],
            'zero value setting' => ['zero_value', 'default_should_be_ignored', self::getFixtureDir(). '0'],
            'empty default value' => ['non_existing_file', '', ''],
            'zero default value' => ['non_existing_file', '0', self::getFixtureDir(). '0'],
            'default value' => ['non_existing_file', 'metrics.php', self::getFixtureDir(). 'metrics.php']
=======
    public function getAsFileDataProvider()
    {
        return [
            'existing file' => ['test_file', '', "{$this->_fixtureDir}metrics.php"],
            'zero value setting' => ['zero_value', 'default_should_be_ignored', "{$this->_fixtureDir}0"],
            'empty default value' => ['non_existing_file', '', ''],
            'zero default value' => ['non_existing_file', '0', "{$this->_fixtureDir}0"],
            'default value' => ['non_existing_file', 'metrics.php', "{$this->_fixtureDir}metrics.php"]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @param string $settingName
     * @param string $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getAsMatchingPathsDataProvider')]
=======
     * @dataProvider getAsMatchingPathsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAsMatchingPaths($settingName, $expectedResult)
    {
        $actualResult = $this->_object->getAsMatchingPaths($settingName);
        if (is_array($actualResult)) {
            sort($actualResult);
        }
        $this->assertEquals($expectedResult, $actualResult);
    }

<<<<<<< HEAD
    public static function getAsMatchingPathsDataProvider(): array
=======
    public function getAsMatchingPathsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'single pattern' => [
                'all_xml_files',
<<<<<<< HEAD
                [self::getFixtureDir(). '1.xml', self::getFixtureDir(). '2.xml'],
            ],
            'pattern with braces' => [
                'all_xml_or_one_php_file',
                [self::getFixtureDir(). '1.xml', self::getFixtureDir(). '2.xml', self::getFixtureDir(). '4.php'],
            ],
            'multiple patterns' => [
                'one_xml_or_any_php_file',
                [self::getFixtureDir(). '1.xml', self::getFixtureDir(). '4.php'],
            ],
            'non-existing setting' => ['non_existing', []],
            'setting with zero value' => ['zero_value', [self::getFixtureDir(). '0']]
=======
                ["{$this->_fixtureDir}1.xml", "{$this->_fixtureDir}2.xml"],
            ],
            'pattern with braces' => [
                'all_xml_or_one_php_file',
                ["{$this->_fixtureDir}1.xml", "{$this->_fixtureDir}2.xml", "{$this->_fixtureDir}4.php"],
            ],
            'multiple patterns' => [
                'one_xml_or_any_php_file',
                ["{$this->_fixtureDir}1.xml", "{$this->_fixtureDir}4.php"],
            ],
            'non-existing setting' => ['non_existing', []],
            'setting with zero value' => ['zero_value', ["{$this->_fixtureDir}0"]]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @param string $settingName
     * @param mixed $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getAsConfigFileDataProvider')]
=======
     * @dataProvider getAsConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAsConfigFile($settingName, $expectedResult)
    {
        $actualResult = $this->_object->getAsConfigFile($settingName);
        if (is_array($actualResult)) {
            sort($actualResult);
        }
        $this->assertEquals($expectedResult, $actualResult);
    }

<<<<<<< HEAD
    public static function getAsConfigFileDataProvider(): array
    {
        return [
            'config file & dist file' => ['config_file_with_dist', self::getFixtureDir(). '1.xml'],
            'config file & no dist file' => ['config_file_no_dist', self::getFixtureDir(). '2.xml'],
            'no config file & dist file' => ['no_config_file_dist', self::getFixtureDir(). '3.xml.dist']
=======
    public function getAsConfigFileDataProvider()
    {
        return [
            'config file & dist file' => ['config_file_with_dist', "{$this->_fixtureDir}1.xml"],
            'config file & no dist file' => ['config_file_no_dist', "{$this->_fixtureDir}2.xml"],
            'no config file & dist file' => ['no_config_file_dist', "{$this->_fixtureDir}3.xml.dist"]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @param string $settingName
     * @param string $expectedExceptionMsg
<<<<<<< HEAD
     */
    #[DataProvider('getAsConfigFileExceptionDataProvider')]
=======
     * @dataProvider getAsConfigFileExceptionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAsConfigFileException($settingName, $expectedExceptionMsg)
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);
        $this->expectExceptionMessage((string)$expectedExceptionMsg);
        $this->_object->getAsConfigFile($settingName);
    }

<<<<<<< HEAD
    public static function getAsConfigFileExceptionDataProvider(): array
=======
    public function getAsConfigFileExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'non-existing setting' => [
                'non_existing',
                __("Setting 'non_existing' specifies the non-existing file ''."),
            ],
            'non-existing file' => [
                'item_label',
<<<<<<< HEAD
                __("Setting 'item_label' specifies the non-existing file '%1Item Label.dist'.", self::getFixtureDir()),
=======
                __("Setting 'item_label' specifies the non-existing file '%1Item Label.dist'.", $this->_fixtureDir),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        ];
    }
}
