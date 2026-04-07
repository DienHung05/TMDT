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
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class TemplateDirectiveTest extends TestCase
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
        $this->filter = $objectManager->create(Template::class);
        $this->processor = $objectManager->create(TemplateDirective::class);
    }

    public function testNoTemplateProcessor()
    {
        $template = 'blah {{template config_path="foo"}} blah';
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals('{Error in template processing}', $result);
    }

    public function testNoConfigPath()
    {
        $this->filter->setTemplateProcessor([$this, 'processTemplate']);
        $template = 'blah {{template}} blah';
        $result = $this->processor->process($this->createConstruction($this->processor, $template), $this->filter, []);
        self::assertEquals('{Error in template processing}', $result);
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
        $this->filter->setTemplateProcessor([$this, 'processTemplate']);
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
        $prefix = '{{template config_path=$path param1=myparam ';
        $expect = 'path=varpath/myparamabc/varpath';

        return [
            [$prefix . 'varparam=$foo}}',['foo' => 'abc','path'=>'varpath'], $expect],
            [$prefix . 'varparam=$foo.bar}}',['foo' => ['bar' => 'abc'],'path'=>'varpath'], $expect],
            [
                $prefix . 'varparam=$foo.getBar().baz}}',
                ['foo' => new DataObject(['bar' => ['baz' => 'abc']]),'path'=>'varpath'],
                $expect
            ],
        ];
    }

    public function processTemplate(string $configPath, array $parameters)
    {
        // Argument
        return 'path=' . $configPath
            // Directive argument
            . '/' . $parameters['param1'] . $parameters['varparam']
            // Template variable
            . '/' . $parameters['path'];
    }

    private function createConstruction(TemplateDirective $directive, string $value): array
    {
        preg_match($directive->getRegularExpression(), $value, $construction);

        return $construction;
    }
}
