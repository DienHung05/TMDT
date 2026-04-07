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

namespace Magento\TestFramework\Catalog\Model\Layer;

use Magento\Catalog\Model\Layer\SearchFactory;
use Magento\Catalog\Model\ResourceModel\Product\Collection;

/**
 * Quick search products by query.
 */
class QuickSearchByQuery
{
    /**
     * @var SearchFactory
     */
    private $searchFactory;

    /**
     * @param SearchFactory $searchFactory
     */
    public function __construct(
        SearchFactory $searchFactory
    ) {
        $this->searchFactory = $searchFactory;
    }

    /**
     * Flush search instances cache and find products by search query.
     *
     * @param string $query
     * @param string $sortedField
     * @param string $sortOrder
     * @return Collection
     */
    public function execute(
        string $query,
        string $sortedField = 'relevance',
        string $sortOrder = 'desc'
    ): Collection {
        $productCollection = $this->searchFactory->create()->getProductCollection();
        $productCollection->addSearchFilter($query);
        $productCollection->setOrder($sortedField, $sortOrder);

        return $productCollection;
    }
}
