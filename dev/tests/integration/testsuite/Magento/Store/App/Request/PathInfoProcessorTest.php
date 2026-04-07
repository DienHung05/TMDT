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
namespace Magento\Store\App\Request;

use Magento\Framework\App\RequestInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class PathInfoProcessorTest extends TestCase
{
    /**
     * @var PathInfoProcessor
     */
    private $pathProcessor;

    protected function setUp(): void
    {
        $this->pathProcessor = Bootstrap::getObjectManager()->create(PathInfoProcessor::class);
    }

    /**
     * @covers \Magento\Store\App\Request\PathInfoProcessor::process
     * @magentoConfigFixture web/url/use_store 1
<<<<<<< HEAD
     * @param string $pathInfo
     */
    #[DataProvider('notValidStoreCodeDataProvider')]
=======
     * @dataProvider notValidStoreCodeDataProvider
     * @param string $pathInfo
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testProcessNotValidStoreCode(string $pathInfo)
    {
        $request = Bootstrap::getObjectManager()->create(RequestInterface::class);
        $info = $this->pathProcessor->process($request, $pathInfo);
        $this->assertEquals($pathInfo, $info);
    }

<<<<<<< HEAD
    public static function notValidStoreCodeDataProvider(): array
    {
        return [
            'default store id' =>
                [
                    'pathInfo' => '/0/m/c/a'
                ]
            ,
            'main store id' =>
                [
                    'pathInfo' => '/1/m/c/a'
                ]
            ,
            'nonexistent store code' =>
                [
                    'pathInfo' => '/test_string/m/c/a'
                ]
            ,
            'admin store code' =>
                [
                    'pathInfo' => '/admin/m/c/a'
                ]
            ,
            'empty path' =>
                [
                    'pathInfo' => '/'
                ]
            ,
=======
    public function notValidStoreCodeDataProvider(): array
    {
        return [
            ['default store id' => '/0/m/c/a'],
            ['main store id' => '/1/m/c/a'],
            ['nonexistent store code' => '/test_string/m/c/a'],
            ['admin store code' => '/admin/m/c/a'],
            ['empty path' => '/'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @covers \Magento\Store\App\Request\PathInfoProcessor::process
     * @magentoDataFixture Magento/Store/_files/core_fixturestore.php
     * @magentoConfigFixture web/url/use_store 1
     */
    public function testProcessValidStoreCodeCaseProcessStoreName()
    {
        $storeCode = 'fixturestore';
        $request = Bootstrap::getObjectManager()->create(RequestInterface::class);
        $pathInfo = sprintf('/%s/m/c/a', $storeCode);
        $this->assertEquals('/m/c/a', $this->pathProcessor->process($request, $pathInfo));
    }

    /**
     * @covers \Magento\Store\App\Request\PathInfoProcessor::process
     * @magentoDataFixture Magento/Store/_files/core_fixturestore.php
     * @magentoConfigFixture web/url/use_store 1
     */
    public function testProcessValidStoreCodeWhenStoreIsDirectFrontNameWithFrontName()
    {
        $storeCode = 'fixturestore';
        $request = Bootstrap::getObjectManager()->create(
            RequestInterface::class,
            ['directFrontNames' => [$storeCode => true]]
        );
        $pathInfo = sprintf('/%s/m/c/a', $storeCode);
        $this->assertEquals($pathInfo, $this->pathProcessor->process($request, $pathInfo));
        $this->assertEquals(\Magento\Framework\App\Router\Base::NO_ROUTE, $request->getActionName());
    }

    /**
     * @covers \Magento\Store\App\Request\PathInfoProcessor::process
     * @magentoDataFixture Magento/Store/_files/core_fixturestore.php
     * @magentoConfigFixture web/url/use_store 0
     */
    public function testProcessValidStoreCodeWhenUrlConfigIsDisabled()
    {
        $storeCode = 'fixturestore';
        $request = Bootstrap::getObjectManager()->create(RequestInterface::class);
        $pathInfo = sprintf('/%s/m/c/a', $storeCode);
        $this->assertEquals($pathInfo, $this->pathProcessor->process($request, $pathInfo));
        $this->assertNull($request->getActionName());
    }
}
