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

use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

class Composite implements ParserInterface
{
    public const STRATEGY_MERGE = 0;
    public const STRATEGY_REPLACE = 1;

    /**
     * @var ParserInterface[]
     */
    private array $parsers;

    /**
     * @var string
     */
    private int $strategy;

    /**
     * @param ParserInterface[] $parsers
     * @param int $strategy
     */
    public function __construct(
        array $parsers,
        int $strategy = self::STRATEGY_MERGE
    ) {
        $this->parsers = $parsers;
        $this->strategy = $strategy;
    }

    /**
     * @inheritdoc
     */
    public function parse(TestCase $testCase, string $scope)
    {
        $results = [];
        foreach ($this->parsers as $parser) {
            $results[] = $parser->parse($testCase, $scope);
        }
        return $this->strategy === self::STRATEGY_MERGE
            ? array_merge(...$results)
            : (array_reverse(array_filter($results))[0] ?? []);
    }
}
