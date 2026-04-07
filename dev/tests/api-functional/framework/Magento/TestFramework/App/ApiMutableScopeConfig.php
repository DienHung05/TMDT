<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Application configuration object. Used to access configuration when application is installed.
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\App;

use Magento\Config\Model\Config\Factory as ConfigFactory;
use Magento\Framework\App\Config\MutableScopeConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Api\WebsiteRepositoryInterface;
use Magento\Store\Model\ScopeInterface;

/**
<<<<<<< HEAD
 * Application configuration object. Used to access configuration when application is installed.
=======
 * @inheritdoc
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class ApiMutableScopeConfig implements MutableScopeConfigInterface
{
    /** @var Config */
    private $testAppConfig;

    /** @var StoreRepositoryInterface */
    private $storeRepository;

    /** @var WebsiteRepositoryInterface */
    private $websiteRepository;

    /** @var ConfigFactory */
    private $configFactory;

    /**
     * @param ScopeConfigInterface $config
     * @param StoreRepositoryInterface $storeRepository
     * @param WebsiteRepositoryInterface $websiteRepository
     * @param ConfigFactory $configFactory
     */
    public function __construct(
        ScopeConfigInterface $config,
        StoreRepositoryInterface $storeRepository,
        WebsiteRepositoryInterface $websiteRepository,
        ConfigFactory $configFactory
    ) {
        $this->testAppConfig = $config;
        $this->storeRepository = $storeRepository;
        $this->websiteRepository = $websiteRepository;
        $this->configFactory = $configFactory;
    }

    /**
     * @inheritdoc
     */
    public function isSetFlag($path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null)
    {
        return $this->testAppConfig->isSetFlag($path, $scopeType, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function getValue($path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null)
    {
        return $this->testAppConfig->getValue($path, $scopeType, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function setValue(
        $path,
        $value,
        $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        $scopeCode = null
    ) {
        $this->persistConfig($path, $value, $scopeType, $scopeCode);
        return $this->testAppConfig->setValue($path, $value, $scopeType, $scopeCode);
    }

    /**
     * Clean app config cache
     *
     * @return void
     */
    public function clean()
    {
        $this->testAppConfig->clean();
    }

    /**
     * Persist config in database
     *
     * @param string $path
<<<<<<< HEAD
     * @param string|null $value
=======
     * @param string $value
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $scopeType
     * @param string|null $scopeCode
     * @return void
     */
<<<<<<< HEAD
    private function persistConfig(string $path, ?string $value, string $scopeType, ?string $scopeCode): void
=======
    private function persistConfig(string $path, string $value, string $scopeType, ?string $scopeCode): void
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $pathParts = explode('/', $path);
        $store = 0;
        $configData = [
            'section' => $pathParts[0],
            'website' => '',
            'store' => $store,
            'groups' => [
                $pathParts[1] => [
                    'fields' => [
                        $pathParts[2] => [
                            'value' => $value
                        ]
                    ]
                ]
            ]
        ];
        if ($scopeType === ScopeInterface::SCOPE_STORE && $scopeCode !== null) {
            $store = $this->storeRepository->get($scopeCode)->getId();
            $configData['store'] = $store;
        } elseif ($scopeType === ScopeInterface::SCOPE_WEBSITES && $scopeCode !== null) {
            $website = $this->websiteRepository->get($scopeCode)->getId();
            $configData['store'] = '';
            $configData['website'] = $website;
        }

        $this->configFactory->create(['data' => $configData])->save();
    }
}
