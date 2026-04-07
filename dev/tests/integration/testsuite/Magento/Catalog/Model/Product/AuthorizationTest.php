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

namespace Magento\Catalog\Model\Product;

use Laminas\Stdlib\Parameters;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Controller\Adminhtml\Product\Initialization\Helper;
use Magento\Catalog\Model\Product;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\Exception\AuthorizationException;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Verify additional authorization for product operations
 *
 * @magentoAppArea adminhtml
 */
class AuthorizationTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var Helper
     */
    private $initializationHelper;

    /**
     * @var HttpRequest
     */
    private $request;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->initializationHelper = $this->objectManager->get(Helper::class);
        $this->productRepository = $this->objectManager->get(ProductRepositoryInterface::class);
        $this->request = $this->objectManager->get(HttpRequest::class);
    }

    /**
     * Verify AuthorizedSavingOf
     *
     * @magentoDataFixture Magento/Catalog/_files/product_simple_with_design_attributes.php
     * @param array $data
<<<<<<< HEAD
     */
    #[DataProvider('postRequestData')]
=======
     *
     * @dataProvider postRequestData
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAuthorizedSavingOf(array $data): void
    {
        $this->request->setPost(new Parameters($data));

        /** @var Product $product */
        $product = $this->productRepository->get('simple_design_attribute');

        $product = $this->initializationHelper->initialize($product);
        $this->assertEquals('simple_new', $product->getName());
        $this->assertEquals(
            'container2',
            $product->getCustomAttribute('options_container')->getValue()
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function postRequestData(): array
=======
    public function postRequestData(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    'product' => [
                        'name' => 'simple_new',
                        'custom_design' => '3',
                        'page_layout' => '1column',
                        'options_container' => 'container2',
                        'custom_layout_update' => '',
                        'custom_design_from' => '2021-02-19 00:00:00',
                        'custom_design_to' => '2021-02-09 00:00:00',
                        'custom_layout_update_file' => '',
                    ],
                    'use_default' => [
                        'custom_design' => '1',
                        'page_layout' => '1',
                        'options_container' => '1',
                        'custom_layout' => '1',
                        'custom_design_from' => '1',
                        'custom_design_to' => '1',
                        'custom_layout_update_file' => '1',
                    ],
                ],
            ],
            [
                [
                    'product' => [
                        'name' => 'simple_new',
                        'page_layout' => '',
                        'options_container' => 'container2',
                        'custom_design' => '',
                        'custom_design_from' => '2020-01-02',
                        'custom_design_to' => '2020-01-03',
                        'custom_layout' => '',
                        'custom_layout_update_file' => '__no_update__',
                    ],
                    'use_default' => null,
                ],
            ],
        ];
    }

    /**
     * Verify AuthorizedSavingOf when change design attributes
     *
     * @magentoDataFixture Magento/Catalog/_files/product_simple.php
     * @param array $data
<<<<<<< HEAD
     */
    #[DataProvider('postRequestDataException')]
    public function testAuthorizedSavingOfWithException(array $data): void
    {
        $this->expectException(AuthorizationException::class);
        $this->expectExceptionMessage('Not allowed to edit the product\'s design attributes');
=======
     *
     * @dataProvider postRequestDataException
     */
    public function testAuthorizedSavingOfWithException(array $data): void
    {
        $this->expectException(AuthorizationException::class);
        $this->expectErrorMessage('Not allowed to edit the product\'s design attributes');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->request->setPost(new Parameters($data));

        /** @var Product $product */
        $product = $this->productRepository->get('simple');

        $this->initializationHelper->initialize($product);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function postRequestDataException(): array
=======
    public function postRequestDataException(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    'product' => [
                        'name' => 'simple_new',
                        'page_layout' => '1column',
                        'options_container' => 'container2',
                        'custom_design' => '',
                        'custom_design_from' => '',
                        'custom_design_to' => '',
                        'custom_layout' => '',
                        'custom_layout_update_file' => '__no_update__',
                    ],
                    'use_default' => null,
                ],
            ],
        ];
    }
}
