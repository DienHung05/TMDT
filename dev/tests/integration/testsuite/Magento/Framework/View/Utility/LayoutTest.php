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
namespace Magento\Framework\View\Utility;

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class LayoutTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\View\Utility\Layout
     */
    protected $_utility;

    protected function setUp(): void
    {
        \Magento\TestFramework\Helper\Bootstrap::getInstance()->reinitialize(
            [
                Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS => [
                    DirectoryList::APP => ['path' => BP . '/dev/tests/integration'],
                ],
            ]
        );
        $this->_utility = new \Magento\Framework\View\Utility\Layout($this);
    }

    /**
     * Assert that the actual layout update instance represents the expected layout update file
     *
     * @param string $expectedUpdateFile
     * @param \Magento\Framework\View\Layout\ProcessorInterface $actualUpdate
     */
    protected function _assertLayoutUpdate($expectedUpdateFile, $actualUpdate)
    {
        $this->assertInstanceOf(\Magento\Framework\View\Layout\ProcessorInterface::class, $actualUpdate);

        $layoutUpdateXml = $actualUpdate->getFileLayoutUpdatesXml();
        $this->assertInstanceOf(\Magento\Framework\View\Layout\Element::class, $layoutUpdateXml);
        $this->assertXmlStringEqualsXmlFile($expectedUpdateFile, $layoutUpdateXml->asNiceXml());
    }

    /**
     * @param string|array $inputFiles
     * @param string $expectedFile
<<<<<<< HEAD
     */
    #[DataProvider('getLayoutFromFixtureDataProvider')]
=======
     *
     * @dataProvider getLayoutFromFixtureDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetLayoutUpdateFromFixture($inputFiles, $expectedFile)
    {
        $layoutUpdate = $this->_utility->getLayoutUpdateFromFixture($inputFiles);
        $this->_assertLayoutUpdate($expectedFile, $layoutUpdate);
    }

    /**
     * @param string|array $inputFiles
     * @param string $expectedFile
<<<<<<< HEAD
     */
    #[DataProvider('getLayoutFromFixtureDataProvider')]
=======
     *
     * @dataProvider getLayoutFromFixtureDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetLayoutFromFixture($inputFiles, $expectedFile)
    {
        $layout = $this->_utility->getLayoutFromFixture($inputFiles, $this->_utility->getLayoutDependencies());
        $this->assertInstanceOf(\Magento\Framework\View\LayoutInterface::class, $layout);
        $this->_assertLayoutUpdate($expectedFile, $layout->getUpdate());
    }

<<<<<<< HEAD
    public static function getLayoutFromFixtureDataProvider()
=======
    public function getLayoutFromFixtureDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'single fixture file' => [
                __DIR__ . '/_files/layout/handle_two.xml',
                __DIR__ . '/_files/layout_merged/single_handle.xml',
            ],
            'multiple fixture files' => [
                glob(__DIR__ . '/_files/layout/*.xml'),
                __DIR__ . '/_files/layout_merged/multiple_handles.xml',
            ]
        ];
    }
}
