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
 * Tests for price alert grid controller
 *
 * @see \Magento\Catalog\Controller\Adminhtml\Product\AlertsPriceGrid
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation disabled
 */
class AlertsPriceGridTest extends AbstractAlertTest
{
    /**
<<<<<<< HEAD
=======
     * @dataProvider priceLimitProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/ProductAlert/_files/simple_product_with_two_alerts.php
     *
     * @param string $email
     * @param int|null $limit
     * @param $expectedCount
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('priceLimitProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute(string $email, ?int $limit, $expectedCount): void
    {
        $this->prepareRequest('simple', 'default', $limit);
        $this->dispatch('backend/catalog/product/alertsPriceGrid');
        $this->assertGridRecords($email, $expectedCount);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function priceLimitProvider(): array
=======
    public function priceLimitProvider(): array
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
        return "//div[@id='alertPrice']//tbody/tr/td[contains(text(), '%s')]";
    }
}
