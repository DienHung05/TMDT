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

class IfDirectiveTest extends TestCase
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
            IfDirective::class,
            ['variableResolver' => $this->variableResolver]
        );
    }

    public function testFallbackWithNoVariables()
    {
        $template = 'blah {{if foo}}blah{{/if}} blah';
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals('{{if foo}}blah{{/if}}', $result);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('useCasesProvider')]
=======
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
        return [
            ['{{if foo}}blah{{/if}}',['foo' => true], 'blah'],
            ['{{if foo}}blah{{/if}}',['foo' => false], ''],
            ['{{if foo.bar}}blah{{/if}}',['foo' => ['bar' => true]], 'blah'],
            ['{{if foo.bar}}blah{{/if}}',['foo' => ['bar' => false]], ''],
            ['{{if foo.getBar().baz}}blah{{/if}}',['foo' => new DataObject(['bar' => ['baz' => true]])], 'blah'],
            ['{{if foo.getBar().baz}}blah{{/if}}',['foo' => new DataObject(['bar' => ['baz' => false]])], ''],

            ['{{if foo}}blah{{else}}other{{/if}}',['foo' => true], 'blah'],
            ['{{if foo}}blah{{else}}other{{/if}}',['foo' => false], 'other'],
            ['{{if foo.bar}}blah{{else}}other{{/if}}',['foo' => ['bar' => true]], 'blah'],
            ['{{if foo.bar}}blah{{else}}other{{/if}}',['foo' => ['bar' => false]], 'other'],
            [
                '{{if foo.getBar().baz}}blah{{else}}other{{/if}}',
                ['foo' => new DataObject(['bar' => ['baz' => true]])],
                'blah'
            ],
            [
                '{{if foo.getBar().baz}}blah{{else}}other{{/if}}',
                ['foo' => new DataObject(['bar' => ['baz' => false]])],
                'other'
            ],
        ];
    }

    private function createConstruction(IfDirective $directive, string $value): array
    {
        preg_match($directive->getRegularExpression(), $value, $construction);

        return $construction;
    }
}
