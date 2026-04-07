<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Store;

use Magento\Framework\Interception\InterceptorInterface;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Store;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\App\Config;
use Magento\TestFramework\ObjectManager;

/**
 * Integration tests decoration of store manager
<<<<<<< HEAD
=======
 *
 * @package Magento\TestFramework\Store
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class StoreManager implements \Magento\Store\Model\StoreManagerInterface
{
    /**
     * @var \Magento\Store\Model\StoreManager
     */
    protected $decoratedStoreManager;

    /**
     * @var \Magento\Framework\Event\ManagerInterface
     */
    protected $eventManager;

    /**
     * @var null|bool
     */
    protected $fireEventInitCurrentStoreAfter = null;

    /**
     * @param \Magento\Store\Model\StoreManager $decoratedStoreManager
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     */
    public function __construct(
        \Magento\Store\Model\StoreManager $decoratedStoreManager,
        \Magento\Framework\Event\ManagerInterface $eventManager
    ) {
        $this->decoratedStoreManager = $decoratedStoreManager;
        $this->eventManager = $eventManager;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function setCurrentStore($store)
    {
        $this->decoratedStoreManager->setCurrentStore($store);
        $this->dispatchInitCurrentStoreAfterEvent();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function setIsSingleStoreModeAllowed($value)
    {
        $this->decoratedStoreManager->setIsSingleStoreModeAllowed($value);
        $this->dispatchInitCurrentStoreAfterEvent();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function hasSingleStore()
    {
        $result = $this->decoratedStoreManager->hasSingleStore();
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function isSingleStoreMode()
    {
        $result = $this->decoratedStoreManager->isSingleStoreMode();
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getStore($storeId = null)
    {
        $result = $this->decoratedStoreManager->getStore($storeId);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getStores($withDefault = false, $codeKey = false)
    {
        $result = $this->decoratedStoreManager->getStores($withDefault, $codeKey);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getWebsite($websiteId = null)
    {
        $result = $this->decoratedStoreManager->getWebsite($websiteId);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getWebsites($withDefault = false, $codeKey = false)
    {
        $result = $this->decoratedStoreManager->getWebsites($withDefault, $codeKey);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function reinitStores()
    {
        //In order to restore configFixture values
        $testAppConfig = ObjectManager::getInstance()->get(Config::class);
        $reflection = new \ReflectionClass($testAppConfig);
<<<<<<< HEAD
        if ($reflection->implementsInterface(InterceptorInterface::class)) {
            $reflection = $reflection->getParentClass();
        }
        $dataProperty = $reflection->getProperty('data');
=======
        $dataProperty = $reflection->getProperty('data');
        $dataProperty->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $savedConfig = $dataProperty->getValue($testAppConfig);

        $this->decoratedStoreManager->reinitStores();

        $dataProperty->setValue($testAppConfig, $savedConfig);
        $this->dispatchInitCurrentStoreAfterEvent();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getDefaultStoreView()
    {
        $result = $this->decoratedStoreManager->getDefaultStoreView();
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getGroup($groupId = null)
    {
        $result = $this->decoratedStoreManager->getGroup($groupId);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function getGroups($withDefault = false)
    {
        $result = $this->decoratedStoreManager->getGroups($withDefault);
        $this->dispatchInitCurrentStoreAfterEvent();
        return $result;
    }

    /**
     * Dispatch event 'core_app_init_current_store_after'
     */
    protected function dispatchInitCurrentStoreAfterEvent()
    {
        if (null === $this->fireEventInitCurrentStoreAfter) {
            $this->fireEventInitCurrentStoreAfter = true;
            $this->eventManager->dispatch('core_app_init_current_store_after');
        }
    }
}
