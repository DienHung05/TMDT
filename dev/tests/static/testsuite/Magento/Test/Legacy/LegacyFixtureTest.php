<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Legacy;

use Magento\TestFramework\Utility\AddedFiles;
use PHPUnit\Framework\TestCase;

/**
 * Static test for parameterized data fixtures
 */
class LegacyFixtureTest extends TestCase
{
    /**
     * Prevent creating new fixture files
     *
     * @return void
     */
    public function testNew(): void
    {
<<<<<<< HEAD
        $docUrl = 'https://developer.adobe.com/commerce/testing/guide/integration/attributes/data-fixture/';
        $files = AddedFiles::getAddedFilesList(__DIR__ . '/..');
        $legacyFixtureFiles = [];
        //pattern to ignore skip and filter files
        $skip_pattern = '/(.*(filter|skip)-list(_ee|_b2b|).php)/';
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php'
                && !preg_match($skip_pattern, $file)
=======
        $docUrl = 'https://devdocs.magento.com/guides/v2.4/test/integration/parameterized_data_fixture.html';
        $files = AddedFiles::getAddedFilesList(__DIR__ . '/..');
        $legacyFixtureFiles = [];
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                && (
                    preg_match('/(integration\/testsuite|api-functional\/testsuite).*\/(_files|Fixtures)/', $file)
                    // Cover the case when tests are located in the module folder instead of dev/tests.
                    // for instance inventory
                    || (
                        strpos($file, 'dev/tests/') === false
                        && preg_match('/app\/code\/.*\/Test.*\/(_files|Fixtures)/', $file)
                        && !preg_match('/app\/code\/.*\/Tests?\/Performance\/(_files|Fixtures)/', $file)
                    )
                )
            ) {
                $legacyFixtureFiles[] = str_replace(BP . '/', '', $file);
            }
        }

        $this->assertCount(
            0,
            $legacyFixtureFiles,
            "The format used for creating fixtures is deprecated. Please use parameterized fixture format.\n"
            . "For details please look at $docUrl.\r\n"
            . "The following fixture files were added:\r\n"
            . implode(PHP_EOL, $legacyFixtureFiles)
        );
    }
}
