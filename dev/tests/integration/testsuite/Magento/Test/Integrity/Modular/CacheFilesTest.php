<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Test\Integrity\Modular;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Modular;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CacheFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $area
<<<<<<< HEAD
     */
    #[DataProvider('cacheConfigDataProvider')]
=======
     * @dataProvider cacheConfigDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCacheConfig($area)
    {
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->expects($this->any())->method('isValidationRequired')->willReturn(true);

        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

        /** @var \Magento\Framework\Cache\Config\Reader $reader */
        $reader = $objectManager->create(
            \Magento\Framework\Cache\Config\Reader::class,
            ['validationState' => $validationStateMock]
        );
        try {
            $reader->read($area);
        } catch (\Magento\Framework\Exception\LocalizedException $exception) {
            $this->fail($exception->getMessage());
        }
    }

<<<<<<< HEAD
    public static function cacheConfigDataProvider()
=======
    public function cacheConfigDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ['global' => ['global'], 'adminhtml' => ['adminhtml'], 'frontend' => ['frontend']];
    }
}
