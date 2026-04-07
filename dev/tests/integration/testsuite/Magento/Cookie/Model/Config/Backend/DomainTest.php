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
namespace Magento\Cookie\Model\Config\Backend;

use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Test \Magento\Cookie\Model\Config\Backend\Domain
 *
 * @magentoAppArea adminhtml
 */
class DomainTest extends TestCase
{
    /**
     * @param string $value
<<<<<<< HEAD
     * @param string|null $exceptionMessage
     * @magentoDbIsolation enabled
     */
    #[DataProvider('beforeSaveDataProvider')]
=======
     * @param string $exceptionMessage
     * @magentoDbIsolation enabled
     * @dataProvider beforeSaveDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBeforeSave($value, $exceptionMessage = null)
    {
        /** @var $domain Domain */
        $domain = Bootstrap::getObjectManager()->create(Domain::class);
        $domain->setValue($value);
        $domain->setPath('path');
        try {
            $domain->save();
            if ($exceptionMessage) {
                $this->fail('Failed to throw exception');
            } else {
                $this->assertNotNull($domain->getId());
            }
        } catch (LocalizedException $e) {
            $this->assertStringContainsString('Invalid domain name: ', $e->getMessage());
            $this->assertEquals($exceptionMessage, $e->getMessage());
            $this->assertNull($domain->getId());
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function beforeSaveDataProvider(): array
    {
        return [
            'notString' => [
                ['array'],  // $value
                'Invalid domain name: must be a string'  // $exceptionMessage
            ],
            'invalidHostname' => [
                'http://',  // $value
                'Invalid domain name: The input does not match the expected structure for a DNS hostname; '
                . 'The input does not appear to be a valid URI hostname; '
                . 'The input does not appear to be a valid local network name'  // $exceptionMessage
            ],
            'validHostname' => [
                'hostname.com',  // $value
                null  // $exceptionMessage
            ],
            'emptyString' => [
                '',  // $value
                null  // $exceptionMessage
            ],
            'invalidCharacter' => [
                'hostname,com',  // $value
                'Invalid domain name: invalid character in cookie domain'  // $exceptionMessage
            ],
=======
    public function beforeSaveDataProvider(): array
    {
        return [
            'notString' => [['array'], 'Invalid domain name: must be a string'],
            'invalidHostname' => [
                'http://',
                'Invalid domain name: The input does not match the expected structure for a DNS hostname; '
                . 'The input does not appear to be a valid URI hostname; '
                . 'The input does not appear to be a valid local network name',
            ],
            'validHostname' => ['hostname.com'],
            'emptyString' => [''],
            'invalidCharacter' => ['hostname,com', 'Invalid domain name: invalid character in cookie domain'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
