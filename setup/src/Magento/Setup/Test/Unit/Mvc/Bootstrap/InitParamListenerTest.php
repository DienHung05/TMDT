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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Mvc\Bootstrap;

use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\SharedEventManager;
<<<<<<< HEAD
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Stdlib\RequestInterface;
use Magento\Framework\Setup\Mvc\MvcApplication;
use Magento\Framework\Setup\Mvc\MvcEvent;
=======
use Laminas\Mvc\Application;
use Laminas\Mvc\MvcEvent;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Stdlib\RequestInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\App\Bootstrap as AppBootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Setup\Mvc\Bootstrap\InitParamListener;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Test for \Magento\Setup\Mvc\Bootstrap\InitParamListener
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InitParamListenerTest extends TestCase
{

    /**
     * @var InitParamListener
     */
    private $listener;

<<<<<<< HEAD
    /**
     * @var array
     */
=======
    /** callable[][] */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    private $callbacks = [];

    protected function setUp(): void
    {
        $this->listener = new InitParamListener();
    }

    public function testAttach()
    {
        $events = $this->prepareEventManager();
        $this->listener->attach($events);
    }

    public function testDetach()
    {
        $events = $this->prepareEventManager();
        $this->listener->attach($events);
        $events->expects($this->once())->method('detach')->with([$this->listener, 'onBootstrap'])->willReturn(true);
        $this->listener->detach($events);
    }

    public function testOnBootstrap()
    {
        /** @var MvcEvent|MockObject $mvcEvent */
        $mvcEvent = $this->createMock(MvcEvent::class);
<<<<<<< HEAD
        $mvcApplication = $this->getMockBuilder(MvcApplication::class)
=======
        $mvcApplication = $this->getMockBuilder(Application::class)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->disableOriginalConstructor()
            ->getMock();
        $mvcEvent->expects($this->once())->method('getApplication')->willReturn($mvcApplication);
        $serviceManager = $this->createMock(ServiceManager::class);
        $initParams[AppBootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS][DirectoryList::ROOT] = ['path' => '/test'];
        $serviceManager->expects($this->once())->method('get')
            ->willReturn($initParams);
        $serviceManager->expects($this->exactly(2))->method('setService')
<<<<<<< HEAD
            ->willReturnCallback(
                function ($arg1, $arg2) {
                    if ($arg1 === DirectoryList::class && $arg2 instanceof DirectoryList) {
                        return null;
                    } elseif ($arg1 === Filesystem::class && $arg2 instanceof Filesystem) {
                        return null;
                    }
                }
            );
        $mvcApplication->expects($this->any())->method('getServiceManager')->willReturn($serviceManager);

        $eventManager = $this->createMock(EventManagerInterface::class);
=======
            ->withConsecutive(
                [
                    DirectoryList::class,
                    $this->isInstanceOf(DirectoryList::class),
                ],
                [
                    Filesystem::class,
                    $this->isInstanceOf(Filesystem::class),
                ]
            );
        $mvcApplication->expects($this->any())->method('getServiceManager')->willReturn($serviceManager);

        $eventManager = $this->getMockForAbstractClass(EventManagerInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $mvcApplication->expects($this->any())->method('getEventManager')->willReturn($eventManager);
        $eventManager->expects($this->any())->method('attach');

        $this->listener->onBootstrap($mvcEvent);
    }

    public function testCreateDirectoryList()
    {
        $initParams[AppBootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] =
            [DirectoryList::ROOT => [DirectoryList::PATH => '/test/root']];

        $directoryList = $this->listener->createDirectoryList($initParams);
        $this->assertEquals('/test/root/app', $directoryList->getPath(DirectoryList::APP));
    }

    public function testCreateDirectoryListException()
    {
        $this->expectException('LogicException');
        $this->expectExceptionMessage('Magento root directory is not specified.');
        $this->listener->createDirectoryList([]);
    }

    /**
     * @param array $zfAppConfig Data that comes from Laminas Framework Application config
     * @param array $env Config that comes from SetEnv
     * @param array|string|null $argv Argv
     * @param array $expectedArray Expected result array
     *
<<<<<<< HEAD
     */
    #[DataProvider('createServiceDataProvider')]
=======
     * @dataProvider createServiceDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateService($zfAppConfig, $env, $argv, $expectedArray)
    {
        foreach ($env as $envKey => $envValue) {
            $_SERVER[$envKey] = $envValue;
        }
        $listener = new InitParamListener();
        /**
         * @var ServiceLocatorInterface|MockObject $serviceLocator
         */
<<<<<<< HEAD
        $serviceLocator = $this->createMock(ServiceLocatorInterface::class);
        $mvcApplication = $this->getMockBuilder(MvcApplication::class)
=======
        $serviceLocator = $this->getMockForAbstractClass(ServiceLocatorInterface::class);
        $mvcApplication = $this->getMockBuilder(Application::class)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->disableOriginalConstructor()
            ->getMock();

        if ($argv !== null) {
            $zfAppConfig['argv'] = $argv;
            $expectedArray['argv'] = $argv;
        }

        $mvcApplication->expects($this->any())->method('getConfig')->willReturn(
            $zfAppConfig ? [InitParamListener::BOOTSTRAP_PARAM => $zfAppConfig] : []
        );

        $serviceLocator->expects($this->once())->method('get')->with('Application')
            ->willReturn($mvcApplication);

        $this->assertEquals($expectedArray, $listener->createService($serviceLocator));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function createServiceDataProvider()
=======
    public function createServiceDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'none' => [
                [], //zfAppConfig
                [], //env
                null, //argv
                [] //expectedArray
            ],
            'mage_mode App' => [
                ['MAGE_MODE' => 'developer'],
                [],
                '', //test non array value
                ['MAGE_MODE' => 'developer']
            ],
            'mage_mode Env' => [
                [],
                ['MAGE_MODE' => 'developer'],
                null,
                ['MAGE_MODE' => 'developer']
            ],
            'mage_mode CLI' => [
                [],
                [],
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_MODE=developer'],
                ['MAGE_MODE' => 'developer']
            ],
            'one MAGE_DIRS CLI' => [
                [],
                [],
<<<<<<< HEAD
                ['bin/magento', 'setup:install',
                    '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2'],
=======
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2']], 'MAGE_MODE' => 'developer'],
            ],
            'two MAGE_DIRS CLI' => [
                [],
                [],
<<<<<<< HEAD
                // phpcs:disable Generic.Files.LineLength
                ['bin/magento', 'setup:install',
                    '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2&MAGE_DIRS[cache][path]=/tmp/cache'],
                // phpcs:disable Generic.Files.LineLength
=======
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2&MAGE_DIRS[cache][path]=/tmp/cache'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2'], 'cache' => ['path' => '/tmp/cache']],
                    'MAGE_MODE' => 'developer',
                ],
            ],
            'mage_mode only' => [
                [],
                [],
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_MODE=developer'],
                ['MAGE_MODE' => 'developer']
            ],
            'MAGE_DIRS Env' => [
                [],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2']], 'MAGE_MODE' => 'developer'],
                null,
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2']], 'MAGE_MODE' => 'developer'],
            ],
            'two MAGE_DIRS' => [
                [],
                [],
<<<<<<< HEAD
                // phpcs:disable Generic.Files.LineLength
                ['bin/magento', 'setup:install',
                    '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2&MAGE_DIRS[cache][path]=/tmp/cache'],
                // phpcs:disable Generic.Files.LineLength
=======
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_MODE=developer&MAGE_DIRS[base][path]=/var/www/magento2&MAGE_DIRS[cache][path]=/tmp/cache'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2'], 'cache' => ['path' => '/tmp/cache']],
                    'MAGE_MODE' => 'developer',
                ],
            ],
            'Env overwrites App' => [
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/App']], 'MAGE_MODE' => 'developer'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/Env']], 'MAGE_MODE' => 'developer'],
                ['bin/magento', 'setup:install'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/Env']], 'MAGE_MODE' => 'developer'],
            ],
            'CLI overwrites Env' => [
                ['MAGE_MODE' => 'developer'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/Env']]],
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_DIRS[base][path]=/var/www/magento2/CLI'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/CLI']], 'MAGE_MODE' => 'developer'],
            ],
            'CLI overwrites All' => [
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/App']], 'MAGE_MODE' => 'production'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/Env']]],
                ['bin/magento', 'setup:install', '--magento-init-params=MAGE_DIRS[base][path]=/var/www/magento2/CLI'],
                ['MAGE_DIRS' => ['base' => ['path' => '/var/www/magento2/CLI']], 'MAGE_MODE' => 'developer'],
            ],
        ];
    }

    public function testCreateFilesystem()
    {
        $testPath = 'test/path/';

        /**
         * @var DirectoryList|
         * \PHPUnit\Framework\MockObject\MockObject $directoryList
         */
        $directoryList = $this->getMockBuilder(DirectoryList::class)
            ->disableOriginalConstructor()
            ->getMock();
        $directoryList->expects($this->any())->method('getPath')->willReturn($testPath);
        $filesystem = $this->listener->createFilesystem($directoryList);

        // Verifies the filesystem was created with the directory list passed in
        $this->assertEquals($testPath, $filesystem->getDirectoryRead('app')->getAbsolutePath());
    }

    /**
     * Prepare the event manager with a SharedEventManager, it will expect attach() to be called once.
     *
     * @return MockObject
     */
    private function prepareEventManager()
    {
        $this->callbacks[] = [$this->listener, 'onBootstrap'];

        /** @var EventManagerInterface|MockObject $events */
<<<<<<< HEAD
        $eventManager = $this->createMock(EventManagerInterface::class);

        $sharedManager = $this->createMock(SharedEventManager::class);
        $sharedManager->expects($this->once())->method('attach')->with(
            MvcApplication::class,
=======
        $eventManager = $this->getMockForAbstractClass(EventManagerInterface::class);

        $sharedManager = $this->createMock(SharedEventManager::class);
        $sharedManager->expects($this->once())->method('attach')->with(
            Application::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            MvcEvent::EVENT_BOOTSTRAP,
            [$this->listener, 'onBootstrap']
        );

        $sharedManager->expects($this->once())->method('getListeners')->willReturn($this->callbacks);
        $eventManager->expects($this->once())->method('getSharedManager')->willReturn($sharedManager);

        return $eventManager;
    }
}
