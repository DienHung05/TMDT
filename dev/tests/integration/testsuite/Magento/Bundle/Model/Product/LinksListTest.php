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

namespace Magento\Bundle\Model\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Test for bundle product linksList model.
 *
 */
class LinksListTest extends TestCase
{
    /**
     * @var LinksList
     */
    private $linksList;

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * @inheridoc
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function setUp(): void
    {
        $this->linksList = Bootstrap::getObjectManager()->get(LinksList::class);
    }

    /**
     * verify get items with zero option selection price.
     *
     * @magentoDataFixture Magento/Bundle/_files//fixed_bundle_product_zero_price_option_selection.php
     * @return void
     */
    public function testGetItemsWithZeroPrice(): void
    {
        $productRepository = Bootstrap::getObjectManager()->get(ProductRepositoryInterface::class);
        $product = $productRepository->get('bundle_product');
        $type = Bootstrap::getObjectManager()->get(Type::class);
        $optionsIds = $type->getOptionsIds($product);
        $links = $this->linksList->getItems($product, current($optionsIds));
        $link = current($links);
        self::assertEquals('simple1', $link->getSku());
        self::assertEquals(0, $link->getPrice());
    }
}
