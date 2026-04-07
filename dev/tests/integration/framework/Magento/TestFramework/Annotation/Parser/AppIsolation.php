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

namespace Magento\TestFramework\Annotation\Parser;

use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Annotation\TestCaseAnnotation;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

class AppIsolation implements ParserInterface
{
    /**
     * @var string
     */
    private const ANNOTATION = 'magentoAppIsolation';

    /**
     * @inheritdoc
     */
    public function parse(TestCase $test, string $scope): array
    {
<<<<<<< HEAD
        try {
            $annotations = TestCaseAnnotation::getInstance()->getAnnotations($test);
        } catch (\Throwable $e) {
            return [];
        }
=======
        $annotations = TestCaseAnnotation::getInstance()->getAnnotations($test);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $values = [];

        foreach ($annotations[$scope][self::ANNOTATION] ?? [] as $value) {
            if (!in_array($value, ['enabled', 'disabled'])) {
                throw new LocalizedException(
                    __(
                        "Invalid annotation format: @%1 %2. The valid format is: @%1 enabled|disabled.",
                        self::ANNOTATION,
                        $value
                    )
                );
            }
            $values[] = ['enabled' => $value === 'enabled'];
        }

        return $values;
    }
}
