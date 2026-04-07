<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Fixture\Parser;

use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

/**
 * DataFixture attribute parser
 */
class DataFixture implements ParserInterface
{
    /**
     * @var string
     */
    private string $attributeClass;

    /**
     * @param string $attributeClass
     */
    public function __construct(
        string $attributeClass = \Magento\TestFramework\Fixture\DataFixture::class
    ) {
        $this->attributeClass = $attributeClass;
    }

    /**
     * @inheritdoc
     */
    public function parse(TestCase $test, string $scope): array
    {
<<<<<<< HEAD
        try {
            $reflection = $scope === ParserInterface::SCOPE_CLASS
                ? new \ReflectionClass($test)
                : new \ReflectionMethod($test, $test->name());
=======
        $fixtures = [];
        try {
            $reflection = $scope === ParserInterface::SCOPE_CLASS
                ? new \ReflectionClass($test)
                : new \ReflectionMethod($test, $test->getName(false));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        } catch (\ReflectionException $e) {
            throw new LocalizedException(
                __(
                    'Unable to parse attributes for %1',
<<<<<<< HEAD
                    get_class($test) . ($scope === ParserInterface::SCOPE_CLASS ? '' : '::' . $test->name())
=======
                    get_class($test) . ($scope === ParserInterface::SCOPE_CLASS ? '' : '::' . $test->getName(false))
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ),
                $e
            );
        }

<<<<<<< HEAD
        $fixtures = [];
        $attributes = $reflection->getAttributes($this->attributeClass);
        foreach ($attributes as $attribute) {
            $args = $attribute->getArguments();
            $alias = $args['as'] ?? $args[2] ?? null;
            $count = $args['count'] ?? $args[4] ?? 1;
            $id = $count > 1 ? 1 : '';
            do {
                $fixtures[] = [
                    'name' => $alias !== null ? $alias.(!empty($id) ? $id++ : '') : null,
                    'factory' => $args[0],
                    'data' => $args[1] ?? [],
                    'scope' => $args['scope'] ?? $args[3] ?? null,
                ];
            } while (--$count > 0);

=======
        $attributes = $reflection->getAttributes($this->attributeClass);
        foreach ($attributes as $attribute) {
            $args = $attribute->getArguments();
            $fixtures[] = [
                'name' => $args['as'] ?? $args[2] ?? null,
                'factory' => $args[0],
                'data' => $args[1] ?? [],
            ];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
        return $fixtures;
    }
}
