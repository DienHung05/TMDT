<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Customer\Block\Adminhtml\Grid\Renderer;

use Magento\Framework\DataObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class checks multiaction block rendering with simple product and simple product with options.
 *
 * @see \Magento\Customer\Block\Adminhtml\Grid\Renderer\Multiaction
 */
class MultiactionTest extends AbstractMultiactionTest
{
    /**
<<<<<<< HEAD
     * @param array $columnData
     * @return void
     */
    #[DataProvider('renderEmptyProvider')]
=======
     * @dataProvider renderEmptyProvider
     * @param array $columnData
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderEmpty(array $columnData): void
    {
        /** @var DataObject $row */
        $row = $this->objectManager->create(DataObject::class);
        $this->blockColumn->addData($columnData);
        $this->blockMultiaction->setColumn($this->blockColumn);
        $this->assertEquals(
            '&nbsp;',
            $this->blockMultiaction->render($row)
        );
    }

    /**
     * Data provider for testRenderEmpty
     *
     * @return array
     */
<<<<<<< HEAD
    public static function renderEmptyProvider(): array
    {
        return [
            'empty_actions' => [
                'columnData' => ['actions' => []],
            ],
            'not_array_actions' => [
                'columnData' => ['actions' => 'actions'],
            ],
            'empty_actions_element' => [
                'columnData' => [
=======
    public function renderEmptyProvider(): array
    {
        return [
            'empty_actions' => [
                'column_data' => ['actions' => []],
            ],
            'not_array_actions' => [
                'column_data' => ['actions' => 'actions'],
            ],
            'empty_actions_element' => [
                'column_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'actions' => [
                        'action_1' => 'actions',
                    ],
                ],
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Checkout/_files/customer_quote_with_items_simple_product_options.php
     * @return void
     */
    public function testRenderProductOptions(): void
    {
        $this->processRender();
    }

    /**
     * @magentoDataFixture Magento/Checkout/_files/quote_with_address_saved.php
     * @return void
     */
    public function testRenderSimpleProduct(): void
    {
        $this->markTestSkipped('Test is blocked by issue MC-34612');
        $this->processRender();
    }
}
