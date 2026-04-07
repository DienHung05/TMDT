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
declare(strict_types=1);

namespace Magento\Sales\Model;

/**
 * Class to verify isIncrementIdUsed method behaviour.
 */
class OrderIncrementIdCheckerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Sales\Model\OrderIncrementIdChecker
     */
    private $checker;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->checker = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Sales\Model\OrderIncrementIdChecker::class
        );
    }

    /**
     * Test to verify if isIncrementIdUsed method works with numeric increment ids.
     *
     * @magentoDataFixture Magento/Sales/_files/order.php
     * @return void
     */
    public function testIsOrderIncrementIdUsedNumericIncrementId(): void
    {
        $this->assertTrue($this->checker->isIncrementIdUsed('100000001'));
    }

    /**
     * Test to verify if isIncrementIdUsed method works with alphanumeric increment ids.
     *
     * @magentoDataFixture Magento/Sales/_files/order_alphanumeric_id.php
     * @return void
     */
    public function testIsOrderIncrementIdUsedAlphanumericIncrementId(): void
    {
        $this->assertTrue($this->checker->isIncrementIdUsed('M00000001'));
    }
}
