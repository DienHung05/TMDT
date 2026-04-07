<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Contact\Block;

use Magento\Contact\ViewModel\UserDataProvider;
use Magento\Framework\View\Element\Block\ArgumentInterface;
<<<<<<< HEAD
use Magento\Framework\View\Element\ButtonLockManager;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\TestFramework\Helper\Bootstrap;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Testing behavior when view model was not preset before
 * and view model was pre-installed before
 */
class ContactFormTest extends TestCase
{
    /**
     * Some classname
     */
    private const SOME_VIEW_MODEL = 'Magento_Contact_ViewModel_Some_View_Model';

    /**
     * @var ContactForm
     */
    private $block;

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * @inheirtDoc
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function setUp(): void
    {
        parent::setUp();
        Bootstrap::getInstance()->loadArea('frontend');
<<<<<<< HEAD
        $this->block = Bootstrap::getObjectManager()->create(ContactForm::class)
            ->setButtonLockManager(Bootstrap::getObjectManager()->create(ButtonLockManager::class));
    }

    /**
     * @param bool $setViewModel
     * @param string $expectedViewModelType
     */
    #[DataProvider('dataProvider')]
    public function testViewModel($setViewModel, $expectedViewModelType)
    {
        if ($setViewModel) {
            $someViewModel = $this->createMock(ArgumentInterface::class);
=======
        $this->block = Bootstrap::getObjectManager()->create(ContactForm::class);
    }

    /**
     * @param $setViewModel
     * @param $expectedViewModelType
     *
     * @dataProvider dataProvider
     */
    public function testViewModel($setViewModel, $expectedViewModelType)
    {
        if ($setViewModel) {
            $someViewModel = $this->getMockForAbstractClass(
                ArgumentInterface::class,
                [],
                self::SOME_VIEW_MODEL
            );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $this->block->setData('view_model', $someViewModel);
        }

        $this->block->toHtml();

<<<<<<< HEAD
        $viewModel = $this->block->getData('view_model');
        if ($setViewModel) {
            // When a view model was pre-set, verify it wasn't replaced
            $this->assertInstanceOf(ArgumentInterface::class, $viewModel);
            $this->assertNotInstanceOf(UserDataProvider::class, $viewModel);
        } else {
            // When no view model was set, verify the default UserDataProvider was added
            $this->assertInstanceOf($expectedViewModelType, $viewModel);
        }
    }

    public static function dataProvider(): array
    {
        return [
            'view model was not preset before' => [
                false,  // $setViewModel
                UserDataProvider::class  // $expectedViewModelType
            ],
            'view model was pre-installed before' => [
                true,  // $setViewModel
                ArgumentInterface::class  // $expectedViewModelType
=======
        $this->assertInstanceOf($expectedViewModelType, $this->block->getData('view_model'));
    }

    public function dataProvider(): array
    {
        return [
            'view model was not preset before' => [
                'set view model' => false,
                'expected view model type' => UserDataProvider::class
            ],
            'view model was pre-installed before' => [
                'set view model' => true,
                'expected view model type' => self::SOME_VIEW_MODEL
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        ];
    }
}
