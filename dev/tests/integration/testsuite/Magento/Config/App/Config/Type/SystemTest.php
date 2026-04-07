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
namespace Magento\Config\App\Config\Type;

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * @magentoDataFixture Magento/Config/_files/config_data.php
 * @magentoAppIsolation enabled
 */
class SystemTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var System
     */
    private $system;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->system = $this->objectManager->create(System::class);
    }

<<<<<<< HEAD
    public static function tearDownAfterClass(): void
    {
        unset($_ENV['CONFIG__STORES__DEFAULT__ABC__QRS__XYZ']);
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetValueDefaultScope()
    {
        $this->assertEquals(
            'value1.db.default.test',
            $this->system->get('default/web/test/test_value_1')
        );

        $this->assertEquals(
            'value1.db.website_base.test',
            $this->system->get('websites/base/web/test/test_value_1')
        );

        $this->assertEquals(
            'value1.db.store_default.test',
            $this->system->get('stores/default/web/test/test_value_1')
        );
    }
<<<<<<< HEAD

    /**
     * Tests that configurations added as env variables don't cause the error 'Recursion detected'
     * after cleaning the cache.
     *
     * @return void
     */
    public function testEnvGetValueStoreScope()
    {
        $_ENV['CONFIG__STORES__DEFAULT__ABC__QRS__XYZ'] = 'test_env_value';
        $this->system->clean();

        $this->assertEquals(
            'value1.db.default.test',
            $this->system->get('default/web/test/test_value_1')
        );
        $this->assertEquals(
            'test_env_value',
            $this->system->get('stores/default/abc/qrs/xyz')
        );
    }

    protected function tearDown(): void
    {
        unset($_ENV['CONFIG__STORES__DEFAULT__ABC__QRS__XYZ']);
        parent::tearDown();
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
