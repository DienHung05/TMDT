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

namespace Magento\TestFramework\Catalog\Model;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\Category\Attribute\LayoutUpdateManager;

/**
 * Easy way to fake available files.
 */
class CategoryLayoutUpdateManager extends LayoutUpdateManager
{
    /**
     * @var array Keys are category IDs, values - file names.
     */
    private $fakeFiles = [];

    /**
     * Supply fake files for a category.
     *
     * @param int $forCategoryId
     * @param string[]|null $files Pass null to reset.
     */
    public function setCategoryFakeFiles(int $forCategoryId, ?array $files): void
    {
        if ($files === null) {
            unset($this->fakeFiles[$forCategoryId]);
        } else {
            $this->fakeFiles[$forCategoryId] = $files;
        }
    }

    /**
     * @inheritDoc
     */
    public function fetchAvailableFiles(CategoryInterface $category): array
    {
<<<<<<< HEAD
        $categoryId = $category->getId();
        if ($categoryId !== null && array_key_exists($categoryId, $this->fakeFiles)) {
            return $this->fakeFiles[$categoryId];
=======
        if (array_key_exists($category->getId(), $this->fakeFiles)) {
            return $this->fakeFiles[$category->getId()];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }

        return parent::fetchAvailableFiles($category);
    }
}
