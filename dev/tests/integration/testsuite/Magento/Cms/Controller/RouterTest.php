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

namespace Magento\Cms\Controller;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class RouterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Cms\Controller\Router
     */
    protected $_model;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->markTestSkipped('MAGETWO-3393');
=======
        $this->markTestIncomplete('MAGETWO-3393');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_model = new \Magento\Cms\Controller\Router(
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                \Magento\Framework\App\ActionFactory::class
            ),
            new \Magento\Framework\Event\ManagerInterfaceStub(
                $this->getMockForAbstractClass(\Magento\Framework\Event\InvokerInterface::class),
                $this->createMock(\Magento\Framework\Event\Config::class),
                $this->createMock(\Magento\Framework\EventFactory::class),
                $this->createMock(\Magento\Framework\Event\ObserverFactory::class)
            ),
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\UrlInterface::class),
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Cms\Model\PageFactory::class),
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                \Magento\Store\Model\StoreManagerInterface::class
            ),
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                \Magento\Store\Model\StoreManagerInterface::class
            )
        );
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testMatch()
    {
<<<<<<< HEAD
        $this->markTestSkipped('MAGETWO-3393');
=======
        $this->markTestIncomplete('MAGETWO-3393');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $request = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\App\RequestInterface::class);
        //Open Node
        $request->setPathInfo('parent_node');
        $controller = $this->_model->match($request);
        $this->assertInstanceOf(\Magento\Framework\App\Action\Redirect::class, $controller);
    }
}
/**
 * Event manager stub
 * @codingStandardsIgnoreStart
 */
namespace Magento\Framework\Event;

class ManagerStub extends Manager
{
    /**
     * Stub dispatch event
     *
     * @param string $eventName
     * @param array $params
     * @return null
     */
    public function dispatch($eventName, array $params = [])
    {
        switch ($eventName) {
            case 'cms_controller_router_match_before':
                $params['condition']->setRedirectUrl('http://www.example.com/');
                break;
        }

        return null;
    }
}
