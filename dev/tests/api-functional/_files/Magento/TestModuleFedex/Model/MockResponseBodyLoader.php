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

namespace Magento\TestModuleFedex\Model;

use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\HTTP\AsyncClient\Request;
use Magento\Framework\Module\Dir;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Stdlib\ArrayManager;

/**
 * Load mock response body for Fedex rate request
 */
class MockResponseBodyLoader
{
<<<<<<< HEAD
    private const REST_RESPONSE_FILE_PATTERN = '%s/_files/mock_rest_response_%s_%s.json';
    private const REST_PATH_COUNTRY = 'requestedShipment/recipient/address/countryCode';
    private const REST_PATH_SERVICE_TYPE = 'requestedShipment/serviceType';
    private const REST_AUTH_RESPONSE_FILE = '%s/_files/mock_rest_response_auth.json';
=======
    private const RESPONSE_FILE_PATTERN = '%s/_files/mock_response_%s_%s.json';
    private const PATH_COUNTRY = 'RequestedShipment/Recipient/Address/CountryCode';
    private const PATH_SERVICE_TYPE = 'RequestedShipment/ServiceType';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var Dir
     */
    private $moduleDirectory;

    /**
     * @var File
     */
    private $fileIo;

    /**
     * @var ArrayManager
     */
    private $arrayManager;

    /**
     * @param Dir $moduleDirectory
     * @param File $fileIo
     * @param ArrayManager
     */
    public function __construct(
        Dir $moduleDirectory,
        File $fileIo,
        ArrayManager $arrayManager
    ) {
        $this->moduleDirectory = $moduleDirectory;
        $this->fileIo = $fileIo;
        $this->arrayManager = $arrayManager;
    }

    /**
<<<<<<< HEAD
     * Loads mock json response for a given request
=======
     * Loads mock response xml for a given request
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $request
     * @return string
     * @throws NotFoundException
     */
<<<<<<< HEAD
    public function loadForRestRequest(array $request): string
    {
        $moduleDir = $this->moduleDirectory->getDir('Magento_TestModuleFedex');

        $type = strtolower($this->arrayManager->get(static::REST_PATH_SERVICE_TYPE, $request) ?? 'general');
        $country = strtolower($this->arrayManager->get(static::REST_PATH_COUNTRY, $request) ?? '');

        $responsePath = sprintf(static::REST_RESPONSE_FILE_PATTERN, $moduleDir, $type, $country);
=======
    public function loadForRequest(array $request): string
    {
        $moduleDir = $this->moduleDirectory->getDir('Magento_TestModuleFedex');

        $type = strtolower($this->arrayManager->get(static::PATH_SERVICE_TYPE, $request) ?? 'general');
        $country = strtolower($this->arrayManager->get(static::PATH_COUNTRY, $request) ?? '');

        $responsePath = sprintf(static::RESPONSE_FILE_PATTERN, $moduleDir, $type, $country);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        if (!$this->fileIo->fileExists($responsePath)) {
            throw new NotFoundException(
                __('"%1" is not a valid mock response type for country "%2".', $type, $country)
            );
        }
<<<<<<< HEAD
        return $this->fileIo->read($responsePath);
    }

     /**
      * Load mock json response for a given request
      */
    public function loadForAuthRequest()
    {
        $moduleDir = $this->moduleDirectory->getDir('Magento_TestModuleFedex');
        $responsePath = sprintf(static::REST_AUTH_RESPONSE_FILE, $moduleDir);

        if (!$this->fileIo->fileExists($responsePath)) {
            throw new NotFoundException(
                __('No valid mock response found for Authentication.')
            );
        }
=======

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return $this->fileIo->read($responsePath);
    }
}
