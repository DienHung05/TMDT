<?php
/**
<<<<<<< HEAD
 * Copyright 2012 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Test class for \Magento\TestFramework\Annotation\AppIsolation.
 */
namespace Magento\Test\Annotation;

use Magento\Framework\ObjectManagerInterface;
<<<<<<< HEAD
use Magento\TestFramework\Annotation\Parser\AppIsolation as AnnotationParser;
use Magento\TestFramework\Fixture\Parser\AppIsolation as AttributeParser;
=======
use Magento\TestFramework\Fixture\Parser\AppIsolation;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\MockObject\MockObject;

class AppIsolationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Annotation\AppIsolation
     */
    protected $_object;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $_application;

    protected function setUp(): void
    {
<<<<<<< HEAD
        if (!class_exists(AttributeParser::class)) {
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Fixture/ParserInterface.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Fixture/AppIsolation.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Fixture/Parser/AppIsolation.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Helper/Bootstrap.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Application.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Annotation/AppIsolation.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Workaround/Override/Fixture/ResolverInterface.php';
            require_once __DIR__ . '/../../../../../../Magento/TestFramework/Workaround/Override/Fixture/Resolver.php';
        }
        /** @var ObjectManagerInterface|MockObject $objectManager */
        $objectManager = $this->createMock(ObjectManagerInterface::class);

        // Create real parsers for both old-style annotations and new-style attributes
        $sharedInstances = [
            // New-style attribute parser (PHP 8+)
            AttributeParser::class => new AttributeParser(),
            // Old-style annotation parser (docblock comments)
            AnnotationParser::class => new AnnotationParser()
=======
        /** @var ObjectManagerInterface|MockObject $objectManager */
        $objectManager = $this->getMockBuilder(ObjectManagerInterface::class)
            ->onlyMethods(['get', 'create'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $sharedInstances = [
            AppIsolation::class => $this->createConfiguredMock(AppIsolation::class, ['parse' => []])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
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
        $this->_application = $this->createPartialMock(\Magento\TestFramework\Application::class, ['reinitialize']);
        $this->_object = new \Magento\TestFramework\Annotation\AppIsolation($this->_application);
    }

    protected function tearDown(): void
    {
        $this->_application = null;
        $this->_object = null;
    }

    public function testStartTestSuite()
    {
        $this->_application->expects($this->once())->method('reinitialize');
        $this->_object->startTestSuite();
    }

    /**
     * @magentoAppIsolation invalid
     */
    public function testEndTestIsolationInvalid()
    {
        $this->expectException(\PHPUnit\Framework\Exception::class);

        $this->_object->endTest($this);
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoAppIsolation disabled
     */
    public function testEndTestIsolationAmbiguous()
    {
        $this->expectException(\PHPUnit\Framework\Exception::class);

        $this->_object->endTest($this);
    }

    public function testEndTestIsolationDefault()
    {
        $this->_application->expects($this->never())->method('reinitialize');
        $this->_object->endTest($this);
    }

    public function testEndTestIsolationController()
    {
        /** @var $controllerTest \Magento\TestFramework\TestCase\AbstractController */
<<<<<<< HEAD
        $controllerTest = $this->createMock(
            \Magento\TestFramework\TestCase\AbstractController::class
        );
=======
        $controllerTest = $this->getMockForAbstractClass(\Magento\TestFramework\TestCase\AbstractController::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_application->expects($this->once())->method('reinitialize');
        $this->_object->endTest($controllerTest);
    }

    /**
     * @magentoAppIsolation disabled
     */
    public function testEndTestIsolationDisabled()
    {
        $this->_application->expects($this->never())->method('reinitialize');
        $this->_object->endTest($this);
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testEndTestIsolationEnabled()
    {
        $this->_application->expects($this->once())->method('reinitialize');
        $this->_object->endTest($this);
    }
}
