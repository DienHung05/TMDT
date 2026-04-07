<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Utility;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Utility;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CodeCheckTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CodeCheck
     */
    private $codeCheck;

    protected function setUp(): void
    {
        $this->codeCheck = new CodeCheck();
    }

    /**
     * @param string $fileContent
<<<<<<< HEAD
     * @param bool $isClassUsed     */
    #[DataProvider('isClassUsedDataProvider')]
=======
     * @param bool $isClassUsed
     * @dataProvider isClassUsedDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsClassUsed($fileContent, $isClassUsed)
    {
        $this->assertEquals(
            $isClassUsed,
            $this->codeCheck->isClassUsed('MyClass', $fileContent)
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isClassUsedDataProvider()
=======
    public function isClassUsedDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [file_get_contents(__DIR__ . '/_files/create_new_instance.txt'), true],
            [file_get_contents(__DIR__ . '/_files/create_new_instance2.txt'), true],
            [file_get_contents(__DIR__ . '/_files/create_new_instance3.txt'), true],
            [file_get_contents(__DIR__ . '/_files/class_name_in_namespace_and_variable_name.txt'), false],
            [file_get_contents(__DIR__ . '/_files/extends.txt'), true],
            [file_get_contents(__DIR__ . '/_files/extends2.txt'), true],
            [file_get_contents(__DIR__ . '/_files/use.txt'), true],
            [file_get_contents(__DIR__ . '/_files/use2.txt'), true]
        ];
    }

    /**
     * @param string $fileContent
     * @param bool $isDirectDescendant
<<<<<<< HEAD
     */
    #[DataProvider('isDirectDescendantDataProvider')]
=======
     * @dataProvider isDirectDescendantDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsDirectDescendant($fileContent, $isDirectDescendant)
    {
        $this->assertEquals(
            $isDirectDescendant,
            $this->codeCheck->isDirectDescendant($fileContent, 'MyClass')
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isDirectDescendantDataProvider()
=======
    public function isDirectDescendantDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [file_get_contents(__DIR__ . '/_files/extends.txt'), true],
            [file_get_contents(__DIR__ . '/_files/extends2.txt'), true],
            [file_get_contents(__DIR__ . '/_files/implements.txt'), true],
            [file_get_contents(__DIR__ . '/_files/implements2.txt'), true]
        ];
    }
}
