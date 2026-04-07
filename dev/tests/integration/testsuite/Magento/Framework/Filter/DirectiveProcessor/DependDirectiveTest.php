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

class DependDirectiveTest extends TestCase
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
            DependDirective::class,
            ['variableResolver' => $this->variableResolver]
        );
    }

    public function testFallbackWithNoVariables()
    {
        $template = 'blah {{depend foo}}blah{{/depend}} blah';
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals('{{depend foo}}blah{{/depend}}', $result);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('useCasesProvider')]
=======
     * @dataProvider useCasesProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCases(string $parameter, array $variables, bool $isTrue)
    {
        $template = 'blah {{depend ' . $parameter . '}}blah{{/depend}} blah';
        $result = $this->processor->process(
            $this->createConstruction($this->processor, $template),
            $this->filter,
            $variables
        );
        self::assertEquals($isTrue ? 'blah' : '', $result);
    }

<<<<<<< HEAD
    public static function useCasesProvider()
=======
    public function useCasesProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['foo',['foo' => true], true],
            ['foo',['foo' => false], false],
            ['foo.bar',['foo' => ['bar' => true]], true],
            ['foo.bar',['foo' => ['bar' => false]], false],
            ['foo.getBar().baz',['foo' => new DataObject(['bar' => ['baz' => true]])], true],
            ['foo.getBar().baz',['foo' => new DataObject(['bar' => ['baz' => false]])], false],
        ];
    }

    private function createConstruction(DependDirective $directive, string $value): array
    {
        preg_match($directive->getRegularExpression(), $value, $construction);

        return $construction;
    }
}
