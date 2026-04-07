<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\PageCache\Observer\SwitchPageCacheOnMaintenance;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * Page Cache state test.
 */
class PageCacheStateTest extends TestCase
{
    /**
     * @var PageCacheState
     */
    private $pageCacheStateStorage;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->pageCacheStateStorage = $objectManager->get(PageCacheState::class);
    }

    /**
     * Tests save state.
     *
     * @param bool $state
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('saveStateProvider')]
=======
     * @dataProvider saveStateProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSave(bool $state): void
    {
        $this->pageCacheStateStorage->save($state);
        $this->assertEquals($state, $this->pageCacheStateStorage->isEnabled());
    }

    /**
     * Tests flush state.
     *
     * @return void
     */
    public function testFlush(): void
    {
        $this->pageCacheStateStorage->save(true);
        $this->assertTrue($this->pageCacheStateStorage->isEnabled());
        $this->pageCacheStateStorage->flush();
        $this->assertFalse($this->pageCacheStateStorage->isEnabled());
    }

    /**
     * Save state provider.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function saveStateProvider(): array
=======
    public function saveStateProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [[true], [false]];
    }
}
