<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleUps\Model;

use Magento\Framework\HTTP\AsyncClientInterface;
use Magento\Framework\HTTP\ClientFactory;
use Magento\Framework\Xml\Security;
use Magento\Shipping\Model\Rate\Result\ProxyDeferredFactory;
use Magento\Ups\Helper\Config;
<<<<<<< HEAD
use Magento\Ups\Model\UpsAuth;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Mock UPS shipping implementation
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Carrier extends \Magento\Ups\Model\Carrier
{
    /**
     * @var MockResponseBodyLoader
     */
    private $mockResponseLoader;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param Security $xmlSecurity
     * @param \Magento\Shipping\Model\Simplexml\ElementFactory $xmlElFactory
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param \Magento\Shipping\Model\Tracking\ResultFactory $trackFactory
     * @param \Magento\Shipping\Model\Tracking\Result\ErrorFactory $trackErrorFactory
     * @param \Magento\Shipping\Model\Tracking\Result\StatusFactory $trackStatusFactory
     * @param \Magento\Directory\Model\RegionFactory $regionFactory
     * @param \Magento\Directory\Model\CountryFactory $countryFactory
     * @param \Magento\Directory\Model\CurrencyFactory $currencyFactory
     * @param \Magento\Directory\Helper\Data $directoryData
     * @param \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
     * @param \Magento\Framework\Locale\FormatInterface $localeFormat
     * @param Config $configHelper
<<<<<<< HEAD
     * @param UpsAuth $upsAuth
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param ClientFactory $httpClientFactory
     * @param array $data
     * @param AsyncClientInterface $asyncHttpClient
     * @param ProxyDeferredFactory $proxyDeferredFactory
     * @param MockResponseBodyLoader $mockResponseLoader
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        Security $xmlSecurity,
        \Magento\Shipping\Model\Simplexml\ElementFactory $xmlElFactory,
        \Magento\Shipping\Model\Rate\ResultFactory $rateFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        \Magento\Shipping\Model\Tracking\ResultFactory $trackFactory,
        \Magento\Shipping\Model\Tracking\Result\ErrorFactory $trackErrorFactory,
        \Magento\Shipping\Model\Tracking\Result\StatusFactory $trackStatusFactory,
        \Magento\Directory\Model\RegionFactory $regionFactory,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        \Magento\Directory\Model\CurrencyFactory $currencyFactory,
        \Magento\Directory\Helper\Data $directoryData,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        Config $configHelper,
<<<<<<< HEAD
        UpsAuth $upsAuth,
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ClientFactory $httpClientFactory,
        AsyncClientInterface $asyncHttpClient,
        ProxyDeferredFactory $proxyDeferredFactory,
        MockResponseBodyLoader $mockResponseLoader,
        array $data = []
    ) {
        parent::__construct(
            $scopeConfig,
            $rateErrorFactory,
            $logger,
            $xmlSecurity,
            $xmlElFactory,
            $rateFactory,
            $rateMethodFactory,
            $trackFactory,
            $trackErrorFactory,
            $trackStatusFactory,
            $regionFactory,
            $countryFactory,
            $currencyFactory,
            $directoryData,
            $stockRegistry,
            $localeFormat,
            $configHelper,
<<<<<<< HEAD
            $upsAuth,
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $httpClientFactory,
            $data,
            $asyncHttpClient,
            $proxyDeferredFactory
        );
        $this->mockResponseLoader = $mockResponseLoader;
    }

    /**
     * @inheritdoc
     */
    protected function _getCgiQuotes()
    {
        $responseBody = $this->mockResponseLoader->loadForRequest($this->_rawRequest->getDestCountry());
        return $this->_parseCgiResponse($responseBody);
    }
}
