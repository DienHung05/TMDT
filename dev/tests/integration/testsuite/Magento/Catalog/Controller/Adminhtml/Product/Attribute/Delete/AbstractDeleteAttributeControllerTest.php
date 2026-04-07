<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Controller\Adminhtml\Product\Attribute\Delete;

use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\TestCase\AbstractBackendController;

/**
 * Abstract delete attribute test using catalog/product_attribute/delete controller action.
 */
abstract class AbstractDeleteAttributeControllerTest extends AbstractBackendController
{
    /**
     * @var string
     */
    protected $uri = 'backend/catalog/product_attribute/delete/attribute_id/%s';

    /**
     * @var ProductAttributeRepositoryInterface
     */
    private $productAttributeRepository;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->productAttributeRepository = $this->_objectManager->get(ProductAttributeRepositoryInterface::class);
    }

    /**
     * Delete attribute via controller action.
     *
     * @param string $attributeCode
     * @return void
     */
    protected function dispatchDeleteAttribute(string $attributeCode): void
    {
        $attribute = $this->productAttributeRepository->get($attributeCode);
        $this->getRequest()->setMethod(Http::METHOD_POST);
        $this->dispatch(sprintf($this->uri, $attribute->getAttributeId()));
        $this->assertSessionMessages(
            $this->equalTo([(string)__('You deleted the product attribute.')]),
            MessageInterface::TYPE_SUCCESS
        );
    }

    /**
     * Assert that attribute is deleted from DB.
     *
     * @param string $attributeCode
     * @return void
     */
    protected function assertAttributeIsDeleted(string $attributeCode): void
    {
        $this->expectExceptionObject(
            new NoSuchEntityException(
                __(
                    'The attribute with a "%1" attributeCode doesn\'t exist. Verify the attribute and try again.',
                    $attributeCode
                )
            )
        );
        $this->productAttributeRepository->get($attributeCode);
    }

    /**
     * @inheritdoc
     */
    public function testAclHasAccess()
    {
<<<<<<< HEAD
        $this->markTestSkipped('AclHasAccess test is not complete');
=======
        $this->markTestIncomplete('AclHasAccess test is not complete');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
