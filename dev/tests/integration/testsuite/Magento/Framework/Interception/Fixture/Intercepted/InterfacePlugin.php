<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Interception\Fixture\Intercepted;

use Magento\Framework\Interception\Fixture\InterceptedInterface;

class InterfacePlugin
{
    /**
     * @param InterceptedInterface $subject
     * @param \Closure $next
     * @param string $param1
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundC(InterceptedInterface $subject, \Closure $next, $param1)
    {
        return '<IP:C>' . $next($param1) . '</IP:C>';
    }

    /**
     * @param InterceptedInterface $subject
     * @param \Closure $next
     * @param $param1
     * @return string
     */
    public function aroundF(InterceptedInterface $subject, \Closure $next, $param1)
    {
        return '<IP:F>' . $subject->D($next($subject->C($param1))) . '</IP:F>';
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeG(InterceptedInterface $subject, $param1)
    {
        return ['<IP:bG>' . $param1 . '</IP:bG>'];
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundG(InterceptedInterface $subject, \Closure $next, $param1)
    {
        return $next('<IP:G>' . $param1 . '</IP:G>');
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterG(InterceptedInterface $subject, $result)
    {
        return '<IP:aG>' . $result . '</IP:aG>';
    }
}
