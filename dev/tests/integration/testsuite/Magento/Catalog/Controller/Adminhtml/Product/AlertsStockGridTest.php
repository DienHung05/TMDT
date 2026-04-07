<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Controller\Adminhtml\Product;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Tests for stock alert grid controller
 *
 * @see \Magento\Catalog\Controller\Adminhtml\Product\AlertsStockGrid
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation disabled
 */
class AlertsStockGridTest extends AbstractAlertTest
{
    /**
<<<<<<< HEAD
=======
     * @dataProvider stockLimitProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/ProductAlert/_files/simple_product_with_two_alerts.php
     *
     * @param string $email
     * @param int|null $limit
     * @param int $expectedCount
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('stockLimitProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute(string $email, ?int $limit, int $expectedCount): void
    {
        $this->prepareRequest('simple', 'default', $limit);
        $this->dispatch('backend/catalog/product/alertsStockGrid');
        $this->assertGridRecords($email, $expectedCount);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function stockLimitProvider(): array
=======
    public function stockLimitProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'default_limit' => [
                'email' => 'customer@example.com',
                'limit' => null,
<<<<<<< HEAD
                'expectedCount' => 2,
=======
                'expected_count' => 2,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            'limit_1' => [
                'email' => 'customer@example.com',
                'limit' => 1,
<<<<<<< HEAD
                'expectedCount' => 1,
=======
                'expected_count' => 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getRecordXpathTemplate(): string
    {
        return "//div[@id='alertStock']//tbody/tr/td[contains(text(), '%s')]";
    }
}
