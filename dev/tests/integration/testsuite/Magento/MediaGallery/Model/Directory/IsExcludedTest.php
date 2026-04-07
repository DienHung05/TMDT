<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\MediaGallery\Model\Directory;

use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for @see \Magento\MediaGallery\Model\Directory\IsExcluded.
 */
class IsExcludedTest extends TestCase
{
    /**
     * @var IsExcluded
     */
    private $model;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->model = Bootstrap::getObjectManager()->get(IsExcluded::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider directoriesDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $path
     * @param bool $expectedResult
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('directoriesDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsExcluded(string $path, bool $expectedResult): void
    {
        $actualResult = $this->model->execute($path);
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function directoriesDataProvider(): array
=======
    public function directoriesDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'catalog',
                true
            ],
            [
                'catalog/category',
                false
            ],
            [
                'customer',
                true
            ],
            [
                'catalog/../customer',
                true
            ],
        ];
    }
}
