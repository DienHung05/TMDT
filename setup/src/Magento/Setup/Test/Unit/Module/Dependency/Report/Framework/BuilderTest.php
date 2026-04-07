<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Dependency\Report\Framework;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Module\Dependency\Report\Framework\Builder;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class BuilderTest extends TestCase
{
    /**
     * @var Builder
     */
    protected $builder;

    protected function setUp(): void
    {
        $objectManagerHelper = new ObjectManager($this);
        $this->builder = $objectManagerHelper->getObject(
            Builder::class
        );
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongOptionConfigFiles')]
=======
     * @dataProvider dataProviderWrongOptionConfigFiles
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBuildWithWrongOptionConfigFiles($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Parse error. Passed option "config_files" is wrong.');
        $this->builder->build($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongOptionConfigFiles()
=======
    public function dataProviderWrongOptionConfigFiles()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    'parse' => ['files_for_parse' => [1, 2], 'config_files' => []],
                    'write' => [1, 2],
                ],
            ],
            [['parse' => ['files_for_parse' => [1, 2]], 'write' => [1, 2]]]
        ];
    }
}
