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

namespace Magento\PageCache\Model\Layout;

use Magento\Framework\App\Cache\Type\Layout as LayoutCache;
use Magento\Framework\Message\Session;
use Magento\Framework\View\Layout;
use Magento\Framework\View\LayoutFactory;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for \Magento\PageCache\Model\Layout\DepersonalizePlugin class.
 *
 * @magentoAppArea frontend
 */
class DepersonalizePluginTest extends TestCase
{
    /**
     * @var Session
     */
    private $messageSession;

    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var LayoutCache
     */
    private $cache;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->messageSession = Bootstrap::getObjectManager()->get(Session::class);
        $this->layout = Bootstrap::getObjectManager()->get(LayoutFactory::class)->create();
        $this->cache = Bootstrap::getObjectManager()->get(LayoutCache::class);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->messageSession->clearStorage();
    }

    /**
     * @magentoCache full_page enabled
<<<<<<< HEAD
=======
     * @dataProvider afterGenerateElementsDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param string $layout
     * @param array $expectedResult
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('afterGenerateElementsDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAfterGenerateElements(string $layout, array $expectedResult): void
    {
        $this->cache->clean();
        $this->assertTrue($this->layout->loadFile($layout));
        $this->messageSession->setData(['some_data' => 1]);
        $this->layout->generateElements();
        $this->assertEquals($expectedResult, $this->messageSession->getData());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function afterGenerateElementsDataProvider(): array
=======
    public function afterGenerateElementsDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'cacheable' => [
                'layout' => INTEGRATION_TESTS_DIR . '/testsuite/Magento/Framework/View/_files/layout/cacheable.xml',
                'expectedResult' => [],
            ],
            'nonCacheable' => [
                'layout' => INTEGRATION_TESTS_DIR . '/testsuite/Magento/Framework/View/_files/layout/non_cacheable.xml',
                'expectedResult' => ['some_data' => 1],
            ],
            'nonCacheableBlockWithoutReference' => [
                'layout' => INTEGRATION_TESTS_DIR
                    . '/testsuite/Magento/Framework/View/_files/layout/non_cacheable_block_with_missing_refference.xml',
                'expectedResult' => [],
            ],
            'nonCacheableBlockWithExistedReference' => [
                'layout' => INTEGRATION_TESTS_DIR
                    . '/testsuite/Magento/Framework/View/_files/layout/non_cacheable_block_with_declared_reference.xml',
                'expectedResult' => ['some_data' => 1],
            ],
        ];
    }
}
