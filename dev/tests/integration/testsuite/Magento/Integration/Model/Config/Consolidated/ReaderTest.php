<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Integration\Model\Config\Consolidated;

use Magento\Integration\Model\Config\Consolidated\Reader as ConfigReader;

/**
 * Integration config reader test.
 */
class ReaderTest extends \PHPUnit\Framework\TestCase
{
    /** @var \PHPUnit\Framework\MockObject\MockObject */
    protected $fileResolverMock;

    /** @var ConfigReader */
    protected $configReader;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fileResolverMock = $this->getMockBuilder(\Magento\Framework\Config\FileResolverInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods([])
=======
            ->setMethods([])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->configReader = $objectManager->create(
            \Magento\Integration\Model\Config\Consolidated\Reader::class,
            ['fileResolver' => $this->fileResolverMock]
        );
    }

    public function testRead()
    {
        $configFiles = [
            file_get_contents(realpath(__DIR__ . '/_files/integrationA.xml')),
            file_get_contents(realpath(__DIR__ . '/_files/integrationB.xml'))
        ];
        $this->fileResolverMock->expects($this->any())->method('get')->willReturn($configFiles);

        $expectedResult = require __DIR__ . '/_files/integration.php';
        $this->assertEquals($expectedResult, $this->configReader->read(), 'Error happened during config reading.');
    }
}
