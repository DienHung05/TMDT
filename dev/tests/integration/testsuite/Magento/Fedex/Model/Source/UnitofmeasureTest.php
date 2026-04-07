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

namespace Magento\Fedex\Model\Source;

class UnitofmeasureTest extends \PHPUnit\Framework\TestCase
{
    public function testToOptionArray()
    {
        /** @var $model \Magento\Fedex\Model\Source\Unitofmeasure */
        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Fedex\Model\Source\Unitofmeasure::class
        );
        $result = $model->toOptionArray();
        $this->assertCount(2, $result);
    }
}
