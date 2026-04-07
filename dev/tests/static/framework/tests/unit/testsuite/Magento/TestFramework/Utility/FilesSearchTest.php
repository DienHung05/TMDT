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

namespace Magento\TestFramework\Utility;

use PHPUnit\Framework\TestCase;

class FilesSearchTest extends TestCase
{
    /**
     * Test files list extraction from file.
     */
    public function testGetFiles(): void
    {
        $pattern = 'changed_files*.txt';

        $files = FilesSearch::getFilesFromListFile(__DIR__, $pattern, function () {
            return [];
        });

        $expected = [
            BP . '/app/code/Magento/Cms/Block/Block.php',
            BP . '/app/code/Magento/Cms/Api/BlockRepositoryInterface.php',
            BP . '/app/code/Magento/Cms/Observer/NoCookiesObserver.php'
        ];

        $this->assertSame($files, $expected);
    }

    /**
     * Test callblack function in case when files with lists did not found.
     */
    public function testGetEmptyList(): void
    {
        $pattern = 'zzz.txt';

        $files = FilesSearch::getFilesFromListFile(__DIR__, $pattern, function () {
            return ['1', '2', '3'];
        });

        $expected = [
            BP . '/1',
            BP . '/2',
            BP . '/3'
        ];

        $this->assertSame($files, $expected);
    }
}
