<?php
/**
<<<<<<< HEAD
 * Copyright 2012 Adobe
 * All Rights Reserved.
 */

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
namespace Magento\Framework\Image\Adapter;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Directory\WriteInterface;
<<<<<<< HEAD
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\ImageFixture;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoDataFixture Magento/Framework/Image/_files/image_fixture.php
 * @magentoAppIsolation enabled
 */
class InterfaceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Adapter classes for test
     *
     * @var array
     */
<<<<<<< HEAD
    protected static $_adapters = [
=======
    protected $_adapters = [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_GD2,
        \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_IM,
    ];

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * Add adapters to each data provider case
     *
     * @param array $data
     * @return array
     */
<<<<<<< HEAD
    protected static function _prepareData($data)
    {
        $result = [];
        foreach (self::$_adapters as $adapterType) {
=======
    protected function _prepareData($data)
    {
        $result = [];
        foreach ($this->_adapters as $adapterType) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            foreach ($data as $row) {
                $row[] = $adapterType;
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * Returns fixture image size
     *
     * @return array
     */
    protected function _getFixtureImageSize()
    {
        return [311, 175];
    }

    /**
     * Compare two colors with some epsilon
     *
     * @param array $colorBefore
     * @param array $colorAfter
     * @return bool
     */
    protected function _compareColors($colorBefore, $colorAfter)
    {
        // get different epsilon for 8 bit (max value = 255) & 16 bit (max value = 65535) images (eps = 5%)
        $eps = max($colorAfter) > 255 ? 3500 : 20;

        $result = true;
        foreach ($colorAfter as $i => $v) {
            if (abs($colorBefore[$i] - $v) > $eps) {
                $result = false;
                break;
            }
        }
        return $result;
    }

    /**
     * Returns fixtures image path by pattern
     *
     * @param string $pattern
     * @return string|null
     */
<<<<<<< HEAD
    protected static function _getFixture($pattern)
=======
    protected function _getFixture($pattern)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        if (!$pattern) {
            return null;
        }
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var $rootDirectory \Magento\Framework\Filesystem\Directory\WriteInterface */
        $rootDirectory = $objectManager->get(\Magento\Framework\Filesystem\Directory\TargetDirectory::class)
            ->getDirectoryWrite(DirectoryList::TMP);
        return $rootDirectory->getAbsolutePath('image/test/' . $pattern);
    }

    /**
     * Check is format supported.
     *
     * @param string $image
     * @param \Magento\Framework\Image\Adapter\AbstractAdapter $adapter
     * @return bool
     */
    protected function _isFormatSupported($image, $adapter)
    {
        if ($image === null || !file_exists($image)) {
            return false;
        }
        $data = pathinfo($image);
        $supportedTypes = $adapter->getSupportedFormats();

        return isset($data['extension']) && in_array(strtolower($data['extension']), $supportedTypes);
    }

    /**
     * Checks is adapter testable.
     * Mark test as skipped if not
     *
     * @param string $adapterType
     * @return \Magento\Framework\Image\Adapter\AdapterInterface|null
     */
    protected function _getAdapter($adapterType)
    {
        $adapter = null;
        try {
            $adapter = $this->objectManager->get(\Magento\Framework\Image\AdapterFactory::class)->create($adapterType);
        } catch (\Exception $e) {
            $this->markTestSkipped($e->getMessage());
        }
        return $adapter;
    }

    /**
     * Checks if all dependencies are loaded
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[DataProvider('adaptersDataProvider')]
=======
     *
     * @dataProvider adaptersDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCheckDependencies($adapterType)
    {
        $this->_getAdapter($adapterType);
    }

<<<<<<< HEAD
    public static function adaptersDataProvider()
=======
    public function adaptersDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [\Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_GD2],
            [\Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_IM]
        ];
    }

    /**
     * @param string $image
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[Depends('testCheckDependencies')]
    #[DataProvider('openDataProvider')]
=======
     *
     * @depends testCheckDependencies
     * @dataProvider openDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testOpen($image, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        try {
            $adapter->open($image);
        } catch (\Exception $e) {
            $result = $this->_isFormatSupported($image, $adapter);
            $this->assertFalse($result);
        }
    }

<<<<<<< HEAD
    public static function openDataProvider()
    {
        return self::_prepareData(
            [
                [null],
                [self::_getFixture('image_adapters_test.png')],
                [self::_getFixture('image_adapters_test.tiff')],
                [self::_getFixture('image_adapters_test.bmp')],
=======
    public function openDataProvider()
    {
        return $this->_prepareData(
            [
                [null],
                [$this->_getFixture('image_adapters_test.png')],
                [$this->_getFixture('image_adapters_test.tiff')],
                [$this->_getFixture('image_adapters_test.bmp')],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );
    }

    /**
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[DataProvider('adaptersDataProvider')]
=======
     * @dataProvider adaptersDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetImage($adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($this->_getFixture('image_adapters_test.png'));
        $this->assertNotEmpty($adapter->getImage());
    }

    /**
     * @param string $image
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[DataProvider('openDataProvider')]
=======
     *
     * @dataProvider openDataProvider
     * @depends testOpen
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testImageSize($image, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        try {
            $adapter->open($image);
            $this->assertEquals(
                $this->_getFixtureImageSize(),
                [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()]
            );
        } catch (\Exception $e) {
            $result = $this->_isFormatSupported($image, $adapter);
            $this->assertFalse($result);
        }
    }

    /**
     * @param string $image
     * @param array $tmpDir (dirName, newName)
     * @param string $adapterType
     *
     * @throws \Magento\Framework\Exception\FileSystemException
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[DataProvider('saveDataProvider')]
=======
     *
     * @dataProvider saveDataProvider
     * @depends testOpen
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSave($image, $tmpDir, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);

        /** @var $rootDirectory \Magento\Framework\Filesystem\Directory\WriteInterface */
        $rootDirectory = $this->objectManager->get(\Magento\Framework\Filesystem\Directory\TargetDirectory::class)
            ->getDirectoryWrite(DirectoryList::TMP);

        call_user_func_array([$adapter, 'save'], $tmpDir);
        $tmpDir = join('', $tmpDir);
        $this->assertTrue($rootDirectory->isExist($tmpDir));
        $rootDirectory->delete($tmpDir);
    }

<<<<<<< HEAD
    public static function saveDataProvider()
=======
    public function saveDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var $rootDirectory \Magento\Framework\Filesystem\Directory\WriteInterface */
        $rootDirectory = $objectManager->get(\Magento\Framework\Filesystem\Directory\TargetDirectory::class)
            ->getDirectoryWrite(DirectoryList::TMP);
        $dir = $rootDirectory->getAbsolutePath('image/');
<<<<<<< HEAD
        return self::_prepareData(
            [
                [self::_getFixture('image_adapters_test.png'), [$dir . uniqid('test_image_adapter')]],
                [self::_getFixture('image_adapters_test.png'), [$dir, uniqid('test_image_adapter')]],
=======
        return $this->_prepareData(
            [
                [$this->_getFixture('image_adapters_test.png'), [$dir . uniqid('test_image_adapter')]],
                [$this->_getFixture('image_adapters_test.png'), [$dir, uniqid('test_image_adapter')]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );
    }

    /**
     * @param string $image
     * @param array $dims (width, height)
<<<<<<< HEAD
     * @param boolean $keepRatio
     * @param array|null $expectedDims (width, height)
     * @param string|null $expectedException
     * @param string $adapterType
     */
    #[Depends('testOpen')]
    #[
        DataFixture(ImageFixture::class, ['width' => 1024, 'height' => 768], as: 'image1'),
        DataFixture(ImageFixture::class, ['width' => 1712, 'height' => 2], as: 'image2'),
        DataFixture(ImageFixture::class, ['width' => 2, 'height' => 1712], as: 'image3'),
        DataProvider('resizeDataProvider')
    ]
    public function testResize(
        string $image,
        array $dims,
        bool $keepRatio,
        ?array $expectedDims,
        ?string $expectedException,
        string $adapterType
    ): void {
        $image = DataFixtureStorageManager::getStorage()->get($image)->getAbsolutePath();
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);
        if ($keepRatio) {
            $adapter->keepAspectRatio($keepRatio);
        }
        if ($expectedException) {
            $this->expectExceptionMessage($expectedException);
        }
        $adapter->resize($dims[0], $dims[1]);
        $this->assertEquals($expectedDims, [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()]);
    }

    public static function resizeDataProvider(): array
    {
        return self::_prepareData(
            [
                ['image1', [-100, -70], false, null, 'Invalid image dimensions.'],
                ['image1', [-100, 70], false, null, 'Invalid image dimensions.'],
                ['image1', [100, -70], false, null, 'Invalid image dimensions.'],
                ['image1', [0, 0], false, null, 'Invalid image dimensions.'],
                ['image1', [0, 70], false, null, 'Invalid image dimensions.'],
                ['image1', [100, 0], false, null, 'Invalid image dimensions.'],
                ['image1', [null, null], false, null, 'Invalid image dimensions.'],
                ['image1', [null, 70], false, [93, 70], null],
                ['image1', [100, null], false, [100, 75], null],
                ['image1', [100, 70], false, [100, 70], null],
                ['image1', [100, 70], true, [93, 70], null],
                ['image2', [100, 2], false, [100, 2], null],
                ['image2', [100, 2], true, [100, 1], null],
                ['image3', [2, 100], false, [2, 100], null],
                ['image3', [2, 100], true, [1, 100], null],
=======
     * @param string $adapterType
     *
     * @dataProvider resizeDataProvider
     * @depends testOpen
     */
    public function testResize($image, $dims, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);
        try {
            $adapter->resize($dims[0], $dims[1]);
            $this->assertEquals($dims, [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()]);
        } catch (\Exception $e) {
            $result = $dims[0] !== null && $dims[0] <= 0 ||
                $dims[1] !== null && $dims[1] <= 0 ||
                empty(${$dims[0]}) && empty(${$dims[1]});
            $this->assertTrue($result);
        }
    }

    public function resizeDataProvider()
    {
        return $this->_prepareData(
            [
                [$this->_getFixture('image_adapters_test.png'), [150, 70]],
                [$this->_getFixture('image_adapters_test.png'), [null, 70]],
                [$this->_getFixture('image_adapters_test.png'), [100, null]],
                [$this->_getFixture('image_adapters_test.png'), [null, null]],
                [$this->_getFixture('image_adapters_test.png'), [-100, -50]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );
    }

    /**
     * @param string $image
     * @param int $angle
     * @param array $pixel
     * @param string $adapterType
     *
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[DataProvider('rotateDataProvider')]
=======
     * @dataProvider rotateDataProvider
     * @depends testOpen
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRotate($image, $angle, $pixel, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);

        $size = [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()];

        $colorBefore = $adapter->getColorAt($pixel['x'], $pixel['y']);
        $adapter->rotate($angle);

        $newPixel = $this->_convertCoordinates(
            $pixel,
            $angle,
            $size,
            [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()]
        );
        $colorAfter = $adapter->getColorAt($newPixel['x'], $newPixel['y']);

        $result = $this->_compareColors($colorBefore, $colorAfter);
        $this->assertTrue($result, join(',', $colorBefore) . ' not equals ' . join(',', $colorAfter));
    }

    /**
     * Get pixel coordinates after rotation
     *
     * @param array $pixel ('x' => ..., 'y' => ...)
     * @param int $angle
     * @param array $oldSize (width, height)
     * @param array $size (width, height)
     * @return array
     */
    protected function _convertCoordinates($pixel, $angle, $oldSize, $size)
    {
        $angle = $angle * pi() / 180;
        $center = ['x' => $oldSize[0] / 2, 'y' => $oldSize[1] / 2];

        $pixel['x'] -= $center['x'];
        $pixel['y'] -= $center['y'];
        return [
            'x' => round($size[0] / 2 + $pixel['x'] * cos($angle) + $pixel['y'] * sin($angle), 0),
            'y' => round($size[1] / 2 + $pixel['y'] * cos($angle) - $pixel['x'] * sin($angle), 0),
        ];
    }

<<<<<<< HEAD
    public static function rotateDataProvider()
    {
        return self::_prepareData(
            [
                [self::_getFixture('image_adapters_test.png'), 45, ['x' => 157, 'y' => 35]],
                [self::_getFixture('image_adapters_test.png'), 48, ['x' => 157, 'y' => 35]],
                [self::_getFixture('image_adapters_test.png'), 90, ['x' => 250, 'y' => 74]],
                [self::_getFixture('image_adapters_test.png'), 180, ['x' => 250, 'y' => 74]],
=======
    public function rotateDataProvider()
    {
        return $this->_prepareData(
            [
                [$this->_getFixture('image_adapters_test.png'), 45, ['x' => 157, 'y' => 35]],
                [$this->_getFixture('image_adapters_test.png'), 48, ['x' => 157, 'y' => 35]],
                [$this->_getFixture('image_adapters_test.png'), 90, ['x' => 250, 'y' => 74]],
                [$this->_getFixture('image_adapters_test.png'), 180, ['x' => 250, 'y' => 74]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );
    }

    /**
     * Test if alpha transparency is correctly handled
     *
     * @param string $image
     * @param string $watermark
     * @param int $alphaPercentage
     * @param array $comparePoint1
     * @param array $comparePoint2
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[Depends('testImageSize')]
    #[DataProvider('imageWatermarkWithAlphaTransparencyDataProvider')]
=======
     *
     * @dataProvider imageWatermarkWithAlphaTransparencyDataProvider
     * @depends testOpen
     * @depends testImageSize
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testWatermarkWithAlphaTransparency(
        $image,
        $watermark,
        $alphaPercentage,
        $comparePoint1,
        $comparePoint2,
        $adapterType
    ) {
        $imageAdapter = $this->_getAdapter($adapterType);
        $imageAdapter->open($image);

        $watermarkAdapter = $this->_getAdapter($adapterType);
        $watermarkAdapter->open($watermark);

        list($comparePoint1X, $comparePoint1Y) = $comparePoint1;
        list($comparePoint2X, $comparePoint2Y) = $comparePoint2;

        $imageAdapter
            ->setWatermarkImageOpacity($alphaPercentage)
            ->setWatermarkPosition(\Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TOP_LEFT)
            ->watermark($watermark);

        $comparePoint1Color = $imageAdapter->getColorAt($comparePoint1X, $comparePoint1Y);
        unset($comparePoint1Color['alpha']);

        $comparePoint2Color = $imageAdapter->getColorAt($comparePoint2X, $comparePoint2Y);
        unset($comparePoint2Color['alpha']);

        $result = $this->_compareColors($comparePoint1Color, $comparePoint2Color);
        $message = sprintf(
            '%s should be different to %s due to alpha transparency',
            join(',', $comparePoint1Color),
            join(',', $comparePoint2Color)
        );
        $this->assertFalse($result, $message);
    }

<<<<<<< HEAD
    public static function imageWatermarkWithAlphaTransparencyDataProvider()
    {
        return self::_prepareData(
            [
                // Watermark with alpha channel, 25%
                [
                    self::_getFixture('watermark_alpha_base_image.jpg'),
                    self::_getFixture('watermark_alpha.png'),
=======
    public function imageWatermarkWithAlphaTransparencyDataProvider()
    {
        return $this->_prepareData(
            [
                // Watermark with alpha channel, 25%
                [
                    $this->_getFixture('watermark_alpha_base_image.jpg'),
                    $this->_getFixture('watermark_alpha.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    25,
                    [ 23, 3 ],
                    [ 23, 30 ]
                ],
                // Watermark with alpha channel, 50%
                [
<<<<<<< HEAD
                    self::_getFixture('watermark_alpha_base_image.jpg'),
                    self::_getFixture('watermark_alpha.png'),
=======
                    $this->_getFixture('watermark_alpha_base_image.jpg'),
                    $this->_getFixture('watermark_alpha.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    50,
                    [ 23, 3 ],
                    [ 23, 30 ]
                ],
                // Watermark with no alpha channel, 50%
                [
<<<<<<< HEAD
                    self::_getFixture('watermark_alpha_base_image.jpg'),
                    self::_getFixture('watermark.png'),
=======
                    $this->_getFixture('watermark_alpha_base_image.jpg'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    50,
                    [ 3, 3 ],
                    [ 23,3 ]
                ],
                // Watermark with no alpha channel, 100%
                [
<<<<<<< HEAD
                    self::_getFixture('watermark_alpha_base_image.jpg'),
                    self::_getFixture('watermark.png'),
=======
                    $this->_getFixture('watermark_alpha_base_image.jpg'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    100,
                    [ 3, 3 ],
                    [ 3, 60 ]
                ],
            ]
        );
    }

    /**
     * Checks if watermark exists on the right position
     *
     * @param string $image
     * @param string $watermark
     * @param int $width
     * @param int $height
     * @param float $opacity
     * @param string $position
     * @param int $colorX
     * @param int $colorY
     * @param string $adapterType
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[DataProvider('imageWatermarkPositionDataProvider')]
=======
     *
     * @dataProvider imageWatermarkPositionDataProvider
     * @depends testOpen
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testWatermarkPosition(
        $image,
        $watermark,
        $width,
        $height,
        $opacity,
        $position,
        $colorX,
        $colorY,
        $adapterType
    ) {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);
        $pixel = $this->_prepareColor(['x' => $colorX, 'y' => $colorY], $position, $adapter);

        $colorBefore = $adapter->getColorAt($pixel['x'], $pixel['y']);
        $adapter->setWatermarkWidth(
            $width
        )->setWatermarkHeight(
            $height
        )->setWatermarkImageOpacity(
            $opacity
        )->setWatermarkPosition(
            $position
        )->watermark(
            $watermark
        );
        $colorAfter = $adapter->getColorAt($pixel['x'], $pixel['y']);

        $result = $this->_compareColors($colorBefore, $colorAfter);
        $message = join(',', $colorBefore) . ' not equals ' . join(',', $colorAfter);
        $this->assertFalse($result, $message);
    }

<<<<<<< HEAD
    public static function imageWatermarkPositionDataProvider()
    {
        return self::_prepareData(
            [
                [
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.png'),
=======
    public function imageWatermarkPositionDataProvider()
    {
        return $this->_prepareData(
            [
                [
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    50,
                    50,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_BOTTOM_RIGHT,
                    10,
                    10,
                ],
                [
<<<<<<< HEAD
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.png'),
=======
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    100,
                    70,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TOP_LEFT,
                    10,
                    10
                ],
                [
<<<<<<< HEAD
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.png'),
=======
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    100,
                    70,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TILE,
                    10,
                    10
                ],
                [
<<<<<<< HEAD
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.png'),
=======
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.png'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    100,
                    100,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_STRETCH,
                    10,
                    10
                ],
                [
<<<<<<< HEAD
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.jpg'),
=======
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.jpg'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    50,
                    50,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_BOTTOM_RIGHT,
                    10,
                    10
                ],
                [
<<<<<<< HEAD
                    self::_getFixture('image_adapters_test.png'),
                    self::_getFixture('watermark.gif'),
=======
                    $this->_getFixture('image_adapters_test.png'),
                    $this->_getFixture('watermark.gif'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    50,
                    50,
                    100,
                    \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_BOTTOM_RIGHT,
                    10,
                    10
                ],
            ]
        );
    }

    /**
     * Sets colorX and colorY coordinates according image width and height
     *
     * @param array $pixel ('x' => ..., 'y' => ...)
     * @param string $position
     * @param \Magento\Framework\Image\Adapter\AbstractAdapter $adapter
     * @return array
     */
    protected function _prepareColor($pixel, $position, $adapter)
    {
        switch ($position) {
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_BOTTOM_RIGHT:
                $pixel['x'] = $adapter->getOriginalWidth() - 1;
                $pixel['y'] = $adapter->getOriginalHeight() - 1;
                break;
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_BOTTOM_LEFT:
                $pixel['x'] = 1;
                $pixel['y'] = $adapter->getOriginalHeight() - 1;
                break;
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TOP_LEFT:
                $pixel['x'] = 1;
                $pixel['y'] = 10;
                break;
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TOP_RIGHT:
                $pixel['x'] = $adapter->getOriginalWidth() - 1;
                $pixel['y'] = 1;
                break;
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_CENTER:
                $pixel['x'] = $adapter->getOriginalWidth() / 2;
                $pixel['y'] = $adapter->getOriginalHeight() / 2;
                break;
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_STRETCH:
            case \Magento\Framework\Image\Adapter\AbstractAdapter::POSITION_TILE:
                $pixel['x'] = round($adapter->getOriginalWidth() / 3);
                $pixel['y'] = round($adapter->getOriginalHeight() / 3);
                break;
        }
        return $pixel;
    }

    /**
     * @param string $image
     * @param int $left
     * @param int $top
     * @param int $right
     * @param int $bottom
     * @param string $adapterType
     *
<<<<<<< HEAD
     */
    #[Depends('testOpen')]
    #[DataProvider('cropDataProvider')]
=======
     * @dataProvider cropDataProvider
     * @depends testOpen
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCrop($image, $left, $top, $right, $bottom, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);
        $adapter->open($image);

        $expectedSize = [
            $adapter->getOriginalWidth() - $left - $right,
            $adapter->getOriginalHeight() - $top - $bottom,
        ];

        $adapter->crop($top, $left, $right, $bottom);

        $newSize = [$adapter->getOriginalWidth(), $adapter->getOriginalHeight()];

        $this->assertEquals($expectedSize, $newSize);
    }

<<<<<<< HEAD
    public static function cropDataProvider()
    {
        return self::_prepareData(
            [
                [self::_getFixture('image_adapters_test.png'), 50, 50, 75, 75],
                [self::_getFixture('image_adapters_test.png'), 20, 50, 35, 35],
                [self::_getFixture('image_adapters_test.png'), 0, 0, 0, 0],
=======
    public function cropDataProvider()
    {
        return $this->_prepareData(
            [
                [$this->_getFixture('image_adapters_test.png'), 50, 50, 75, 75],
                [$this->_getFixture('image_adapters_test.png'), 20, 50, 35, 35],
                [$this->_getFixture('image_adapters_test.png'), 0, 0, 0, 0],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider createPngFromStringDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $pixel1
     * @param array $expectedColor1
     * @param array $pixel2
     * @param array $expectedColor2
     * @param string $adapterType
     */
<<<<<<< HEAD
    #[DataProvider('createPngFromStringDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreatePngFromString($pixel1, $expectedColor1, $pixel2, $expectedColor2, $adapterType)
    {
        $adapter = $this->_getAdapter($adapterType);

        /** @var \Magento\Framework\Filesystem\Directory\ReadFactory readFactory */
        $readFactory = $this->objectManager->get(\Magento\Framework\Filesystem\Directory\ReadFactory::class);
        $reader = $readFactory->create(BP);
        $path = $reader->getAbsolutePath('lib/internal/LinLibertineFont/LinLibertine_Re-4.4.1.ttf');
        $adapter->createPngFromString('T', $path);
        $adapter->refreshImageDimensions();

        $color1 = $adapter->getColorAt($pixel1['x'], $pixel1['y']);
        unset($color1['alpha']);
        $this->assertEquals($expectedColor1, $color1);

        $color2 = $adapter->getColorAt($pixel2['x'], $pixel2['y']);
        unset($color2['alpha']);
        $this->assertEquals($expectedColor2, $color2);
    }

    /**
     * We use different points for same cases for different adapters because of different antialiasing behavior
     * @link http://php.net/manual/en/function.imageantialias.php
     * @return array
     */
<<<<<<< HEAD
    public static function createPngFromStringDataProvider()
=======
    public function createPngFromStringDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                ['x' => 5, 'y' => 8],
<<<<<<< HEAD
                ['red' => 0, 'green' => 0, 'blue' => 0],
                ['x' => 0, 'y' => 11],
                ['red' => 255, 'green' => 255, 'blue' => 255],
=======
                'expectedColor1' => ['red' => 0, 'green' => 0, 'blue' => 0],
                ['x' => 0, 'y' => 11],
                'expectedColor2' => ['red' => 255, 'green' => 255, 'blue' => 255],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_GD2,
            ],
            [
                ['x' => 5, 'y' => 12],
<<<<<<< HEAD
                ['red' => 0, 'green' => 0, 'blue' => 0],
                ['x' => 0, 'y' => 20],
                ['red' => 255, 'green' => 255, 'blue' => 255],
=======
                'expectedColor1' => ['red' => 0, 'green' => 0, 'blue' => 0],
                ['x' => 0, 'y' => 20],
                'expectedColor2' => ['red' => 255, 'green' => 255, 'blue' => 255],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_IM
            ],
            [
                ['x' => 1, 'y' => 11],
<<<<<<< HEAD
                ['red' => 255, 'green' => 255, 'blue' => 255],
                ['x' => 5, 'y' => 11],
                ['red' => 0, 'green' => 0, 'blue' => 0],
=======
                'expectedColor1' => ['red' => 255, 'green' => 255, 'blue' => 255],
                ['x' => 5, 'y' => 11],
                'expectedColor2' => ['red' => 0, 'green' => 0, 'blue' => 0],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_GD2
            ],
            [
                ['x' => 1, 'y' => 20],
<<<<<<< HEAD
                ['red' => 255, 'green' => 255, 'blue' => 255],
                ['x' => 5, 'y' => 16],
                ['red' => 0, 'green' => 0, 'blue' => 0],
=======
                'expectedColor1' => ['red' => 255, 'green' => 255, 'blue' => 255],
                ['x' => 5, 'y' => 16],
                'expectedColor2' => ['red' => 0, 'green' => 0, 'blue' => 0],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                \Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_IM
            ]
        ];
    }

    public function testValidateUploadFile()
    {
        $imageAdapter = $this->objectManager->get(\Magento\Framework\Image\AdapterFactory::class)->create();
        $this->assertTrue($imageAdapter->validateUploadFile($this->_getFixture('magento_thumbnail.jpg')));
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider testValidateUploadFileExceptionDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $fileName
     * @param string $expectedErrorMsg
     * @param bool $useFixture
     */
<<<<<<< HEAD
    #[DataProvider('imageValidateUploadFileExceptionDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidateUploadFileException($fileName, $expectedErrorMsg, $useFixture)
    {
        $this->expectException(\InvalidArgumentException::class);

        $imageAdapter = $this->objectManager->get(\Magento\Framework\Image\AdapterFactory::class)->create();
        $filePath = $useFixture ? $this->_getFixture($fileName) : $fileName;

        try {
            $imageAdapter->validateUploadFile($filePath);
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals($expectedErrorMsg, $e->getMessage());
            throw $e;
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function imageValidateUploadFileExceptionDataProvider()
=======
    public function testValidateUploadFileExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'image_notfound' => [
                'fileName' => 'notfound.png',
                'expectedErrorMsg' => 'Upload file does not exist.',
                'useFixture' => false
            ],
            'image_empty' => [
                'fileName' => 'empty.png',
                'expectedErrorMsg' => 'Wrong file size.',
                'useFixture' => true
            ],
            'notanimage' => [
                'fileName' => 'notanimage.txt',
                'expectedErrorMsg' => 'Disallowed file type.',
                'useFixture' => true
            ]
        ];
    }
}
