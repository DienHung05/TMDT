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

namespace Magento\TestFramework\Helper;

/**
 * Class for comparing arrays recursively
 */
class CompareArraysRecursively
{
    /**
     * Compare arrays recursively regardless of nesting.
     * Can compare arrays that have both one level and n-level nesting.
     * ```
     *  [
     * 'products' => [
     *      'items' => [
     *      [
     *          'sku'       => 'bundle-product',
     *          'type_id'   => 'bundle',
     *          'items'     => [
     *          [
     *              'title'     => 'Bundle Product Items',
     *              'sku'       => 'bundle-product',
     *              'options'   => [
     *              [
     *                  'price' => 2.75,
     *                  'label' => 'Simple Product',
     *                  'product' => [
     *                      'name'    => 'Simple Product',
     *                      'sku'     => 'simple',
     *                  ]
     *              ]
     *          ]
     *      ]
     *  ];
     * ```
     *
     * @param array $expected
     * @param array $actual
     * @return array
     */
    public function execute(array $expected, array $actual): array
    {
        $diffResult = [];

        foreach ($expected as $key => $value) {
            if (array_key_exists($key, $actual)) {
                if (is_array($value)) {
                    $recursiveDiff = $this->execute($value, $actual[$key]);
                    if (!empty($recursiveDiff)) {
                        $diffResult[$key] = $recursiveDiff;
                    }
                } else {
                    if (!in_array($value, $actual, true)) {
                        $diffResult[$key] = $value;
                    }
                }
            } else {
                $diffResult[$key] = $value;
            }
        }

        return $diffResult;
    }
}
