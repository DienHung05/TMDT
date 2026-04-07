<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\MediaGallery\Model;

use Magento\MediaGalleryApi\Api\IsPathExcludedInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for IsPathExcludedInterface
 */
class IsExcludedTest extends TestCase
{
    /**
     * @var IsPathExcludedInterface
     */
    private $service;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->service = Bootstrap::getObjectManager()->get(IsPathExcludedInterface::class);
    }

    /**
     * Testing the excluded paths
     *
     * @param string $path
     * @param bool $isExcluded
<<<<<<< HEAD
     *
     */
    #[DataProvider('pathsProvider')]
=======
     * @dataProvider pathsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute(string $path, bool $isExcluded): void
    {
        $this->assertEquals($isExcluded, $this->service->execute($path));
    }

    /**
     * Provider of paths and if the path should be in the excluded list
     *
     * @return array
     */
<<<<<<< HEAD
    public static function pathsProvider(): array
=======
    public function pathsProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['theme', true],
            ['.thumbs', true],
            ['catalog/product/somedir', true],
            ['catalog/category', false]
        ];
    }
}
