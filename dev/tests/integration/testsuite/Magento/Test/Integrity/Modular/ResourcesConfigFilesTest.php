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
declare(strict_types=1);

namespace Magento\Test\Integrity\Modular;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\ResourceConnection\Config\Reader;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Component\DirSearch;
use Magento\Framework\Config\FileIteratorFactory;
use Magento\Framework\Config\FileResolverInterface;
use Magento\Framework\Config\ValidationStateInterface;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class ResourcesConfigFilesTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var Reader
     */
    protected $model;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        /** @var $moduleDirSearch DirSearch */
        $moduleDirSearch = $objectManager->get(DirSearch::class);
        $fileIteratorFactory = $objectManager->get(FileIteratorFactory::class);
        $xmlFiles = $fileIteratorFactory->create(
            $moduleDirSearch->collectFiles(ComponentRegistrar::MODULE, 'etc/{*/resources.xml,resources.xml}')
        );

        $fileResolverMock = $this->createMock(FileResolverInterface::class);
        $fileResolverMock->expects($this->any())->method('get')->willReturn($xmlFiles);
        $validationStateMock = $this->createMock(ValidationStateInterface::class);
        $validationStateMock->expects($this->any())->method('isValidationRequired')->willReturn(true);
<<<<<<< HEAD

        $deploymentConfigMock = $this->createPartialMockWithReflection(
            DeploymentConfig::class,
            ['getConfiguration']
        );
=======
        $deploymentConfigMock = $this->getMockBuilder(DeploymentConfig::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->addMethods(['getConfiguration'])
            ->getMock();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $deploymentConfigMock->expects($this->any())->method('getConfiguration')->willReturn([]);
        $objectManager = Bootstrap::getObjectManager();
        $this->model = $objectManager->create(
            Reader::class,
            [
                'fileResolver' => $fileResolverMock,
                'validationState' => $validationStateMock,
                'deploymentConfig' => $deploymentConfigMock
            ]
        );
    }

    public function testResourcesXmlFiles()
    {
        $this->model->read('global');
    }
}
