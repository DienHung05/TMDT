<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Authentication\Rest;

/**
 * Custom Client implementation for cURL
 */
class CurlClient extends \Magento\Framework\HTTP\ClientFactory
{

    /**
     * Fetch api response using curl client factory
     *
     * @param string $url
     * @param array $requestBody
     * @param array $headers
     * @param string $method
     * @return string
     */
    public function retrieveResponse(
        string $url,
        array $requestBody,
        array $headers,
        string $method = 'POST'
    ): string {
        $httpClient = $this->create();
        $httpClient->setHeaders($headers);
        $httpClient->setOption(CURLOPT_FAILONERROR, true);
        if ($method === 'GET') {
            $httpClient->get($url);
        } else {
            $httpClient->post($url, $requestBody);
        }

        return $httpClient->getBody();
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Authentication\Rest;

use OAuth\Common\Http\Uri\UriInterface;

/**
 * Custom Client implementation for cURL
 */
class CurlClient extends \OAuth\Common\Http\Client\CurlClient
{
    /**
     * @inheritdoc
     */
    public function retrieveResponse(
        UriInterface $endpoint,
        $requestBody,
        array $extraHeaders = [],
        $method = 'POST'
    ) {
        $this->setCurlParameters([CURLOPT_FAILONERROR => true]);
        return parent::retrieveResponse($endpoint, $requestBody, $extraHeaders, $method);
    }

    /**
     * @inheritdoc
     */
    public function normalizeHeaders(&$headers)
    {
        array_walk(
            $headers,
            function (&$val, $key) {
                $val = ucfirst(strtolower($key)) . ': ' . $val;
            }
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
