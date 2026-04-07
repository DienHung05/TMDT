<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Setup;

<<<<<<< HEAD
use Magento\Framework\Setup\Mvc\MvcEvent;

/**
 * Native module declaration
 */
class Module
{
    /**
     * Native bootstrap method
     *
     * @param MvcEvent $e
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    // phpcs:disable
    public function onBootstrap(MvcEvent $e)
    {
        // Simplified native bootstrap for CLI setup commands
        // Most of the original functionality (headers, routing) is not needed for setup commands
        // The main purpose is to initialize basic services for compatibility
    }
    // phpcs:disable
=======
use Laminas\EventManager\EventInterface;
use Laminas\EventManager\EventManager;
use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\Stdlib\DispatchableInterface;
use Magento\Framework\App\Response\HeaderProvider\XssProtection;
use Magento\Setup\Mvc\View\Http\InjectTemplateListener;

/**
 * Laminas module declaration
 */
class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface
{
    /**
     * @inheritDoc
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var MvcEvent $e */
        /** @var \Laminas\Mvc\Application $application */
        $application = $e->getApplication();
        /** @var EventManager $events */
        $events = $application->getEventManager();
        /** @var \Laminas\EventManager\SharedEventManager $sharedEvents */
        $sharedEvents = $events->getSharedManager();

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($events);

        // Override Laminas\Mvc\View\Http\InjectTemplateListener
        // to process templates by Vendor/Module
        $injectTemplateListener = new InjectTemplateListener();
        $sharedEvents->attach(
            DispatchableInterface::class,
            MvcEvent::EVENT_DISPATCH,
            [$injectTemplateListener, 'injectTemplate'],
            -89
        );
        $response = $e->getResponse();
        if ($response instanceof \Laminas\Http\Response) {
            $headers = $response->getHeaders();
            if ($headers) {
                $headers->addHeaderLine('Cache-Control', 'no-cache, no-store, must-revalidate');
                $headers->addHeaderLine('Pragma', 'no-cache');
                $headers->addHeaderLine('Expires', '1970-01-01');
                $headers->addHeaderLine('X-Frame-Options: SAMEORIGIN');
                $headers->addHeaderLine('X-Content-Type-Options: nosniff');
                /** @var \Laminas\Http\Header\UserAgent $userAgentHeader */
                $userAgentHeader = $e->getRequest()->getHeader('User-Agent');
                $xssHeaderValue = $userAgentHeader && $userAgentHeader->getFieldValue()
                    && strpos($userAgentHeader->getFieldValue(), XssProtection::IE_8_USER_AGENT) === false
                    ? XssProtection::HEADER_ENABLED : XssProtection::HEADER_DISABLED;
                $headers->addHeaderLine('X-XSS-Protection: ' . $xssHeaderValue);
            }
        }
    }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        // phpcs:disable
        $result = array_merge_recursive(
            include __DIR__ . '/../../../config/module.config.php',
            include __DIR__ . '/../../../config/di.config.php',
        );
        // phpcs:enable
        return $result;
    }
}
