<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Test\Annotation;

use Magento\Framework\App\Area;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Annotation\TestCaseAnnotation;
use Magento\TestFramework\Fixture\Parser\AppArea;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use ReflectionProperty;

class AppAreaTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Annotation\AppArea
     */
    protected $_object;

    /**
     * @var \Magento\TestFramework\Application|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_applicationMock;

    /**
     * @var \PHPUnit\Framework\TestCase|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_testCaseMock;

    /**
     * @var TestCaseAnnotation
     */
    private $testCaseAnnotationsMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        /** @var ObjectManagerInterface|MockObject $objectManager */
        $objectManager = $this->getMockBuilder(ObjectManagerInterface::class)
<<<<<<< HEAD
            ->onlyMethods(['get', 'create', 'configure'])
            ->disableOriginalConstructor()
            ->getMock();
=======
            ->onlyMethods(['get', 'create'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $sharedInstances = [
            AppArea::class => $this->createConfiguredMock(AppArea::class, ['parse' => []])
        ];
        $objectManager->method('get')
            ->willReturnCallback(
                function (string $type) use ($sharedInstances) {
                    return $sharedInstances[$type] ?? new $type();
                }
            );
        $objectManager->method('create')
            ->willReturnCallback(
                function (string $type, array $arguments = []) {
                    return new $type(...array_values($arguments));
                }
            );

        Bootstrap::setObjectManager($objectManager);
        $this->_testCaseMock = $this->createMock(\PHPUnit\Framework\TestCase::class);
        $this->testCaseAnnotationsMock = $this->createMock(TestCaseAnnotation::class);
        $this->_applicationMock = $this->createMock(\Magento\TestFramework\Application::class);
        $this->_object = new \Magento\TestFramework\Annotation\AppArea($this->_applicationMock);
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
<<<<<<< HEAD
        $property->setValue(null, null);
=======
        $property->setAccessible(true);
        $property->setValue(null);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param array $annotations
     * @param string $expectedArea
<<<<<<< HEAD
     */
    #[DataProvider('getTestAppAreaDataProvider')]
    public function testGetTestAppArea($annotations, $expectedArea)
    {
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
=======
     * @dataProvider getTestAppAreaDataProvider
     */
    public function testGetTestAppArea($annotations, $expectedArea)
    {
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($this->testCaseAnnotationsMock);
        $this->testCaseAnnotationsMock->method('getAnnotations')->willReturn($annotations);
        $this->_applicationMock->expects($this->any())->method('getArea')->willReturn(null);
        $this->_applicationMock->expects($this->once())->method('reinitialize');
        $this->_applicationMock->expects($this->once())->method('loadArea')->with($expectedArea);
        $this->_object->startTest($this->_testCaseMock);
    }

<<<<<<< HEAD
    public static function getTestAppAreaDataProvider()
=======
    public function getTestAppAreaDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'method scope' => [['method' => ['magentoAppArea' => ['adminhtml']]], 'adminhtml'],
            'class scope' => [['class' => ['magentoAppArea' => ['frontend']]], 'frontend'],
            'mixed scope' => [
                [
                    'class' => ['magentoAppArea' => ['adminhtml']],
                    'method' => ['magentoAppArea' => ['frontend']],
                ],
                'frontend',
            ],
            'default area' => [[], 'global']
        ];
    }

<<<<<<< HEAD
=======
    /**
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetTestAppAreaWithInvalidArea()
    {
        $this->expectException(\PHPUnit\Framework\Exception::class);

        $annotations = ['method' => ['magentoAppArea' => ['some_invalid_area']]];
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
<<<<<<< HEAD
=======
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($this->testCaseAnnotationsMock);
        $this->testCaseAnnotationsMock->expects($this->once())->method('getAnnotations')->willReturn($annotations);

        $this->_object->startTest($this->_testCaseMock);
    }

    /**
     * Check startTest() with different allowed area codes.
<<<<<<< HEAD
     * @param string $areaCode
     */
    #[DataProvider('startTestWithDifferentAreaCodes')]
=======
     *
     * @dataProvider startTestWithDifferentAreaCodes
     * @param string $areaCode
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testStartTestWithDifferentAreaCodes(string $areaCode)
    {
        $annotations = ['method' => ['magentoAppArea' => [$areaCode]]];
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
<<<<<<< HEAD
=======
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($this->testCaseAnnotationsMock);
        $this->testCaseAnnotationsMock->expects($this->once())->method('getAnnotations')->willReturn($annotations);
        $this->_applicationMock->expects($this->any())->method('getArea')->willReturn(null);
        $this->_applicationMock->expects($this->once())->method('reinitialize');
        $this->_applicationMock->expects($this->once())->method('loadArea')->with($areaCode);

        $this->_object->startTest($this->_testCaseMock);
    }

    public function testStartTestPreventDoubleAreaLoadingAfterReinitialization()
    {
        $annotations = ['method' => ['magentoAppArea' => ['global']]];
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
<<<<<<< HEAD
=======
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($this->testCaseAnnotationsMock);
        $this->testCaseAnnotationsMock->expects($this->once())->method('getAnnotations')->willReturn($annotations);
        $this->_applicationMock->expects($this->once())->method('reinitialize');
        $this->_applicationMock
            ->method('getArea')
            ->willReturnOnConsecutiveCalls('adminhtml', 'global');
        $this->_applicationMock->expects($this->never())->method('loadArea');
        $this->_object->startTest($this->_testCaseMock);
    }

    public function testStartTestPreventDoubleAreaLoading()
    {
        $annotations = ['method' => ['magentoAppArea' => ['adminhtml']]];
        $property = new ReflectionProperty(TestCaseAnnotation::class, 'instance');
<<<<<<< HEAD
=======
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($this->testCaseAnnotationsMock);
        $this->testCaseAnnotationsMock->expects($this->once())->method('getAnnotations')->willReturn($annotations);
        $this->_applicationMock->expects($this->once())->method('getArea')->willReturn('adminhtml');
        $this->_applicationMock->expects($this->never())->method('reinitialize');
        $this->_applicationMock->expects($this->never())->method('loadArea');
        $this->_object->startTest($this->_testCaseMock);
    }

    /**
     *  Provide test data for testStartTestWithDifferentAreaCodes().
     *
     * @return array
     */
<<<<<<< HEAD
    public static function startTestWithDifferentAreaCodes()
    {
        return [
            [
                'areaCode' => Area::AREA_GLOBAL,
            ],
            [
                'areaCode' => Area::AREA_ADMINHTML,
            ],
            [
                'areaCode' => Area::AREA_FRONTEND,
            ],
            [
                'areaCode' => Area::AREA_WEBAPI_REST,
            ],
            [
                'areaCode' => Area::AREA_WEBAPI_SOAP,
            ],
            [
                'areaCode' => Area::AREA_CRONTAB,
            ],
            [
                'areaCode' => Area::AREA_GRAPHQL,
=======
    public function startTestWithDifferentAreaCodes()
    {
        return [
            [
                'area_code' => Area::AREA_GLOBAL,
            ],
            [
                'area_code' => Area::AREA_ADMINHTML,
            ],
            [
                'area_code' => Area::AREA_FRONTEND,
            ],
            [
                'area_code' => Area::AREA_WEBAPI_REST,
            ],
            [
                'area_code' => Area::AREA_WEBAPI_SOAP,
            ],
            [
                'area_code' => Area::AREA_CRONTAB,
            ],
            [
                'area_code' => Area::AREA_GRAPHQL,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
