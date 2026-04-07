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

namespace Magento\MessageQueue\Model\Cron;

use Magento\Framework\App\Config\ReinitableConfigInterface;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\DeploymentConfig\FileReader;
use Magento\Framework\App\DeploymentConfig\Writer;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Config\File\ConfigFilePool;
use Magento\Framework\Filesystem;
use Magento\Framework\Lock\Backend\Database;
use Magento\Framework\Lock\LockManagerInterface;
use Magento\Framework\MessageQueue\Consumer\ConfigInterface as ConsumerConfigInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\ShellInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Tests the different cases of consumers running by ConsumersRunner
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
<<<<<<< HEAD
#[AllowMockObjectsWithoutExpectations]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class ConsumersRunnerTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Consumer config provider
     *
     * @var ConsumerConfigInterface
     */
    private $consumerConfig;

    /**
     * @var LockManagerInterface
     */
    private $lockManager;

    /**
     * @var FileReader
     */
    private $reader;

    /**
     * @var ConsumersRunner
     */
    private $consumersRunner;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var ConfigFilePool
     */
    private $configFilePool;

    /**
     * @var ReinitableConfigInterface
     */
    private $appConfig;

    /**
     * @var ShellInterface|MockObject
     */
    private $shellMock;

    /**
     * @var array
     */
    private $config;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->shellMock = $this->getMockBuilder(ShellInterface::class)
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $resourceConnection = $this->objectManager->create(ResourceConnection::class);
        $deploymentConfig = $this->objectManager->create(DeploymentConfig::class);
        // create object with new otherwise dummy locker is created because of di.xml preference for integration tests
        $this->lockManager = new Database($resourceConnection, $deploymentConfig);
        $this->consumerConfig = $this->objectManager->get(ConsumerConfigInterface::class);
        $this->reader = $this->objectManager->get(FileReader::class);
        $this->filesystem = $this->objectManager->get(Filesystem::class);
        $this->configFilePool = $this->objectManager->get(ConfigFilePool::class);
        $this->appConfig = $this->objectManager->get(ReinitableConfigInterface::class);
        $this->consumersRunner = $this->objectManager->create(
            ConsumersRunner::class,
            ['shellBackground' => $this->shellMock]
        );
        $this->config = $this->loadConfig();

        $this->shellMock->expects($this->any())
            ->method('execute')
            ->willReturnCallback(
                function ($command, $arguments) {
                    $command = vsprintf($command, $arguments);
                    $params = Bootstrap::getInstance()->getAppInitParams();
                    $params['MAGE_DIRS']['base']['path'] = BP;
                    $params = 'INTEGRATION_TEST_PARAMS="' . urldecode(http_build_query($params)) . '"';
                    $command = str_replace('bin/magento', 'dev/tests/integration/bin/magento', $command);
                    $command = $params . ' ' . $command;

                    return exec("{$command} >/dev/null &"); //phpcs:ignore
                }
            );
    }

    /**
     * @param string $specificConsumer
     * @param int $maxMessage
     * @param string $command
     * @param array $expectedArguments
     *
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('runDataProvider')]
=======
     * @dataProvider runDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testArgumentMaxMessages(
        string $specificConsumer,
        int $maxMessage,
        string $command,
        array $expectedArguments
    ) {
        $config = $this->config;
        $config['cron_consumers_runner'] = ['consumers' => [$specificConsumer], 'max_messages' => $maxMessage];
        $this->writeConfig($config);
        $this->shellMock->expects($this->any())
            ->method('execute')
            ->with($command, $expectedArguments);

        $this->consumersRunner->run();
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function runDataProvider()
=======
    public function runDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
          [
              'specificConsumer' => 'exportProcessor',
<<<<<<< HEAD
              'maxMessage' => 10,
=======
              'max_messages' => 10,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
              'command' => PHP_BINARY . ' ' . BP . '/bin/magento queue:consumers:start %s %s %s',
              'expectedArguments' => ['exportProcessor', '--single-thread', '--max-messages=10'],
          ],
          [
              'specificConsumer' => 'exportProcessor',
<<<<<<< HEAD
              'maxMessage' => 5000,
              'command' => PHP_BINARY . ' ' . BP . '/bin/magento queue:consumers:start %s %s %s',
              'expectedArguments' => ['exportProcessor', '--single-thread', '--max-messages=5000'],
=======
              'max_messages' => 5000,
              'command' => PHP_BINARY . ' ' . BP . '/bin/magento queue:consumers:start %s %s %s',
              'expectedArguments' => ['exportProcessor', '--single-thread', '--max-messages=100'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
          ],
        ];
    }

    /**
     * Tests running of specific consumer and his re-running when it is working
     *
     * @return void
     */
    public function testSpecificConsumerAndRerun()
    {
        $specificConsumer = 'exportProcessor';
        $config = $this->config;
        $config['cron_consumers_runner'] = ['consumers' => [$specificConsumer], 'max_messages' => 0];
        $config['queue'] = ['only_spawn_when_message_available' => 0];
        $this->writeConfig($config);
        $this->reRunConsumersAndCheckLocks($specificConsumer);
        $this->reRunConsumersAndCheckLocks($specificConsumer);
        $this->assertTrue($this->lockManager->isLocked(md5($specificConsumer))); //phpcs:ignore
    }

    /**
     * @param string $specificConsumer
     * @return void
     */
    private function reRunConsumersAndCheckLocks($specificConsumer)
    {
        $this->consumersRunner->run();

        sleep(20);

        foreach ($this->consumerConfig->getConsumers() as $consumer) {
            $consumerName = $consumer->getName();

            if ($consumerName === $specificConsumer) {
                $this->assertTrue($this->lockManager->isLocked(md5($consumerName))); //phpcs:ignore
            } else {
                $this->assertFalse($this->lockManager->isLocked(md5($consumerName))); //phpcs:ignore
            }
        }
    }

    /**
     * Tests disabling cron job which runs consumers
     *
     * @return void
     */
    public function testCronJobDisabled()
    {
        $config = $this->config;
        $config['cron_consumers_runner'] = ['cron_run' => false];

        $this->writeConfig($config);

        $this->consumersRunner->run();

        sleep(20);

        foreach ($this->consumerConfig->getConsumers() as $consumer) {
            $this->assertFalse($this->lockManager->isLocked(md5($consumer->getName()))); //phpcs:ignore
        }
    }

    /**
     * @return array
     */
    private function loadConfig()
    {
        return $this->reader->load(ConfigFilePool::APP_ENV);
    }

    /**
     * @param array $config
     * @return void
     */
    private function writeConfig(array $config)
    {
        /** @var Writer $writer */
        $writer = $this->objectManager->get(Writer::class);
        $writer->saveConfig([ConfigFilePool::APP_ENV => $config]);
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        foreach ($this->consumerConfig->getConsumers() as $consumer) {
            foreach ($this->getConsumerProcessIds($consumer->getName()) as $consumerProcessId) {
                exec("kill {$consumerProcessId}"); //phpcs:ignore
            }
        }

        $this->filesystem->getDirectoryWrite(DirectoryList::CONFIG)->writeFile(
            $this->configFilePool->getPath(ConfigFilePool::APP_ENV),
            "<?php\n return array();\n"
        );
        $this->writeConfig($this->config);
        $this->appConfig->reinit();
    }

    /**
     * Get Consumer ProcessIds
     *
     * @param string $consumer
     * @return string[]
     */
    private function getConsumerProcessIds($consumer)
    {
        //phpcs:ignore
        exec("ps ax | grep -v grep | grep 'queue:consumers:start {$consumer}' | awk '{print $1}'", $output);
        return $output;
    }
}
