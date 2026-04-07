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

namespace Magento\Setup\Test\Unit\Module\Di\Code\Reader\InstancesNamesList;

use Magento\Framework\Code\Reader\ClassReader;
use Magento\Framework\Code\Validator;
use Magento\Framework\Code\Validator\ConstructorIntegrity;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Phrase;
use Magento\Setup\Module\Di\Code\Reader\ClassesScanner;
use Magento\Setup\Module\Di\Code\Reader\Decorator\Directory;
use Magento\Setup\Module\Di\Code\Reader\Decorator\Interceptions;
use Magento\Setup\Module\Di\Compiler\Log\Log;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

class InterceptionsTest extends TestCase
{
    /**
     * @var ClassesScanner|MockObject
     */
    private $classesScanner;

    /**
     * @var ClassReader|MockObject
     */
    private $classReaderMock;

    /**
     * @var Directory
     */
    private $model;

    /**
     * @var Validator|MockObject
     */
    private $validatorMock;

    /**
     * @var Log|MockObject
     */
    private $logMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->logMock = $this->getMockBuilder(Log::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['add', 'report'])
=======
            ->setMethods(['add', 'report'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->classesScanner = $this->getMockBuilder(ClassesScanner::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['getList'])
=======
            ->setMethods(['getList'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->classReaderMock = $this->getMockBuilder(ClassReader::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['getParents'])
=======
            ->setMethods(['getParents'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->validatorMock = $this->getMockBuilder(Validator::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['validate', 'add'])
=======
            ->setMethods(['validate', 'add'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->model = new Interceptions(
            $this->classesScanner,
            $this->classReaderMock,
            $this->validatorMock,
            new ConstructorIntegrity(),
            $this->logMock
        );
    }

    public function testGetList()
    {
        $path = '/tmp/test';

        $classes = ['NameSpace1\ClassName1', 'NameSpace1\ClassName2'];

        $this->classesScanner->expects($this->once())
            ->method('getList')
            ->with($path)
            ->willReturn($classes);

        $this->logMock->expects($this->never())
            ->method('add');

        $this->logMock->expects($this->once())->method('report');

        $this->validatorMock->expects($this->exactly(count($classes)))
            ->method('validate');

        $result = $this->model->getList($path);

        $this->assertEquals($result, $classes);
    }

    public function testGetListNoValidation()
    {
        $path = '/generated/code';

        $classes = ['NameSpace1\ClassName1', 'NameSpace1\ClassName2'];

        $this->classesScanner->expects($this->once())
            ->method('getList')
            ->with($path)
            ->willReturn($classes);

        $this->logMock->expects($this->never())
            ->method('add');

        $this->validatorMock->expects($this->never())
            ->method('validate');

        $this->logMock->expects($this->once())->method('report');

        $result = $this->model->getList($path);

        $this->assertEquals($result, $classes);
    }

    /**
<<<<<<< HEAD
     *
     * @param $exception
     */
    #[DataProvider('getListExceptionDataProvider')]
=======
     * @dataProvider getListExceptionDataProvider
     *
     * @param $exception
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetListException(\Exception $exception)
    {
        $path = '/tmp/test';

        $classes = ['NameSpace1\ClassName1'];

        $this->classesScanner->expects($this->once())
            ->method('getList')
            ->with($path)
            ->willReturn($classes);

        $this->logMock->expects($this->once())
            ->method('add')
            ->with(Log::COMPILATION_ERROR, $classes[0], $exception->getMessage());

        $this->validatorMock->expects($this->exactly(count($classes)))
            ->method('validate')
            ->willThrowException(
                $exception
            );

        $this->logMock->expects($this->once())->method('report');

        $result = $this->model->getList($path);

        $this->assertEquals($result, []);
    }

    /**
     * DataProvider for test testGetListException
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getListExceptionDataProvider()
=======
    public function getListExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [new ValidatorException(new Phrase('Not Valid!'))],
            [new \ReflectionException('Not Valid!')]
        ];
    }
}
