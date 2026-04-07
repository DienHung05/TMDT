<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Workaround\Override;

use Magento\TestFramework\Workaround\Override\Config;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provide tests for \Magento\TestFramework\Workaround\Override\Config.
 */
class ConfigTest extends TestCase
{
    /** @var Config */
    private $object;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->object = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['getClassConfig', 'getMethodConfig', 'getDataSetConfig'])
=======
            ->setMethods(['getClassConfig', 'getMethodConfig', 'getDataSetConfig'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider skipValuesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param bool $skip
     * @param string $skipMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('skipValuesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSkippedClass(bool $skip, string $skipMessage): void
    {
        $this->object->expects($this->once())
            ->method('getClassConfig')
            ->with($this)
            ->willReturn(['skip' => $skip, 'skipMessage' => $skipMessage]);
        $config = $this->object->getSkipConfiguration($this);
        $this->assertEquals($skip, $config['skip']);
        if ($skipMessage) {
            $this->assertEquals($skipMessage, $config['skipMessage']);
        }
    }

<<<<<<< HEAD
    /**     *
=======
    /**
     * @dataProvider skipValuesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param bool $skip
     * @param string $skipMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('skipValuesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSkippedMethod(bool $skip, string $skipMessage): void
    {
        $this->object->expects($this->once())
            ->method('getClassConfig')
            ->with($this)
            ->willReturn(['skip' => false, 'skipMessage' => null]);
        $this->object->expects($this->once())
            ->method('getMethodConfig')
            ->with($this)
            ->willReturn(['skip' => $skip, 'skipMessage' => $skipMessage]);
        $config = $this->object->getSkipConfiguration($this);
        $this->assertEquals($skip, $config['skip']);
        if ($skipMessage) {
            $this->assertEquals($skipMessage, $config['skipMessage']);
        }
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider skipValuesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param bool $skip
     * @param string $skipMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('skipValuesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSkippedDataSet(bool $skip, string $skipMessage): void
    {
        $this->object->expects($this->once())
            ->method('getClassConfig')
            ->with($this)
            ->willReturn(['skip' => false, 'skipMessage' => null]);
        $this->object->expects($this->once())
            ->method('getMethodConfig')
            ->with($this)
            ->willReturn(['skip' => false, 'skipMessage' => null]);
        $this->object->expects($this->once())
            ->method('getDataSetConfig')
            ->with($this)
            ->willReturn(['skip' => $skip, 'skipMessage' => $skipMessage]);
        $config = $this->object->getSkipConfiguration($this);
        $this->assertEquals($skip, $config['skip']);
        if ($skipMessage) {
            $this->assertEquals($skipMessage, $config['skipMessage']);
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function skipValuesProvider(): array
=======
    public function skipValuesProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'skipped' => [
                'skip' => true,
                'skipMessage' => 'skip message',
            ],
            'is_not_skipped' => [
                'skip' => false,
                'skipMessage' => '',
            ],
        ];
    }
}
