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

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

/**
 * Config attribute parser
 */
class Config implements ParserInterface
{
    /**
     * @var string
     */
    private string $attributeClass;

    /**
     * @param string $attributeClass
     */
    public function __construct(
        string $attributeClass = \Magento\TestFramework\Fixture\Config::class
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
        $scopeTypes = [
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
            ScopeInterface::SCOPE_STORE,
            ScopeInterface::SCOPE_WEBSITE
        ];
        foreach ($attributes as $attribute) {
            $args = $attribute->getArguments();
            $scopeType = $args['scopeType'] ?? $args[2] ?? ScopeConfigInterface::SCOPE_TYPE_DEFAULT;
            if (!in_array($scopeType, $scopeTypes)) {
                throw new LocalizedException(
                    __(
                        'Invalid scope type "%1" was supplied to %2 at %3',
                        $scopeType,
                        get_class($this),
<<<<<<< HEAD
                        get_class($test) . ($scope === 'class' ? '' : '::' . $test->name())
=======
                        get_class($test) . ($scope === 'class' ? '' : '::' . $test->getName(false))
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ),
                );
            }
            $fixtures[] = [
                'path' => $args[0],
                'value' => $args[1],
                'scopeType' => $scopeType,
                'scopeValue' => $args[3] ?? null,
            ];
        }
        return $fixtures;
    }
}
