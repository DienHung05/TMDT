<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Dependency;

use Magento\TestFramework\Dependency\VirtualType\VirtualTypeMapper;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class DiRuleTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $module
     * @param string $contents
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('getDependencyInfoDataProvider')]
=======
     * @dataProvider getDependencyInfoDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetDependencyInfo($module, $contents, array $expected)
    {
        $diRule = new DiRule(new VirtualTypeMapper([
                    'scope' => [
                        'someVirtualType1' => 'Magento\AnotherModule\Some\Class1',
                        'someVirtualType2' => 'Magento\AnotherModule\Some\Class2'
                    ]
                ]));
        $file = '/some/path/scope/di.xml';
        static::assertEquals($expected, $diRule->getDependencyInfo($module, null, $file, $contents));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getDependencyInfoDataProvider()
=======
    public function getDependencyInfoDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Di without dependencies' => [
                'Magento\SomeModule',
<<<<<<< HEAD
                self::getFileContent('di_no_dependency.xml'),
=======
                $this->getFileContent('di_no_dependency.xml'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                []
            ],
            'Di only in module dependencies' => [
                'Magento\SomeModule',
<<<<<<< HEAD
                self::getFileContent('di_in_module_dependency.xml'),
=======
                $this->getFileContent('di_in_module_dependency.xml'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                []
            ],
            'Di external dependencies' => [
                'Magento\SomeModule',
<<<<<<< HEAD
                self::getFileContent('di_external_dependency.xml'),
=======
                $this->getFileContent('di_external_dependency.xml'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    [
                        'modules' => ['Magento\ExternalModule3'],
                        'type' => RuleInterface::TYPE_SOFT,
                        'source' => 'Magento\ExternalModule3\Some\Another\Class'
                    ],
                    [
                        'modules' => ['Magento\ExternalModule5'],
                        'type' => RuleInterface::TYPE_SOFT,
                        'source' => 'Magento\ExternalModule5\Some\Another\Class'
                    ],
                    [
                        'modules' => ['Magento\ExternalModule6'],
                        'type' => RuleInterface::TYPE_SOFT,
                        'source' => 'Magento\ExternalModule6\Some\Plugin\Class'
                    ],
                    [
                        'modules' => ['Magento\ExternalModule1'],
                        'type' => RuleInterface::TYPE_HARD,
                        'source' => 'Magento\ExternalModule1\Some\Argument1'
                    ],
                    [
                        'modules' => ['Magento\ExternalModule2'],
                        'type' => RuleInterface::TYPE_HARD,
                        'source' => 'Magento\ExternalModule2\Some\Argument2'
                    ],
                    [
                        'modules' => ['Magento\ExternalModule4'],
                        'type' => RuleInterface::TYPE_HARD,
                        'source' => 'Magento\ExternalModule4\Some\Argument3'
                    ]
                ]
            ],
            'Di virtual dependencies' => [
                'Magento\SomeModule',
<<<<<<< HEAD
                self::getFileContent('di_virtual_dependency.xml'),
=======
                $this->getFileContent('di_virtual_dependency.xml'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    [
                        'modules' => ['Magento\AnotherModule'],
                        'type' => RuleInterface::TYPE_HARD,
                        'source' => 'Magento\AnotherModule\Some\Class1',
                    ],
                    [
                        'modules' => ['Magento\AnotherModule'],
                        'type' => RuleInterface::TYPE_HARD,
                        'source' => 'Magento\AnotherModule\Some\Class2',
                    ]
                ]
            ]
        ];
    }

    /**
     * Get content of di file
     *
     * @param string $fileName
     * @return string
     */
<<<<<<< HEAD
    private static function getFileContent($fileName)
=======
    private function getFileContent($fileName)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . $fileName);
    }
}
