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
use Magento\Framework\DataObject;
use Magento\Framework\Filter\Template;
use Magento\Framework\Filter\VariableResolver\StrictResolver;
use Magento\Framework\Filter\VariableResolverInterface;
use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class ForDirectiveTest extends TestCase
{
    /**
     * @var VariableResolverInterface
     */
    private $variableResolver;

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
        $this->variableResolver = $objectManager->get(StrictResolver::class);
        $this->filter = $objectManager->get(Template::class);
        $this->processor = $objectManager->create(
            ForDirective::class,
            ['variableResolver' => $this->variableResolver]
        );
    }

<<<<<<< HEAD
    #[DataProvider('invalidFormatProvider')]
=======
    /**
     * @dataProvider invalidFormatProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFallbackWithIncorrectFormat($template)
    {
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals($template, $result);
    }

<<<<<<< HEAD
    #[DataProvider('useCasesProvider')]
=======
    /**
     * @dataProvider useCasesProvider
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
    public static function useCasesProvider()
=======
    public function useCasesProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $items = [
            'ignoreme' => [
                'a' => 'hello1',
                'b' => ['world' => new DataObject(['foo' => 'bar1'])]
            ],
            [
                'a' => 'hello2',
                'b' => ['world' => new DataObject(['foo' => 'bar2'])]
            ],
        ];
        $expect = '0a:hello1,b:bar11a:hello2,b:bar2';
        $body = '{{var loop.index}}a:{{var item.a}},b:{{var item.b.world.foo}}';

        return [
            ['{{for item in foo}}' . $body . '{{/for}}',['foo' => $items], $expect],
            ['{{for item in foo.bar}}' . $body . '{{/for}}',['foo' => ['bar' => $items]], $expect],
            [
                '{{for item in foo.getBar().baz}}' . $body . '{{/for}}',
                ['foo' => new DataObject(['bar' => ['baz' => $items]])],
                $expect
            ],
        ];
    }

<<<<<<< HEAD
    public static function invalidFormatProvider()
=======
    public function invalidFormatProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['{{for in}}foo{{/for}}'],
            ['{{for in items}}foo{{/for}}'],
        ];
    }

    private function createConstruction(ForDirective $directive, string $value): array
    {
        preg_match($directive->getRegularExpression(), $value, $construction);

        return $construction;
    }
}
