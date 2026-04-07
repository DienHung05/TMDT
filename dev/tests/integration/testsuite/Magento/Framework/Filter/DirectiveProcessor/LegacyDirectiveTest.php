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

namespace Magento\Framework\Filter\DirectiveProcessor;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Filter\Template;
use Magento\TestModuleSimpleTemplateDirective\Model\LegacyFilter;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class LegacyDirectiveTest extends TestCase
{
    /**
     * @var DependDirective
     */
    private $processor;

    /**
     * @var Template
     */
    private $filter;

    protected function setUp(): void
    {
        $objectManager = ObjectManager::getInstance();
        $this->filter = $objectManager->create(LegacyFilter::class);
        $this->processor = $objectManager->create(LegacyDirective::class);
    }

    public function testFallbackWithNoVariables()
    {
        $template = 'blah {{unknown foobar}} blah';
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals('{{unknown foobar}}', $result);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('useCaseProvider')]
=======
     * @dataProvider useCaseProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCases(string $template, array $variables, string $expect)
    {
        $result = $this->processor->process(
            $this->createConstruction($this->processor, $template),
            $this->filter,
            $variables
        );
        self::assertEquals($expect, $result);
    }

<<<<<<< HEAD
    public static function useCaseProvider()
=======
    public function useCaseProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'protected method' => ['{{cool "blah" foo bar baz=bash}}', [], 'value1: cool: "blah" foo bar baz=bash'],
            'public method' => ['{{cooler "blah" foo bar baz=bash}}', [], 'value2: cooler: "blah" foo bar baz=bash'],
            'simple directive' => ['{{mydir "blah" param1=bash}}foo{{/mydir}}', [], 'OOFHSABHALB'],
        ];
    }

    private function createConstruction(LegacyDirective $directive, string $value): array
    {
        preg_match($directive->getRegularExpression(), $value, $construction);

        return $construction;
    }
}
