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

namespace Magento\Translation\Controller;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Translation\Model\ResourceModel\StringUtils;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for Magento\Translation\Controller\Ajax class.
 *
 * @magentoDbIsolation disabled
 */
class AjaxTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
<<<<<<< HEAD
     * @magentoConfigFixture default_store dev/translate_inline/active 1
     */
    #[DataProvider('indexActionDataProvider')]
=======
     * @param array $postData
     * @param string $expected
     *
     * @return void
     * @dataProvider indexActionDataProvider
     * @magentoConfigFixture default_store dev/translate_inline/active 1
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIndexAction(array $postData, string $expected): void
    {
        $this->getRequest()->setPostValue('translate', $postData);
        $this->dispatch('translation/ajax/index');
        $result = $this->getResponse()->getBody();
        $this->assertEquals($expected, $result);
    }

<<<<<<< HEAD
    public static function indexActionDataProvider(): array
=======
    /**
     * @return array
     */
    public function indexActionDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    [
                        'original' => 'phrase with &',
                        'custom' => 'phrase with & translated',
                    ],
                ],
                '{"phrase with &":"phrase with & translated"}',
            ],
            [
                [
                    [
                        'original' => 'phrase with &',
                        'custom' => 'phrase with & translated (updated)',
                    ],
                ],
                '{"phrase with &":"phrase with & translated (updated)"}',
            ],
            [
                [
                    [
                        'original' => 'phrase with &',
                        'custom' => 'phrase with &',
                    ],
                ],
                '[]',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function tearDownAfterClass(): void
    {
        try {
            Bootstrap::getObjectManager()->get(StringUtils::class)->deleteTranslate('phrase with &');
        } catch (NoSuchEntityException $exception) {
            //translate already deleted
        }
        parent::tearDownAfterClass();
    }
}
