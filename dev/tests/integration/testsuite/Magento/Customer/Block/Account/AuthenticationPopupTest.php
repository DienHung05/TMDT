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

namespace Magento\Customer\Block\Account;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Tests for authentication popup block.
 *
 * @see \Magento\Customer\Block\Account\AuthenticationPopup
 * @magentoAppArea frontend
 */
class AuthenticationPopupTest extends TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /** @var AuthenticationPopup */
    private $block;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->block = $this->objectManager->get(LayoutInterface::class)->createBlock(AuthenticationPopup::class);
    }

    /**
     * @magentoConfigFixture current_store customer/password/autocomplete_on_storefront 1
     *
     * @return void
     */
    public function testAutocompletePasswordEnabled(): void
    {
        $this->assertEquals('on', $this->block->getConfig()['autocomplete']);
    }

    /**
     * @magentoConfigFixture current_store customer/password/autocomplete_on_storefront 0
     *
     * @return void
     */
    public function testAutocompletePasswordDisabled(): void
    {
        $this->assertEquals('off', $this->block->getConfig()['autocomplete']);
    }
}
