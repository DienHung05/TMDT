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

namespace Magento\Setup\Test\Unit\Model;

use Magento\Backend\Model\Url;
use Magento\Directory\Helper\Data;

use Magento\Directory\Model\Currency;
use Magento\Setup\Model\StoreConfigurationDataMapper;
use Magento\Store\Model\Store;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class StoreConfigurationDataMapperTest extends TestCase
{
    /**
     * @param array $data
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('getConfigDataDataProvider')]
=======
     * @dataProvider getConfigDataDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetConfigData(array $data, array $expected)
    {
        $userConfigurationDataMapper = new StoreConfigurationDataMapper();
        $this->assertEquals($expected, $userConfigurationDataMapper->getConfigData($data));
    }

    /**
     * @return array
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
<<<<<<< HEAD
    public static function getConfigDataDataProvider()
=======
    public function getConfigDataDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'valid' => [
                [
                    StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY => '1',
                    StoreConfigurationDataMapper::KEY_BASE_URL => 'http://127.0.0.1/',
                    StoreConfigurationDataMapper::KEY_BASE_URL_SECURE => 'https://127.0.0.1/',
                    StoreConfigurationDataMapper::KEY_CURRENCY => 'USD',
                    StoreConfigurationDataMapper::KEY_IS_SECURE => '1',
                    StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN => '1',
                    StoreConfigurationDataMapper::KEY_LANGUAGE => 'en_US',
                    StoreConfigurationDataMapper::KEY_TIMEZONE => 'America/Chicago',
                    StoreConfigurationDataMapper::KEY_USE_SEF_URL => '1',
                ],
                [
                    Store::XML_PATH_USE_REWRITES => '1',
                    Store::XML_PATH_UNSECURE_BASE_URL => 'http://127.0.0.1/',
                    Store::XML_PATH_SECURE_IN_FRONTEND => '1',
                    Store::XML_PATH_SECURE_BASE_URL => 'https://127.0.0.1/',
                    Store::XML_PATH_SECURE_IN_ADMINHTML => '1',
                    Data::XML_PATH_DEFAULT_LOCALE => 'en_US',
                    Data::XML_PATH_DEFAULT_TIMEZONE => 'America/Chicago',
                    Currency::XML_PATH_CURRENCY_BASE => 'USD',
                    Currency::XML_PATH_CURRENCY_DEFAULT => 'USD',
                    Currency::XML_PATH_CURRENCY_ALLOW => 'USD',
                    Url::XML_PATH_USE_SECURE_KEY => '1',
                ],
            ],
            'valid alphabet url' => [
                [
                    StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY => '1',
                    StoreConfigurationDataMapper::KEY_BASE_URL => 'http://example.com/',
                    StoreConfigurationDataMapper::KEY_BASE_URL_SECURE => 'https://example.com/',
                    StoreConfigurationDataMapper::KEY_CURRENCY => 'USD',
                    StoreConfigurationDataMapper::KEY_IS_SECURE => '1',
                    StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN => '1',
                    StoreConfigurationDataMapper::KEY_LANGUAGE => 'en_US',
                    StoreConfigurationDataMapper::KEY_TIMEZONE => 'America/Chicago',
                    StoreConfigurationDataMapper::KEY_USE_SEF_URL => '1',
                ],
                [
                    Store::XML_PATH_USE_REWRITES => '1',
                    Store::XML_PATH_UNSECURE_BASE_URL => 'http://example.com/',
                    Store::XML_PATH_SECURE_IN_FRONTEND => '1',
                    Store::XML_PATH_SECURE_BASE_URL => 'https://example.com/',
                    Store::XML_PATH_SECURE_IN_ADMINHTML => '1',
                    Data::XML_PATH_DEFAULT_LOCALE => 'en_US',
                    Data::XML_PATH_DEFAULT_TIMEZONE => 'America/Chicago',
                    Currency::XML_PATH_CURRENCY_BASE => 'USD',
                    Currency::XML_PATH_CURRENCY_DEFAULT => 'USD',
                    Currency::XML_PATH_CURRENCY_ALLOW => 'USD',
                    Url::XML_PATH_USE_SECURE_KEY => '1',
                ],
            ],
            'no trailing slash' => [
                [
                    StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY => '1',
                    StoreConfigurationDataMapper::KEY_BASE_URL => 'http://127.0.0.1',
                    StoreConfigurationDataMapper::KEY_BASE_URL_SECURE => 'https://127.0.0.1',
                    StoreConfigurationDataMapper::KEY_CURRENCY => 'USD',
                    StoreConfigurationDataMapper::KEY_IS_SECURE => '1',
                    StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN => '1',
                    StoreConfigurationDataMapper::KEY_LANGUAGE => 'en_US',
                    StoreConfigurationDataMapper::KEY_TIMEZONE => 'America/Chicago',
                    StoreConfigurationDataMapper::KEY_USE_SEF_URL => '1',
                ],
                [
                    Store::XML_PATH_USE_REWRITES => '1',
                    Store::XML_PATH_UNSECURE_BASE_URL => 'http://127.0.0.1/',
                    Store::XML_PATH_SECURE_IN_FRONTEND => '1',
                    Store::XML_PATH_SECURE_BASE_URL => 'https://127.0.0.1/',
                    Store::XML_PATH_SECURE_IN_ADMINHTML => '1',
                    Data::XML_PATH_DEFAULT_LOCALE => 'en_US',
                    Data::XML_PATH_DEFAULT_TIMEZONE => 'America/Chicago',
                    Currency::XML_PATH_CURRENCY_BASE => 'USD',
                    Currency::XML_PATH_CURRENCY_DEFAULT => 'USD',
                    Currency::XML_PATH_CURRENCY_ALLOW => 'USD',
                    Url::XML_PATH_USE_SECURE_KEY => '1',
                ],
            ],
            'no trailing slash, alphabet url' => [
                [
                    StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY => '1',
                    StoreConfigurationDataMapper::KEY_BASE_URL => 'http://example.com',
                    StoreConfigurationDataMapper::KEY_BASE_URL_SECURE => 'https://example.com',
                    StoreConfigurationDataMapper::KEY_CURRENCY => 'USD',
                    StoreConfigurationDataMapper::KEY_IS_SECURE => '1',
                    StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN => '1',
                    StoreConfigurationDataMapper::KEY_LANGUAGE => 'en_US',
                    StoreConfigurationDataMapper::KEY_TIMEZONE => 'America/Chicago',
                    StoreConfigurationDataMapper::KEY_USE_SEF_URL => '1',
                ],
                [
                    Store::XML_PATH_USE_REWRITES => '1',
                    Store::XML_PATH_UNSECURE_BASE_URL => 'http://example.com/',
                    Store::XML_PATH_SECURE_IN_FRONTEND => '1',
                    Store::XML_PATH_SECURE_BASE_URL => 'https://example.com/',
                    Store::XML_PATH_SECURE_IN_ADMINHTML => '1',
                    Data::XML_PATH_DEFAULT_LOCALE => 'en_US',
                    Data::XML_PATH_DEFAULT_TIMEZONE => 'America/Chicago',
                    Currency::XML_PATH_CURRENCY_BASE => 'USD',
                    Currency::XML_PATH_CURRENCY_DEFAULT => 'USD',
                    Currency::XML_PATH_CURRENCY_ALLOW => 'USD',
                    Url::XML_PATH_USE_SECURE_KEY => '1',
                ],
            ],
        ];
    }
}
