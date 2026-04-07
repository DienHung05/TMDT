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

namespace Magento\Backend\Controller\Adminhtml;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @magentoAppArea adminhtml
 */
class CacheTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @magentoDataFixture Magento/Backend/controllers/_files/cache/application_cache.php
     * @magentoDataFixture Magento/Backend/controllers/_files/cache/non_application_cache.php
     */
    public function testFlushAllAction()
    {
        /** @var $cache \Magento\Framework\App\Cache */
        $cache = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Cache::class
        );
        $this->assertNotEmpty($cache->load('APPLICATION_FIXTURE'));

        $this->dispatch('backend/admin/cache/flushAll');

        /** @var $cachePool \Magento\Framework\App\Cache\Frontend\Pool */
        $this->assertFalse($cache->load('APPLICATION_FIXTURE'));

        $cachePool = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Cache\Frontend\Pool::class
        );
        /** @var $cacheFrontend \Magento\Framework\Cache\FrontendInterface */
        foreach ($cachePool as $cacheFrontend) {
<<<<<<< HEAD
            $this->assertFalse($cacheFrontend->load('NON_APPLICATION_FIXTURE'));
=======
            $this->assertFalse($cacheFrontend->getBackend()->load('NON_APPLICATION_FIXTURE'));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
    }

    /**
     * @magentoDataFixture Magento/Backend/controllers/_files/cache/application_cache.php
     * @magentoDataFixture Magento/Backend/controllers/_files/cache/non_application_cache.php
     */
    public function testFlushSystemAction()
    {
        $this->dispatch('backend/admin/cache/flushSystem');

        /** @var $cache \Magento\Framework\App\Cache */
        $cache = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Cache::class
        );
        /** @var $cachePool \Magento\Framework\App\Cache\Frontend\Pool */
        $this->assertFalse($cache->load('APPLICATION_FIXTURE'));

        $cachePool = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Cache\Frontend\Pool::class
        );
        /** @var $cacheFrontend \Magento\Framework\Cache\FrontendInterface */
        foreach ($cachePool as $cacheFrontend) {
            $this->assertSame(
                'non-application cache data',
<<<<<<< HEAD
                $cacheFrontend->load('NON_APPLICATION_FIXTURE')
=======
                $cacheFrontend->getBackend()->load('NON_APPLICATION_FIXTURE')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            );
        }
    }

    /**
<<<<<<< HEAD
     * @param $action
     */
    #[DataProvider('massActionsInvalidTypesDataProvider')]
=======
     * @dataProvider massActionsInvalidTypesDataProvider
     * @param $action
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testMassActionsInvalidTypes($action)
    {
        $this->getRequest()->setParams(['types' => ['invalid_type_1', 'invalid_type_2', 'config']]);
        $this->dispatch('backend/admin/cache/' . $action);
        $this->assertSessionMessages(
            $this->containsEqual("These cache type(s) don&#039;t exist: invalid_type_1, invalid_type_2"),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function massActionsInvalidTypesDataProvider()
=======
    public function massActionsInvalidTypesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'enable' => ['massEnable'],
            'disable' => ['massDisable'],
            'refresh' => ['massRefresh']
        ];
    }
}
