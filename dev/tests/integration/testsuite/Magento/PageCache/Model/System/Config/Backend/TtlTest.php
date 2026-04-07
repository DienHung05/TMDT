<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\PageCache\Model\System\Config\Backend;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\PageCache\Model\System\Config\Backend;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class TtlTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\PageCache\Model\System\Config\Backend\Ttl
     */
    protected $_model;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_config;

    protected function setUp(): void
    {
        $this->_config = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\App\Config\ScopeConfigInterface::class);
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\PageCache\Model\System\Config\Backend\Ttl::class);
    }

    /**
<<<<<<< HEAD
     * @param $value
     * @param $path
     */
    #[DataProvider('beforeSaveDataProvider')]
=======
     * @dataProvider beforeSaveDataProvider
     *
     * @param $value
     * @param $path
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBeforeSave($value, $path)
    {
        $this->_prepareData($value, $path);
    }

<<<<<<< HEAD
    public static function beforeSaveDataProvider(): array
=======
    public function beforeSaveDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [125, 'ttl_1'],
            [0, 'ttl_2'],
        ];
    }

    /**
<<<<<<< HEAD
     * @param $value
     * @param $path
     */
    #[DataProvider('beforeSaveDataProviderWithException')]
=======
     * @dataProvider beforeSaveDataProviderWithException
     *
     * @param $value
     * @param $path
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBeforeSaveWithException($value, $path)
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);
        $this->_prepareData($value, $path);
    }

<<<<<<< HEAD
    public static function beforeSaveDataProviderWithException(): array
=======
    public function beforeSaveDataProviderWithException()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['', 'ttl_3'],
            ['sdfg', 'ttl_4']
        ];
    }

    /**
     * @param $value
     * @param $path
     */
    protected function _prepareData($value, $path)
    {
        $this->_model->setValue($value);
        $this->_model->setPath($path);
        $this->_model->setField($path);
        $this->_model->save();
    }
}
