<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

namespace Magento\Setup\Mvc\View\Http;

use Magento\Framework\Setup\Mvc\MvcEvent;

/**
 * Native InjectTemplateListener for HTTP request (replaces Laminas dependency)
 *
 * @deprecated Web Setup support has been removed, this class is no longer in use.
 * @see we don't use it anymore
 */
class InjectTemplateListener
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Mvc\View\Http;

use Laminas\Mvc\MvcEvent;
use Laminas\Mvc\View\Http\InjectTemplateListener as LaminasInjectTemplateListener;

/**
 * InjectTemplateListener for HTTP request
 */
class InjectTemplateListener extends LaminasInjectTemplateListener
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
{
    /**
     * Determine the top-level namespace of the controller
     *
     * @param  string $controller
     * @return string
     */
<<<<<<< HEAD
    protected function deriveModuleNamespace($controller): string
=======
    protected function deriveModuleNamespace($controller)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        if (!strstr($controller, '\\')) {
            return '';
        }

        // Retrieve the first two elemenents representing the vendor and module name.
        $nsArray = explode('\\', $controller);
        $subNsArray = array_slice($nsArray, 0, 2);
        return implode('/', $subNsArray);
    }

    /**
     * Get controller sub-namespace
     *
     * @param string $namespace
     * @return string
     */
<<<<<<< HEAD
    protected function deriveControllerSubNamespace($namespace): string
=======
    protected function deriveControllerSubNamespace($namespace)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        if (!strstr($namespace, '\\')) {
            return '';
        }
        $nsArray = explode('\\', $namespace);

        // Remove the first three elements representing the vendor, module name and controller directory.
        $subNsArray = array_slice($nsArray, 3);
        if (empty($subNsArray)) {
            return '';
        }
        return implode('/', $subNsArray);
    }

    /**
     * Inject a template into the view model, if none present
     *
     * Template is derived from the controller found in the route match, and,
     * optionally, the action, if present.
     *
     * @param  MvcEvent $e
     * @return void
<<<<<<< HEAD
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    // phpcs:disable
    public function injectTemplate(MvcEvent $e)
    {
        // Native implementation - simplified for setup context
        // In setup context, we don't need complex template injection
        // This method exists for API compatibility
    }
    // phpcs:disable
=======
     */
    public function injectTemplate(MvcEvent $e)
    {
        $e->getRouteMatch()->setParam('action', null);
        parent::injectTemplate($e);
    }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
