<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\Encryption;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Encryption;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class EncryptorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Encryption\Encryptor
     */
    private $encryptor;

    protected function setUp(): void
    {
        $this->encryptor = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Encryption\Encryptor::class
        );
    }

    public function testEncryptDecrypt()
    {
        $this->assertEquals('', $this->encryptor->decrypt($this->encryptor->encrypt('')));
        $this->assertEquals('test', $this->encryptor->decrypt($this->encryptor->encrypt('test')));
    }

    /**
     * @param string $key
<<<<<<< HEAD
     */
    #[DataProvider('validEncryptionKeyDataProvider')]
=======
     * @dataProvider validEncryptionKeyDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidateKey($key)
    {
        $this->encryptor->validateKey($key);
    }

<<<<<<< HEAD
    public static function validEncryptionKeyDataProvider()
=======
    public function validEncryptionKeyDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            '32 numbers' => ['12345678901234567890123456789012'],
            '32 characters' => ['aBcdeFghIJKLMNOPQRSTUvwxYzabcdef'],
            '32 special characters' => ['!@#$%^&*()_+~`:;"<>,.?/|*&^%$#@!'],
            '32 combination' =>['1234eFghI1234567^&*(890123456789'],
        ];
    }

    /**
<<<<<<< HEAD
     * @param string $key
     */
    #[DataProvider('invalidEncryptionKeyDataProvider')]
=======
     *
     * @param string $key
     * @dataProvider invalidEncryptionKeyDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidateKeyInvalid($key)
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Encryption key must be 32 character string without any white space.');

        $this->encryptor->validateKey($key);
    }

<<<<<<< HEAD
    public static function invalidEncryptionKeyDataProvider()
=======
    public function invalidEncryptionKeyDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'empty string' => [''],
            'leading space' => [' 1234567890123456789012345678901'],
            'tailing space' => ['1234567890123456789012345678901 '],
            'space in the middle' => ['12345678901 23456789012345678901'],
            'tab in the middle' => ['12345678901    23456789012345678'],
            'return in the middle' => ['12345678901
            23456789012345678901'],
            '31 characters' => ['1234567890123456789012345678901'],
            '33 characters' => ['123456789012345678901234567890123'],
        ];
    }
}
