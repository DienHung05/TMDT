<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\App\Route;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Helper\CacheCleaner;
use Magento\TestFramework\ObjectManager;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * @param string $route
     * @param string $scope
<<<<<<< HEAD
     */
    #[DataProvider('getRouteFrontNameDataProvider')]
    public function testGetRouteFrontName($route, $scope)
    {
        self::assertEquals(
            Bootstrap::getObjectManager()->create(Config::class)->getRouteFrontName($route, $scope),
            Bootstrap::getObjectManager()->create(Config::class)->getRouteFrontName($route, $scope)
        );
    }

    public static function getRouteFrontNameDataProvider()
=======
     * @dataProvider getRouteFrontNameDataProvider
     */
    public function testGetRouteFrontName($route, $scope)
    {
        $this->assertEquals(
            $this->objectManager->create(Config::class)->getRouteFrontName($route, $scope),
            $this->objectManager->create(Config::class)->getRouteFrontName($route, $scope)
        );
    }

    public function getRouteFrontNameDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['adminhtml', 'adminhtml'],
            ['catalog', 'frontend'],
        ];
    }
}
