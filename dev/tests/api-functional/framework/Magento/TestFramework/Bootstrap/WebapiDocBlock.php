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

namespace Magento\TestFramework\Bootstrap;

use Magento\TestFramework\Annotation\ApiConfigFixture;
<<<<<<< HEAD
use Magento\TestFramework\Annotation\AppArea;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Annotation\ConfigFixture;
use Magento\TestFramework\Event\Transaction;

/**
 * @inheritdoc
 */
class WebapiDocBlock extends \Magento\TestFramework\Bootstrap\DocBlock
{
    /**
     * Get list of subscribers.
     *
     * In addition, register magentoApiDataFixture and magentoConfigFixture
     * annotation processors
     *
     * @param \Magento\TestFramework\Application $application
     * @return array
     */
    protected function _getSubscribers(\Magento\TestFramework\Application $application)
    {
        $subscribers = parent::_getSubscribers($application);
        foreach ($subscribers as $key => $subscriber) {
<<<<<<< HEAD
            if (in_array(get_class($subscriber), [ConfigFixture::class, Transaction::class, AppArea::class])) {
=======
            if (get_class($subscriber) === ConfigFixture::class || get_class($subscriber) === Transaction::class) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                unset($subscribers[$key]);
            }
        }
        $subscribers[] = new \Magento\TestFramework\Event\Transaction(
            new \Magento\TestFramework\EventManager(
                [
                    new \Magento\TestFramework\Annotation\DbIsolation(),
                    new \Magento\TestFramework\Annotation\ApiDataFixture(),
                ]
            )
        );
        $subscribers[] = new ApiConfigFixture();
<<<<<<< HEAD
        $subscribers[] = new AppArea($application);
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $subscribers;
    }
}
