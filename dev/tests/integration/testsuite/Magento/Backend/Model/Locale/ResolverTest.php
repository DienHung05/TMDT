<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Backend\Model\Locale;

use Magento\Framework\Locale\Resolver;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
class ResolverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    protected $_model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_model = Bootstrap::getObjectManager()->create(
            \Magento\Backend\Model\Locale\Resolver::class
        );
    }

    /**
     * @covers \Magento\Backend\Model\Locale\Resolver::setLocale
     */
    public function testSetLocaleWithDefaultLocale()
    {
        $this->_checkSetLocale(Resolver::DEFAULT_LOCALE);
    }

    /**
     * @covers \Magento\Backend\Model\Locale\Resolver::setLocale
     */
    public function testSetLocaleWithBaseInterfaceLocale()
    {
        $user = new \Magento\Framework\DataObject();
        $session = Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\Auth\Session::class
        );
        $session->setUser($user);
        Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\Auth\Session::class
        )->getUser()->setInterfaceLocale(
            'fr_FR'
        );
        $this->_checkSetLocale('fr_FR');
    }

    /**
     * @covers \Magento\Backend\Model\Locale\Resolver::setLocale
     */
    public function testSetLocaleWithSessionLocale()
    {
        Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\Session::class
        )->setSessionLocale(
            'es_ES'
        );
        $this->_checkSetLocale('es_ES');
    }

    /**
     * @covers \Magento\Backend\Model\Locale\Resolver::setLocale
     */
    public function testSetLocaleWithRequestLocale()
    {
        $request = Bootstrap::getObjectManager()
            ->get(\Magento\Framework\App\RequestInterface::class);
        $request->setPostValue(['locale' => 'de_DE']);
        $this->_checkSetLocale('de_DE');
    }

    /**
     * Tests setLocale() with parameter
     *
     * @param string|null $localeParam
     * @param string|null $localeRequestParam
     * @param string $localeExpected
<<<<<<< HEAD
     */
    #[DataProvider('setLocaleWithParameterDataProvider')]
=======
     * @dataProvider setLocaleWithParameterDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSetLocaleWithParameter(
        ?string $localeParam,
        ?string $localeRequestParam,
        string $localeExpected
    ) {
        $request = Bootstrap::getObjectManager()
            ->get(\Magento\Framework\App\RequestInterface::class);
        $request->setPostValue(['locale' => $localeRequestParam]);
        $this->_model->setLocale($localeParam);
        $this->assertEquals($localeExpected, $this->_model->getLocale());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function setLocaleWithParameterDataProvider(): array
=======
    public function setLocaleWithParameterDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['ko_KR', 'ja_JP', 'ja_JP'],
            ['ko_KR', null, 'ko_KR'],
            [null, 'ja_JP', 'ja_JP'],
        ];
    }

    /**
     * Check set locale
     *
     * @param string $localeCodeToCheck
     * @return void
     */
    protected function _checkSetLocale($localeCodeToCheck)
    {
        $this->_model->setLocale();
        $localeCode = $this->_model->getLocale();
        $this->assertEquals($localeCode, $localeCodeToCheck);
    }
}
