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

namespace Magento\Setup\Test\Unit\Module\Di\Code\Generator;

use Magento\Framework\App\Cache\Manager;
use Magento\Framework\App\Interception\Cache\CompiledConfig;
use Magento\Framework\Interception\Config\Config;
<<<<<<< HEAD
use Magento\Framework\Interception\ObjectManager\ConfigInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\ObjectManager\InterceptableValidator;
use Magento\Setup\Module\Di\Code\Generator\InterceptionConfigurationBuilder;
use Magento\Setup\Module\Di\Code\Generator\PluginList;
use Magento\Setup\Module\Di\Code\Reader\Type;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
=======
use PHPUnit\Framework\TestCase;
use stdClass;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class InterceptionConfigurationBuilderTest extends TestCase
{
    /**
     * @var InterceptionConfigurationBuilder
     */
    protected $model;

    /**
     * @var MockObject
     */
    protected $interceptionConfig;

    /**
     * @var MockObject
     */
    protected $pluginList;

    /**
     * @var MockObject
     */
    protected $typeReader;

    /**
     * @var MockObject
     */
    private $cacheManager;

    /**
     * @var InterceptableValidator|MockObject
     */
    private $interceptableValidator;

<<<<<<< HEAD
    /**
     * @var MockObject
     */
    private $omConfig;

    protected function setUp(): void
    {
        $this->interceptionConfig = $this->createPartialMock(Config::class, ['hasPlugins']);
=======
    protected function setUp(): void
    {
        $this->interceptionConfig =
            $this->createPartialMock(Config::class, ['hasPlugins']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->pluginList = $this->createPartialMock(
            PluginList::class,
            ['setInterceptedClasses', 'setScopePriorityScheme', 'getPluginsConfig']
        );
        $this->cacheManager = $this->createMock(Manager::class);
<<<<<<< HEAD
        $this->interceptableValidator = $this->createMock(InterceptableValidator::class);
        $this->omConfig = $this->createMock(ConfigInterface::class);
=======
        $this->interceptableValidator =
            $this->createMock(InterceptableValidator::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->typeReader = $this->createPartialMock(Type::class, ['isConcrete']);
        $this->model = new InterceptionConfigurationBuilder(
            $this->interceptionConfig,
            $this->pluginList,
            $this->typeReader,
            $this->cacheManager,
<<<<<<< HEAD
            $this->interceptableValidator,
            $this->omConfig
=======
            $this->interceptableValidator
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('getInterceptionConfigurationDataProvider')]
=======
     * @dataProvider getInterceptionConfigurationDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetInterceptionConfiguration($plugins)
    {
        $definedClasses = ['Class1'];
        $this->interceptionConfig->expects($this->once())
            ->method('hasPlugins')
            ->with('Class1')
            ->willReturn(true);
        $this->typeReader->expects($this->any())
            ->method('isConcrete')
            ->willReturnMap([
                ['Class1', true],
                ['instance', true],
            ]);
        $this->interceptableValidator->expects($this->any())
            ->method('validate')
            ->with('Class1')
            ->willReturn(true);

        $this->cacheManager->expects($this->once())
            ->method('setEnabled')
            ->with([CompiledConfig::TYPE_IDENTIFIER], true);
        $this->pluginList->expects($this->once())
            ->method('setInterceptedClasses')
            ->with($definedClasses);
        $this->pluginList->expects($this->once())
            ->method('setScopePriorityScheme')
            ->with(['global', 'areaCode']);
        $this->pluginList->expects($this->once())
            ->method('getPluginsConfig')
            ->willReturn(['instance' => $plugins]);

<<<<<<< HEAD
        $this->omConfig->expects($this->any())
            ->method('getOriginalInstanceType')
            ->willReturnMap([
                ['stdClass', 'stdClass'],
                ['virtualTypeClass', 'stdClass'],
            ]);

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->model->addAreaCode('areaCode');
        $this->model->getInterceptionConfiguration($definedClasses);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getInterceptionConfigurationDataProvider()
    {
        return [
            [null],
            [['plugin' => ['instance' => 'stdClass']]],
            [[
                'plugin'  => ['instance' => 'stdClass'],
                'plugin1' => ['instance' => 'stdClass'],
                'plugin2' => ['instance' => 'virtualTypeClass']
            ]],
            [['plugin' => ['instance' => 'virtualTypeClass']]],
=======
    public function getInterceptionConfigurationDataProvider()
    {
        $someInstance = new stdClass();
        return [
            [null],
            [['plugin' => ['instance' => $someInstance]]],
            [['plugin' => ['instance' => $someInstance], 'plugin2' => ['instance' => $someInstance]]]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
