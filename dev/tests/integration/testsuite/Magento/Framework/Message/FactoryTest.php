<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\Message;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Message;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * \Magento\Framework\Message\Factory test case
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Message\Factory
     */
    protected $model;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->model = $this->objectManager->create(\Magento\Framework\Message\Factory::class);
    }

<<<<<<< HEAD
    #[DataProvider('createProvider')]
=======
    /**
     * @dataProvider createProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreate($messageType)
    {
        $message = $this->model->create($messageType, 'some text');
        $this->assertInstanceOf(\Magento\Framework\Message\MessageInterface::class, $message);
    }

<<<<<<< HEAD
    public static function createProvider()
=======
    public function createProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [MessageInterface::TYPE_SUCCESS],
            [MessageInterface::TYPE_NOTICE],
            [MessageInterface::TYPE_WARNING],
            [MessageInterface::TYPE_ERROR]
        ];
    }

    /**
     */
    public function testCreateWrong()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Wrong message type');

        $this->model->create('Wrong', 'some text');
    }
}
