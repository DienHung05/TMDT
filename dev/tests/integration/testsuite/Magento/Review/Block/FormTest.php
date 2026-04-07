<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Review\Block;

<<<<<<< HEAD
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Framework\App\Area;
use Magento\Framework\App\Config\Value;
use Magento\Framework\App\ReinitableConfig;
use Magento\Framework\App\Request\Http;
use Magento\Framework\App\State;
use Magento\Framework\View\Element\ButtonLockManager;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\ObjectManager;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\Framework\App\Area;
use Magento\Framework\App\Config\Value;
use Magento\Framework\App\ReinitableConfig;
use Magento\Framework\App\State;
use Magento\TestFramework\ObjectManager;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class FormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectManager;
     */
    private $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = $this->getObjectManager();

        parent::setUp();
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Review/_files/config.php
<<<<<<< HEAD
     */
    #[DataProvider('getCorrectFlagDataProvider')]
=======
     * @dataProvider getCorrectFlagDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetCorrectFlag(
        $path,
        $scope,
        $scopeId,
        $value,
        $expectedResult
    ) {
        /** @var State $appState */
        $appState = $this->objectManager->get(State::class);
        $appState->setAreaCode(Area::AREA_FRONTEND);

        /** @var Value $config */
        $config = $this->objectManager->create(Value::class);
        $config->setPath($path);
        $config->setScope($scope);
        $config->setScopeId($scopeId);
        $config->setValue($value);
        $config->save();
        /** @var ReinitableConfig $reinitableConfig */
        $reinitableConfig = $this->objectManager->create(ReinitableConfig::class);
        $reinitableConfig->reinit();

        /** @var \Magento\Review\Block\Form $form */
        $form = $this->objectManager->create(\Magento\Review\Block\Form::class);
<<<<<<< HEAD
        $form->setButtonLockManager(
            $this->objectManager->create(ButtonLockManager::class, ['buttonLockPool' => []])
        );
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $result = $form->getAllowWriteReviewFlag();
        $this->assertEquals($result, $expectedResult);
    }

<<<<<<< HEAD
    public static function getCorrectFlagDataProvider()
=======
    public function getCorrectFlagDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'path' => 'catalog/review/allow_guest',
                'scope' => 'websites',
                'scopeId' => '1',
                'value' => 0,
                'expectedResult' => false,
            ],
            [
                'path' => 'catalog/review/allow_guest',
                'scope' => 'websites',
                'scopeId' => '1',
                'value' => 1,
                'expectedResult' => true
            ]
        ];
    }

<<<<<<< HEAD
    #[
        AppArea('frontend'),
        DataFixture(ProductFixture::class, as: 'product'),
    ]
    public function testGetProductInfo()
    {
        $fixtures = DataFixtureStorageManager::getStorage();
        $product = $fixtures->get('product');

        $form = $this->objectManager->create(Form::class);
        $form->getRequest()
            ->setMethod(Http::METHOD_GET)
            ->setParams(['id' => $product->getId() . "abc"]);

        $productInfo = $form->getProductInfo();
        $this->assertEquals($product->getId(), $productInfo->getId());
        $this->assertEquals($product->getSku(), $productInfo->getSku());
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    private function getObjectManager()
    {
        return \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }
}
