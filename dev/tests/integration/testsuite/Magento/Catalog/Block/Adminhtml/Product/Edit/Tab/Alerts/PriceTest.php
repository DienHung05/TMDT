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

namespace Magento\Catalog\Block\Adminhtml\Product\Edit\Tab\Alerts;

use Magento\Framework\View\LayoutInterface;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Check price alert grid
 *
 * @see \Magento\Catalog\Block\Adminhtml\Product\Edit\Tab\Alerts\Price
 *
 * @magentoAppArea adminhtml
 */
class PriceTest extends AbstractAlertTest
{
    /** @var Price */
    private $block;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->block = $this->objectManager->get(LayoutInterface::class)->createBlock(Price::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider alertsDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDbIsolation disabled
     *
     * @magentoDataFixture Magento/ProductAlert/_files/product_alert.php
     * @magentoDataFixture Magento/ProductAlert/_files/price_alert_on_second_website.php
     *
     * @param string $sku
     * @param string $expectedEmail
     * @param string|null $storeCode
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('alertsDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGridCollectionWithStoreId(string $sku, string $expectedEmail, ?string $storeCode = null): void
    {
        $this->prepareRequest($sku, $storeCode);
        $collection = $this->block->getPreparedCollection();
        $this->assertCount(1, $collection);
        $this->assertEquals($expectedEmail, $collection->getFirstItem()->getEmail());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function alertsDataProvider(): array
    {
        return [
            'without_store_id_filter' => [
                'sku' => 'simple',
                'expectedEmail' => 'customer@example.com',
            ],
            'with_store_id_filter' => [
                'sku' => 'simple_on_second_website_for_price_alert',
                'expectedEmail' => 'customer_second_ws_with_addr@example.com',
                'storeCode' => 'fixture_third_store',
=======
    public function alertsDataProvider(): array
    {
        return [
            'without_store_id_filter' => [
                'product_sku' => 'simple',
                'expected_customer_emails' => 'customer@example.com',
            ],
            'with_store_id_filter' => [
                'product_sku' => 'simple_on_second_website_for_price_alert',
                'expected_customer_emails' => 'customer_second_ws_with_addr@example.com',
                'store_code' => 'fixture_third_store',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
<<<<<<< HEAD
     * @param string|null $storeCode
     * @return void
     */
    #[DataProvider('storeProvider')]
=======
     * @dataProvider storeProvider
     *
     * @param string|null $storeCode
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetGridUrl(?string $storeCode): void
    {
        $this->prepareRequest(null, $storeCode);
        $this->assertGridUrl($this->block->getGridUrl(), $storeCode);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function storeProvider(): array
    {
        return [
            'without_store_id_param' => [
                'storeCode' => null,
            ],
            'with_store_id_param' => [
                'storeCode' => 'default',
=======
    public function storeProvider(): array
    {
        return [
            'without_store_id_param' => [
                'store_code' => null,
            ],
            'with_store_id_param' => [
                'store_code' => 'default',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
