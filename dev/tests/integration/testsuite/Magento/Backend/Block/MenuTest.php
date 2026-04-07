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
namespace Magento\Backend\Block;

use Magento\Framework\App\State;
use Magento\Framework\Component\ComponentRegistrar;

/**
 * Test class for \Magento\Backend\Block\Menu
 * @magentoAppArea adminhtml
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class MenuTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Backend\Block\Menu $blockMenu
     */
    protected $blockMenu;

    /** @var \Magento\Framework\App\Cache\Type\Config $configCacheType */
    protected $configCacheType;

    /**
     * @var array
     */
    protected $backupRegistrar;

    /**
     * @var \Magento\Backend\Model\Menu\Config
     */
    private $menuConfig;

    protected function setUp(): void
    {
        $this->configCacheType = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Cache\Type\Config::class
        );
        $this->configCacheType->save('', \Magento\Backend\Model\Menu\Config::CACHE_MENU_OBJECT);

        $reflection = new \ReflectionClass(\Magento\Framework\Component\ComponentRegistrar::class);
        $paths = $reflection->getProperty('paths');
<<<<<<< HEAD
        $this->backupRegistrar = $paths->getValue();
=======
        $paths->setAccessible(true);
        $this->backupRegistrar = $paths->getValue();
        $paths->setAccessible(false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->menuConfig = $this->prepareMenuConfig();

        $this->blockMenu = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Backend\Block\Menu::class,
            ['menuConfig' => $this->menuConfig]
        );
    }

    /**
     * Verify that Admin Navigation Menu elements have correct titles & are located on correct levels
     */
    public function testRenderNavigation()
    {
<<<<<<< HEAD
        $menuHtml = $this->blockMenu->renderNavigation($this->menuConfig->getMenu(), 0, 12);
=======
        $menuHtml = $this->blockMenu->renderNavigation($this->menuConfig->getMenu());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $menu = new \SimpleXMLElement($menuHtml);

        $item = $menu->xpath('/ul/li/a/span')[0];
        $this->assertEquals('System', (string)$item, '"System" item is absent or located on wrong menu level.');

        $item = $menu->xpath('/ul//ul/li/strong/span')[0];
        $this->assertEquals('Report', (string)$item, '"Report" item is absent or located on wrong menu level.');

        $liTitles = [
            'Private Sales',
            'Invite',
            'Invited Customers',
        ];
        foreach ($menu->xpath('/ul//ul//ul/li/a/span') as $sortOrder => $item) {
<<<<<<< HEAD
            if ($sortOrder>2) {
                break;
            }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $this->assertEquals(
                $liTitles[$sortOrder],
                (string)$item,
                '"' . $liTitles[$sortOrder] . '" item is absent or located on wrong menu level.'
            );
        }
<<<<<<< HEAD
        // test column break if submenu contain more than 12 node
        $this->assertStringContainsString('<li class="column">', $menuHtml);
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @return \Magento\Backend\Model\Menu\Config
     */
    protected function prepareMenuConfig()
    {
        $this->loginAdminUser();

        $componentRegistrar = new \Magento\Framework\Component\ComponentRegistrar();
        $libraryPath = $componentRegistrar->getPath(ComponentRegistrar::LIBRARY, 'magento/framework');

        $reflection = new \ReflectionClass(\Magento\Framework\Component\ComponentRegistrar::class);
        $paths = $reflection->getProperty('paths');
<<<<<<< HEAD

        $paths->setValue(
            null,
=======
        $paths->setAccessible(true);

        $paths->setValue(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                ComponentRegistrar::MODULE => [],
                ComponentRegistrar::THEME => [],
                ComponentRegistrar::LANGUAGE => [],
                ComponentRegistrar::LIBRARY => []
            ]
        );
<<<<<<< HEAD
=======
        $paths->setAccessible(false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        ComponentRegistrar::register(ComponentRegistrar::LIBRARY, 'magento/framework', $libraryPath);

        ComponentRegistrar::register(
            ComponentRegistrar::MODULE,
            'Magento_Backend',
            __DIR__ . '/_files/menu/Magento/Backend'
        );

        /* @var $validationState \Magento\Framework\App\Arguments\ValidationState */
        $validationState = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Arguments\ValidationState::class,
            ['appMode' => State::MODE_DEFAULT]
        );

        /* @var $configReader \Magento\Backend\Model\Menu\Config\Reader */
        $configReader = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Backend\Model\Menu\Config\Reader::class,
            ['validationState' => $validationState]
        );

        return \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Backend\Model\Menu\Config::class,
            [
                'configReader' => $configReader,
                'configCacheType' => $this->configCacheType
            ]
        );
    }

    /**
     * @return void
     */
    protected function loginAdminUser()
    {
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Backend\Model\UrlInterface::class)
            ->turnOffSecretKey();

        $auth = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Backend\Model\Auth::class);
        $auth->login(\Magento\TestFramework\Bootstrap::ADMIN_NAME, \Magento\TestFramework\Bootstrap::ADMIN_PASSWORD);
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        $this->configCacheType->save('', \Magento\Backend\Model\Menu\Config::CACHE_MENU_OBJECT);
        $reflection = new \ReflectionClass(\Magento\Framework\Component\ComponentRegistrar::class);
        $paths = $reflection->getProperty('paths');
<<<<<<< HEAD
        $paths->setValue(null, $this->backupRegistrar);
=======
        $paths->setAccessible(true);
        $paths->setValue($this->backupRegistrar);
        $paths->setAccessible(false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
