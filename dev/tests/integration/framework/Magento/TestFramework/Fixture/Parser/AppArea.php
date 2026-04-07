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
 * AppArea attribute parser
 */
class AppArea implements ParserInterface
{
    /**
     * @var string
     */
    private string $attributeClass;

    /**
     * @param string $attributeClass
     */
    public function __construct(
        string $attributeClass = \Magento\TestFramework\Fixture\AppArea::class
    ) {
        $this->attributeClass = $attributeClass;
    }

    /**
     * @inheritdoc
     */
    public function parse(TestCase $test, string $scope): array
    {
        $fixtures = [];
        try {
            $reflection = $scope === ParserInterface::SCOPE_CLASS
                ? new \ReflectionClass($test)
<<<<<<< HEAD
                : new \ReflectionMethod($test, $test->name());
=======
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

        $attributes = $reflection->getAttributes($this->attributeClass);
        foreach ($attributes as $attribute) {
            $args = $attribute->getArguments();
            $fixtures[] = [
                'area' => $args[0],
            ];
        }
        return $fixtures;
    }
}
