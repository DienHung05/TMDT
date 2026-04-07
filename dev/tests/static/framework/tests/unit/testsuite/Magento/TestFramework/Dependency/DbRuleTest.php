<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Dependency;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Dependency;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class DbRuleTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DbRule
     */
    protected $model;

    protected function setUp(): void
    {
        $this->model = new DbRule(['some_table' => 'SomeModule']);
    }

    /**
     * @param string $module
     * @param string $file
     * @param string $contents
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('getDependencyInfoDataProvider')]
=======
     * @dataProvider getDependencyInfoDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetDependencyInfo($module, $file, $contents, array $expected)
    {
        $this->assertEquals($expected, $this->model->getDependencyInfo($module, 'php', $file, $contents));
    }

<<<<<<< HEAD
    public static function getDependencyInfoDataProvider()
=======
    public function getDependencyInfoDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['any', 'non-resource-file-path.php', 'any', []],
            [
                'any',
                '/app/some/path/Setup/some-file.php',
                '$install->getTableName("unknown_table")',
                [['modules' => ['Unknown'], 'source' => 'unknown_table']]
            ],
            [
                'SomeModule',
                '/app/some/path/Resource/Setup.php',
                '$install->getTableName("some_table")',
                []
            ],
            [
                'any',
                '/app/some/path/Resource/Setup.php',
                '$install->getTableName("some_table")',
                [
                    [
                        'modules' => ['SomeModule'],
                        'type' => \Magento\TestFramework\Dependency\RuleInterface::TYPE_HARD,
                        'source' => 'some_table',
                    ]
                ]
            ]
        ];
    }
}
