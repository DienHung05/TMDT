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

namespace Magento\Setup\Test\Unit\Model\ConfigOptionsList;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\Config\Data\ConfigData;
use Magento\Framework\Setup\Option\SelectConfigOption;
use Magento\Framework\Setup\Option\TextConfigOption;
use Magento\Setup\Model\ConfigOptionsList\Session as SessionConfigOptionsList;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
=======

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class SessionTest extends TestCase
{
    /**
     * @var \Magento\Setup\Model\ConfigOptionsList\Session
     */
    private $configList;

    /**
     * @var DeploymentConfig
     */
    private $deploymentConfigMock;

    protected function setUp(): void
    {
        $this->configList = new SessionConfigOptionsList();

        $this->deploymentConfigMock = $this->createMock(DeploymentConfig::class);
    }

<<<<<<< HEAD
    public function testGetOptions(): void
    {
        $options = $this->configList->getOptions();
        $this->assertCount(47, $options);

        $expectedOptions = [
            [SelectConfigOption::class, 'session-save'],
            [TextConfigOption::class, 'session-save-redis-host'],
            [TextConfigOption::class, 'session-save-redis-port'],
            [TextConfigOption::class, 'session-save-redis-password'],
            [TextConfigOption::class, 'session-save-redis-timeout'],
            [TextConfigOption::class, 'session-save-redis-retries'],
            [TextConfigOption::class, 'session-save-redis-persistent-id'],
            [TextConfigOption::class, 'session-save-redis-db'],
            [TextConfigOption::class, 'session-save-redis-compression-threshold'],
            [TextConfigOption::class, 'session-save-redis-compression-lib'],
            [TextConfigOption::class, 'session-save-redis-log-level'],
            [TextConfigOption::class, 'session-save-redis-max-concurrency'],
            [TextConfigOption::class, 'session-save-redis-break-after-frontend'],
            [TextConfigOption::class, 'session-save-redis-break-after-adminhtml'],
            [TextConfigOption::class, 'session-save-redis-first-lifetime'],
            [TextConfigOption::class, 'session-save-redis-bot-first-lifetime'],
            [TextConfigOption::class, 'session-save-redis-bot-lifetime'],
            [TextConfigOption::class, 'session-save-redis-disable-locking'],
            [TextConfigOption::class, 'session-save-redis-min-lifetime'],
            [TextConfigOption::class, 'session-save-redis-max-lifetime'],
            [TextConfigOption::class, 'session-save-redis-sentinel-master'],
            [TextConfigOption::class, 'session-save-redis-sentinel-servers'],
            [TextConfigOption::class, 'session-save-redis-sentinel-verify-master'],
            [TextConfigOption::class, 'session-save-redis-sentinel-connect-retries'],
            [TextConfigOption::class, 'session-save-valkey-host'],
            [TextConfigOption::class, 'session-save-valkey-port'],
            [TextConfigOption::class, 'session-save-valkey-password'],
            [TextConfigOption::class, 'session-save-valkey-timeout'],
            [TextConfigOption::class, 'session-save-valkey-retries'],
            [TextConfigOption::class, 'session-save-valkey-persistent-id'],
            [TextConfigOption::class, 'session-save-valkey-db'],
            [TextConfigOption::class, 'session-save-valkey-compression-threshold'],
            [TextConfigOption::class, 'session-save-valkey-compression-lib'],
            [TextConfigOption::class, 'session-save-valkey-log-level'],
            [TextConfigOption::class, 'session-save-valkey-max-concurrency'],
            [TextConfigOption::class, 'session-save-valkey-break-after-frontend'],
            [TextConfigOption::class, 'session-save-valkey-break-after-adminhtml'],
            [TextConfigOption::class, 'session-save-valkey-first-lifetime'],
            [TextConfigOption::class, 'session-save-valkey-bot-first-lifetime'],
            [TextConfigOption::class, 'session-save-valkey-bot-lifetime'],
            [TextConfigOption::class, 'session-save-valkey-disable-locking'],
            [TextConfigOption::class, 'session-save-valkey-min-lifetime'],
            [TextConfigOption::class, 'session-save-valkey-max-lifetime'],
            [TextConfigOption::class, 'session-save-valkey-sentinel-master'],
            [TextConfigOption::class, 'session-save-valkey-sentinel-servers'],
            [TextConfigOption::class, 'session-save-valkey-sentinel-verify-master'],
            [TextConfigOption::class, 'session-save-valkey-sentinel-connect-retries'],
        ];

        foreach ($expectedOptions as $index => [$expectedClass, $expectedName]) {
            $this->assertArrayHasKey($index, $options, "Option at index $index not found.");
            $this->assertInstanceOf(
                $expectedClass,
                $options[$index],
                "Option at index $index is not of expected class."
            );
            $this->assertEquals(
                $expectedName,
                $options[$index]->getName(),
                "Option at index $index has incorrect name."
            );
        }
=======
    public function testGetOptions()
    {
        $options = $this->configList->getOptions();
        $this->assertCount(23, $options);

        $this->assertArrayHasKey(0, $options);
        $this->assertInstanceOf(SelectConfigOption::class, $options[0]);
        $this->assertEquals('session-save', $options[0]->getName());

        $this->assertArrayHasKey(1, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[1]);
        $this->assertEquals('session-save-redis-host', $options[1]->getName());

        $this->assertArrayHasKey(2, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[2]);
        $this->assertEquals('session-save-redis-port', $options[2]->getName());

        $this->assertArrayHasKey(3, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[3]);
        $this->assertEquals('session-save-redis-password', $options[3]->getName());

        $this->assertArrayHasKey(4, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[4]);
        $this->assertEquals('session-save-redis-timeout', $options[4]->getName());

        $this->assertArrayHasKey(5, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[5]);
        $this->assertEquals('session-save-redis-persistent-id', $options[5]->getName());

        $this->assertArrayHasKey(6, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[6]);
        $this->assertEquals('session-save-redis-db', $options[6]->getName());

        $this->assertArrayHasKey(7, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[7]);
        $this->assertEquals('session-save-redis-compression-threshold', $options[7]->getName());

        $this->assertArrayHasKey(8, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[8]);
        $this->assertEquals('session-save-redis-compression-lib', $options[8]->getName());

        $this->assertArrayHasKey(9, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[9]);
        $this->assertEquals('session-save-redis-log-level', $options[9]->getName());

        $this->assertArrayHasKey(10, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[10]);
        $this->assertEquals('session-save-redis-max-concurrency', $options[10]->getName());

        $this->assertArrayHasKey(11, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[11]);
        $this->assertEquals('session-save-redis-break-after-frontend', $options[11]->getName());

        $this->assertArrayHasKey(12, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[12]);
        $this->assertEquals('session-save-redis-break-after-adminhtml', $options[12]->getName());

        $this->assertArrayHasKey(13, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[13]);
        $this->assertEquals('session-save-redis-first-lifetime', $options[13]->getName());

        $this->assertArrayHasKey(14, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[14]);
        $this->assertEquals('session-save-redis-bot-first-lifetime', $options[14]->getName());

        $this->assertArrayHasKey(15, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[15]);
        $this->assertEquals('session-save-redis-bot-lifetime', $options[15]->getName());

        $this->assertArrayHasKey(16, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[16]);
        $this->assertEquals('session-save-redis-disable-locking', $options[16]->getName());

        $this->assertArrayHasKey(17, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[17]);
        $this->assertEquals('session-save-redis-min-lifetime', $options[17]->getName());

        $this->assertArrayHasKey(18, $options);
        $this->assertInstanceOf(TextConfigOption::class, $options[18]);
        $this->assertEquals('session-save-redis-max-lifetime', $options[18]->getName());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testCreateConfig()
    {
        $configData = $this->configList->createConfig([], $this->deploymentConfigMock);
        $this->assertInstanceOf(ConfigData::class, $configData);
    }

    public function testCreateConfigWithSessionSaveFiles()
    {
        $expectedConfigData = [
            'session' => [
                'save' => 'files'
            ]
        ];

        $options = ['session-save' => 'files'];

        $configData = $this->configList->createConfig($options, $this->deploymentConfigMock);
        $this->assertEquals($expectedConfigData, $configData->getData());
    }

<<<<<<< HEAD
    /**
     * @param string $backend
     */
    #[DataProvider('sessionBackendProvider')]
    public function testCreateConfigWithSessionSaveBackend(string $backend)
=======
    public function testCreateConfigWithSessionSaveRedis()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->deploymentConfigMock->expects($this->any())->method('get')->willReturn('');

        $expectedConfigData = [
            'session' => [
<<<<<<< HEAD
                'save' => $backend,
                $backend => [
=======
                'save' => 'redis',
                'redis' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'host' => '',
                    'port' => '',
                    'password' => '',
                    'timeout' => '',
<<<<<<< HEAD
                    'retries' => '',
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'persistent_identifier' => '',
                    'database' => '',
                    'compression_threshold' => '',
                    'compression_library' => '',
                    'log_level' => '',
                    'max_concurrency' => '',
                    'break_after_frontend' => '',
                    'break_after_adminhtml' => '',
                    'first_lifetime' => '',
                    'bot_first_lifetime' => '',
                    'bot_lifetime' => '',
                    'disable_locking' => '',
                    'min_lifetime' => '',
                    'max_lifetime' => '',
                    'sentinel_master' => '',
                    'sentinel_servers' => '',
                    'sentinel_connect_retries' => '',
                    'sentinel_verify_master' => '',
                ]
<<<<<<< HEAD
            ]
        ];

        $options = ['session-save' => $backend];
=======

            ]
        ];

        $options = ['session-save' => 'redis'];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $configData = $this->configList->createConfig($options, $this->deploymentConfigMock);
        $this->assertEquals($expectedConfigData, $configData->getData());
    }

    public function testEmptyCreateConfig()
    {
        $expectedConfigData = [];

        $config = $this->configList->createConfig([], $this->deploymentConfigMock);
        $this->assertEquals($expectedConfigData, $config->getData());
    }

    public function testCreateConfigWithRedisInput()
    {
        $this->deploymentConfigMock->expects($this->any())->method('get')->willReturn('');

        $options = [
            'session-save' => 'redis',
            'session-save-redis-host' => 'localhost',
            'session-save-redis-log-level' => '4',
            'session-save-redis-min-lifetime' => '60',
            'session-save-redis-max-lifetime' => '3600',
        ];

        $expectedConfigData = [
            'session' => [
                'save' => 'redis',
                'redis' => [
                    'host' => 'localhost',
                    'port' => '',
                    'password' => '',
                    'timeout' => '',
<<<<<<< HEAD
                    'retries' => '',
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'persistent_identifier' => '',
                    'database' => '',
                    'compression_threshold' => '',
                    'compression_library' => '',
                    'log_level' => '4',
                    'max_concurrency' => '',
                    'break_after_frontend' => '',
                    'break_after_adminhtml' => '',
                    'first_lifetime' => '',
                    'bot_first_lifetime' => '',
                    'bot_lifetime' => '',
                    'disable_locking' => '',
                    'min_lifetime' => '60',
                    'max_lifetime' => '3600',
                    'sentinel_master' => '',
                    'sentinel_servers' => '',
                    'sentinel_connect_retries' => '',
                    'sentinel_verify_master' => '',
                ]
            ],

        ];

        $config = $this->configList->createConfig($options, $this->deploymentConfigMock);
        $actualConfigData = $config->getData();

        $this->assertEquals($expectedConfigData, $actualConfigData);
    }

    /**
     * @param string $option
     * @param string $configArrayKey
     * @param string $optionValue
<<<<<<< HEAD
     */
    #[DataProvider('redisOptionProvider')]
=======
     * @dataProvider redisOptionProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIndividualOptionsAreSetProperly($option, $configArrayKey, $optionValue)
    {
        $configData = $this->configList->createConfig([$option => $optionValue], $this->deploymentConfigMock);
        $redisConfigData = $configData->getData()['session']['redis'];

        $this->assertEquals($redisConfigData[$configArrayKey], $optionValue);
    }

    public function testValidationWithValidOptions()
    {
        $options = [
            'session-save' => 'files',
            'session-save-redis-host' => 'localhost',
            'session-save-redis-compression-library' => 'gzip'
        ];

        $errors = $this->configList->validate($options, $this->deploymentConfigMock);

        $this->assertEmpty($errors);
    }

    /**
     * @param string $option
     * @param string $invalidInput
     * @param string $errorMessage
<<<<<<< HEAD
     */
    #[DataProvider('invalidOptionsProvider')]
=======
     * @dataProvider invalidOptionsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidationWithInvalidOptions($option, $invalidInput, $errorMessage)
    {
        $errors = $this->configList->validate([$option => $invalidInput], $this->deploymentConfigMock);

        $this->assertCount(1, $errors);
        $this->assertSame($errorMessage, $errors[0]);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function redisOptionProvider()
=======
    public function redisOptionProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['session-save-redis-host', 'host', 'google'],
            ['session-save-redis-port', 'port', '1234'],
            ['session-save-redis-password', 'password', 'secretPassword'],
            ['session-save-redis-timeout', 'timeout', '1000'],
            ['session-save-redis-persistent-id', 'persistent_identifier', 'foo'],
            ['session-save-redis-db', 'database', '5'],
            ['session-save-redis-compression-threshold', 'compression_threshold', '1024'],
            ['session-save-redis-compression-lib', 'compression_library', 'tar'],
            ['session-save-redis-log-level', 'log_level', '2'],
            ['session-save-redis-max-concurrency', 'max_concurrency', '3'],
            ['session-save-redis-break-after-frontend', 'break_after_frontend', '10'],
            ['session-save-redis-break-after-adminhtml', 'break_after_adminhtml', '20'],
            ['session-save-redis-first-lifetime', 'first_lifetime', '300'],
            ['session-save-redis-bot-first-lifetime', 'bot_first_lifetime', '30'],
            ['session-save-redis-bot-lifetime', 'bot_lifetime', '3600'],
            ['session-save-redis-disable-locking', 'disable_locking', '1'],
            ['session-save-redis-min-lifetime', 'min_lifetime', '20'],
            ['session-save-redis-max-lifetime', 'max_lifetime', '12000'],
        ];
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function invalidOptionsProvider()
=======
    public function invalidOptionsProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['session-save', 'clay-tablet', 'Invalid session handler \'clay-tablet\''],
            ['session-save-redis-log-level', '10', 'Invalid Redis log level \'10\'. Valid range is 0-7, inclusive.'],
            ['session-save-redis-compression-lib', 'foobar', 'Invalid Redis compression library \'foobar\''],
        ];
    }
<<<<<<< HEAD

    public static function sessionBackendProvider(): array
    {
        return [
            'Redis backend' => ['redis'],
            'Valkey backend' => ['valkey'],
        ];
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
