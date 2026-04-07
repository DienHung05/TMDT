<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\Authentication\Rest\OauthClient;

<<<<<<< HEAD
use Magento\Framework\Oauth\Helper\Utility;
=======
use OAuth\Common\Http\Uri\UriInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Signature class for Magento REST API.
 */
<<<<<<< HEAD
class Signature
{
    /**
     * @param Utility $helper
     */
    public function __construct(private readonly Utility $helper)
    {
    }

    /**
     * Get the signature
     *
     * @param array $params
     * @param string $signatureMethod
     * @param string $consumerSecret
     * @param string|null $tokenSecret
     * @param string $httpMethod
     * @param string $requestUrl
     * @return string
     */
    public function getSignature(
        array $params,
        string $signatureMethod,
        string $consumerSecret,
        ?string $tokenSecret,
        string $httpMethod,
        string $requestUrl
    ): string {
        $data = parse_url($requestUrl);
        $queryStringData = !isset($data['query']) ? [] : array_reduce(
            explode('&', $data['query']),
=======
class Signature extends \OAuth\OAuth1\Signature\Signature
{
    /**
     * @inheritDoc
     *
     * In addition to the original method, allows array parameters for filters.
     */
    public function getSignature(UriInterface $uri, array $params, $method = 'POST')
    {
        $queryStringData = !$uri->getQuery() ? [] : array_reduce(
            explode('&', $uri->getQuery()),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            function ($carry, $item) {
                list($key, $value) = explode('=', $item, 2);
                $carry[rawurldecode($key)] = rawurldecode($value);
                return $carry;
            },
            []
        );

<<<<<<< HEAD
        return $this->helper->sign(
            array_merge($queryStringData, $params),
            $signatureMethod,
            $consumerSecret,
            $tokenSecret,
            $httpMethod,
            $requestUrl
        );
=======
        $signatureData = [];
        foreach (array_merge($queryStringData, $params) as $key => $value) {
            $signatureData[rawurlencode($key)] = rawurlencode($value);
        }

        ksort($signatureData);

        // determine base uri
        $baseUri = $uri->getScheme() . '://' . $uri->getRawAuthority();

        if ('/' == $uri->getPath()) {
            $baseUri .= $uri->hasExplicitTrailingHostSlash() ? '/' : '';
        } else {
            $baseUri .= $uri->getPath();
        }

        $baseString = strtoupper($method) . '&';
        $baseString .= rawurlencode($baseUri) . '&';
        $baseString .= rawurlencode($this->buildSignatureDataString($signatureData));

        return base64_encode($this->hash($baseString));
    }

    /**
     * @inheritDoc
     */
    protected function hash($data)
    {
        switch (strtoupper($this->algorithm)) {
            case 'HMAC-SHA256':
                return hash_hmac('sha256', $data, $this->getSigningKey(), true);
            default:
                return parent::hash($data);
        }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
