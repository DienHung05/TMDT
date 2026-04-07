<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Authentication\Rest;

use Magento\Framework\Oauth\NonceGeneratorInterface;
use Magento\Framework\Url;
use Magento\Framework\Oauth\Helper\Utility;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Inspection\Exception;
use Magento\TestFramework\Authentication\Rest\OauthClient\Signature;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\TestFramework\Authentication\Rest;

use Magento\TestFramework\Helper\Bootstrap;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Client\ClientInterface;
use OAuth\Common\Http\Exception\TokenResponseException;
use OAuth\Common\Http\Uri\Uri;
use OAuth\Common\Http\Uri\UriInterface;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\OAuth1\Service\AbstractService;
use OAuth\OAuth1\Signature\SignatureInterface;
use OAuth\OAuth1\Token\StdOAuth1Token;
use OAuth\OAuth1\Token\TokenInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
<<<<<<< HEAD
class OauthClient
{
    /**
     * @var Url
     */
    protected Url $urlProvider;

    /**
     * @var CurlClient
     */
    protected CurlClient $curlClient;

    /**
     * @var NonceGeneratorInterface
     */
    protected NonceGeneratorInterface $_nonceGenerator;

    /**
     * @var Utility
     */
    private Utility $_httpUtility;

    /**
     * @var Signature
     */
    private Signature $signature;

    /**
     * @var string
     */
    protected string $consumerKey;

    /**
     * @var string
     */
    protected string $consumerSecret;

    /**
     * @param Url $urlProvider
     * @param CurlClient $curlClient
     * @param NonceGeneratorInterface $nonceGenerator
     * @param Utility $utility
     * @param Signature $signature
     */
    public function __construct(
        Url                     $urlProvider,
        CurlClient              $curlClient,
        NonceGeneratorInterface $nonceGenerator,
        Utility                 $utility,
        Signature               $signature
    ) {
        $this->urlProvider = $urlProvider;
        $this->curlClient = $curlClient;
        $this->_nonceGenerator = $nonceGenerator;
        $this->_httpUtility = $utility;
        $this->signature = $signature;
    }

    /**
     * Return current OauthService object after setting required key values
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     * @return OauthClient
     */
    public function create(string $consumerKey, string $consumerSecret)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        return $this;
    }

    /**
     * Builds the authorization header array.
     *
     * @param array $params
     * @return array
     */
    public function getBasicAuthorizationParams(array $params): array
    {
        $headerParams = [
            'oauth_nonce' => $this->_nonceGenerator->generateNonce(),
            'oauth_timestamp' => (string)$this->_nonceGenerator->generateTimestamp(),
            'oauth_version' => '1.0',
            "oauth_signature_method" => \Magento\Framework\Oauth\Oauth::SIGNATURE_SHA256,
            "oauth_callback" => TESTS_BASE_URL
        ];
        return array_merge($headerParams, $params);
    }

    /**
     * Get request token.
     *
     * @return array
     * @throws \Exception
     */
    public function getRequestToken(): array
    {
        $authParameters = ['oauth_consumer_key' => $this->consumerKey];
        $authParameters = $this->getBasicAuthorizationParams($authParameters);
        $requestUrl = $this->getRequestTokenEndpoint();
        $headers = [
            'Authorization' => $this->buildAuthorizationHeaderToRequestToken(
                $authParameters,
                $this->consumerSecret,
                $requestUrl
            )
        ];

        $responseBody = $this->curlClient->retrieveResponse($requestUrl, [], $headers);
        return $this->parseResponseBody($responseBody);
    }

    /**
     * Build header for request token
     *
     * @param array $params
     * @param string $consumerSecret
     * @param string $requestUrl
     * @param string $signatureMethod
     * @param string $httpMethod
     * @return string
     */
    public function buildAuthorizationHeaderToRequestToken(
        array  $params,
        string $consumerSecret,
        string $requestUrl,
        string $signatureMethod = \Magento\Framework\Oauth\Oauth::SIGNATURE_SHA256,
        string $httpMethod = 'POST'
    ): string {
        $params['oauth_signature'] = $this->signature->getSignature(
            $params,
            $signatureMethod,
            $consumerSecret,
            null,
            $httpMethod,
            $requestUrl
        );

        return $this->_httpUtility->toAuthorizationHeader($params);
    }

    /**
     * Get access token
     *
     * @param array $token
     * @param string $verifier
     * @return array
     * @throws \Exception
     */
    public function getAccessToken(array $token, string $verifier): array
    {
        $authParameters = ['oauth_consumer_key' => $this->consumerKey];
        $authParameters = $this->getBasicAuthorizationParams($authParameters);

        $bodyParams = [
            'oauth_verifier' => $verifier,
        ];

        $authorizationHeader = [
            'Authorization' => $this->buildAuthorizationHeaderForAPIRequest(
                $authParameters,
                $this->consumerSecret,
                $this->getAccessTokenEndpoint(),
                $token,
                $bodyParams
            ),
        ];
        $responseBody = $this->curlClient->retrieveResponse(
            $this->getAccessTokenEndpoint(),
            $bodyParams,
            $authorizationHeader
        );
        return $this->parseResponseBody($responseBody);
    }

    /**
     * Validate access token
     *
     * @param array $token
     * @param string $method
     * @return array
     */
    public function validateAccessToken(array $token, string $method = 'GET'): array
    {
        $authParameters = ['oauth_consumer_key' => $this->consumerKey];
        $authParameters = $this->getBasicAuthorizationParams($authParameters);

        //Need to add Accept header else Magento errors out with 503
        $extraAuthenticationHeaders = ['Accept' => 'application/json'];

        $authorizationHeader = [
            'Authorization' => $this->buildAuthorizationHeaderForAPIRequest(
                $authParameters,
                $this->consumerSecret,
                $this->getTestApiEndpoint(),
                $token,
                [],
                $method
            ),
        ];

        $headers = array_merge($authorizationHeader, $extraAuthenticationHeaders);

        $responseBody = $this->curlClient->retrieveResponse($this->getTestApiEndpoint(), [], $headers, $method);

        return json_decode($responseBody);
    }

    /**
     * Build header for api request
     *
     * @param array $params
     * @param string $consumerSecret
     * @param string $requestUrl
     * @param array $token
     * @param array|null $bodyParams
     * @param string $httpMethod
     * @param string $signatureMethod
     * @return string
     */
    public function buildAuthorizationHeaderForAPIRequest(
        array  $params,
        string $consumerSecret,
        string $requestUrl,
        array  $token,
        ?array $bodyParams = null,
        string $httpMethod = 'POST',
        string $signatureMethod = \Magento\Framework\Oauth\Oauth::SIGNATURE_SHA256
    ): string {

        if (isset($params['oauth_callback'])) {
            unset($params['oauth_callback']);
        }

        $params = array_merge($params, ['oauth_token' => $token['oauth_token']]);
        $params = array_merge($params, $bodyParams);

        $params['oauth_signature'] = $this->signature->getSignature(
            $params,
            $signatureMethod,
            $consumerSecret,
            $token['oauth_token_secret'],
            $httpMethod,
            $requestUrl
        );

        return $this->_httpUtility->toAuthorizationHeader($params);
    }

    /**
     * Request token endpoint.
     *
     * @return string
     * @throws \Exception
     */
    public function getRequestTokenEndpoint(): string
    {
        return $this->urlProvider->getRebuiltUrl(TESTS_BASE_URL . '/oauth/token/request');
    }

    /**
     * Access token endpoint
     *
     * @return string
     */
    public function getAccessTokenEndpoint(): string
    {
        return $this->urlProvider->getRebuiltUrl(TESTS_BASE_URL . '/oauth/token/access');
=======
class OauthClient extends AbstractService
{
    /**
     * The maximum timeout for http request in seconds
     */
    public const DEFAULT_TIMEOUT = 120;

    /** @var string|null */
    protected $_oauthVerifier = null;

    /**
     * @param Credentials $credentials
     * @param ClientInterface|null $httpClient
     * @param TokenStorageInterface|null $storage
     * @param SignatureInterface|null $signature
     * @param UriInterface|null $baseApiUri
     */
    public function __construct(
        Credentials $credentials,
        ClientInterface $httpClient = null,
        TokenStorageInterface $storage = null,
        SignatureInterface $signature = null,
        UriInterface $baseApiUri = null
    ) {
        if (!isset($httpClient)) {
            $httpClient = new \Magento\TestFramework\Authentication\Rest\CurlClient();
            $httpClient->setTimeout(self::DEFAULT_TIMEOUT);
        }
        if (!isset($storage)) {
            $storage = new \OAuth\Common\Storage\Memory();
        }
        if (!isset($signature)) {
            $signature = new \Magento\TestFramework\Authentication\Rest\OauthClient\Signature($credentials);
        }
        parent::__construct($credentials, $httpClient, $storage, $signature, $baseApiUri);
    }

    /**
     * @inheritDoc
     */
    public function getRequestTokenEndpoint()
    {
        return new Uri(TESTS_BASE_URL . '/oauth/token/request');
    }

    /**
     * @inheritDoc
     */
    public function getAuthorizationEndpoint()
    {
        throw new \OAuth\Common\Exception\Exception(
            'Magento REST API is 2-legged. Current operation is not available.'
        );
    }

    /**
     * Returns the access token API endpoint.
     *
     * @return UriInterface
     */
    public function getAccessTokenEndpoint()
    {
        return new Uri(TESTS_BASE_URL . '/oauth/token/access');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Returns the TestModule1 Rest API endpoint.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getTestApiEndpoint(): string
    {
        /** @phpstan-ignore-next-line */
        $defaultStoreCode = Bootstrap::getObjectManager()->get(\Magento\Store\Model\StoreManagerInterface::class)
            ->getStore()->getCode();
        return $this->urlProvider->getRebuiltUrl(TESTS_BASE_URL . '/rest/' . $defaultStoreCode . '/V1/testmodule1');
    }

    /**
     * Builds the bearer token authorization header
     *
     * @param string|null $token
     * @return array
     */
    public function buildBearerTokenAuthorizationHeader(?string $token): array
    {
        return [
            'Authorization: Bearer ' . $token
        ];
    }

    /**
     * Builds the oAuth authorization header for an authenticated API request
     *
     * @param string $url the uri the request is headed
     * @param string $token
     * @param string $tokenSecret used to verify the passed token
     * @param array $bodyParams
     * @param string $method HTTP method to use
     * @return array
     */
    public function buildOauthAuthorizationHeader(
        string $url,
        string $token,
        string $tokenSecret,
        array $bodyParams,
        string $method = 'GET'
    ): array {
        $params = ['oauth_consumer_key' => $this->consumerKey];
        $params = $this->getBasicAuthorizationParams($params);
        $tokenData = ['oauth_token'=> $token, 'oauth_token_secret'=> $tokenSecret];
        return [
            'Authorization: ' . $this->buildAuthorizationHeaderForAPIRequest(
                $params,
                $this->consumerSecret,
                $url,
                $tokenData,
                $bodyParams,
                $method
            )
        ];
=======
     * @return UriInterface
     */
    public function getTestApiEndpoint()
    {
        $defaultStoreCode = Bootstrap::getObjectManager()->get(\Magento\Store\Model\StoreManagerInterface::class)
            ->getStore()->getCode();
        return new Uri(TESTS_BASE_URL . '/rest/' . $defaultStoreCode . '/V1/testmodule1');
    }

    /**
     * Parses the access token response and returns a TokenInterface.
     *
     * @return TokenInterface
     * @param string $responseBody
     */
    protected function parseAccessTokenResponse($responseBody)
    {
        return $this->_parseToken($responseBody);
    }

    /**
     * Parses the request token response and returns a TokenInterface.
     *
     * @return TokenInterface
     * @param string $responseBody
     * @throws TokenResponseException
     */
    protected function parseRequestTokenResponse($responseBody)
    {
        $data = $this->_parseResponseBody($responseBody);
        if (isset($data['oauth_verifier'])) {
            $this->_oauthVerifier = $data['oauth_verifier'];
        }
        return $this->_parseToken($responseBody);
    }

    /**
     * Parse response body and create oAuth token object based on parameters provided.
     *
     * @param string $responseBody
     * @return StdOAuth1Token
     * @throws TokenResponseException
     */
    protected function _parseToken($responseBody)
    {
        $data = $this->_parseResponseBody($responseBody);
        $token = new StdOAuth1Token();
        $token->setRequestToken($data['oauth_token']);
        $token->setRequestTokenSecret($data['oauth_token_secret']);
        $token->setAccessToken($data['oauth_token']);
        $token->setAccessTokenSecret($data['oauth_token_secret']);
        $token->setEndOfLife(StdOAuth1Token::EOL_NEVER_EXPIRES);
        unset($data['oauth_token'], $data['oauth_token_secret']);
        $token->setExtraParams($data);
        return $token;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Parse response body and return data in array.
     *
     * @param string $responseBody
     * @return array
<<<<<<< HEAD
     * @throws \Exception
     */
    protected function parseResponseBody(string $responseBody): array
    {
        parse_str($responseBody, $data);
        if (!is_array($data)) {
            throw new Exception('Unable to parse response.');
        } elseif (isset($data['error'])) {
            throw new Exception("Error occurred: '{$data['error']}'");
        }
        return $data;
    }
=======
     * @throws \OAuth\Common\Http\Exception\TokenResponseException
     */
    protected function _parseResponseBody($responseBody)
    {
        if (!is_string($responseBody)) {
            throw new TokenResponseException("Response body is expected to be a string.");
        }
        parse_str($responseBody, $data);
        if (null === $data || !is_array($data)) {
            throw new TokenResponseException('Unable to parse response.');
        } elseif (isset($data['error'])) {
            throw new TokenResponseException("Error occurred: '{$data['error']}'");
        }
        return $data;
    }

    /**
     * Retrieve oAuth verifier that was obtained during request token request.
     *
     * @return string
     * @throws \OAuth\Common\Http\Exception\TokenResponseException
     */
    public function getOauthVerifier()
    {
        if (empty($this->_oauthVerifier)) {
            throw new TokenResponseException("oAuth verifier must be obtained during request token request.");
        }
        return $this->_oauthVerifier;
    }

    /**
     * Builds the authorization header for an authenticated API request.
     *
     * Fixing this method since parent implementation from lib not sending the oauth_verifier
     * when requesting access token.
     *
     * @param string $method
     * @param UriInterface $uri the uri the request is headed
     * @param \OAuth\OAuth1\Token\TokenInterface $token
     * @param array|null $bodyParams
     * @return string
     */
    protected function buildAuthorizationHeaderForAPIRequest(
        $method,
        UriInterface $uri,
        TokenInterface $token,
        $bodyParams = null
    ) {
        $this->signature->setTokenSecret($token->getAccessTokenSecret());
        $parameters = $this->getBasicAuthorizationHeaderInfo();
        if (isset($parameters['oauth_callback'])) {
            unset($parameters['oauth_callback']);
        }

        $parameters = array_merge($parameters, ['oauth_token' => $token->getAccessToken()]);
        $parameters = array_merge($parameters, $bodyParams);
        $parameters['oauth_signature'] = $this->signature->getSignature($uri, $parameters, $method);

        $authorizationHeader = 'OAuth ';
        $delimiter = '';

        foreach ($parameters as $key => $value) {
            $authorizationHeader .= $delimiter . rawurlencode($key) . '="' . rawurlencode($value) . '"';
            $delimiter = ', ';
        }

        return $authorizationHeader;
    }

    /**
     * Builds the oAuth authorization header for an authenticated API request
     *
     * @param UriInterface $uri the uri the request is headed
     * @param \OAuth\OAuth1\Token\TokenInterface $token
     * @param string $tokenSecret used to verify the passed token
     * @param array $bodyParams
     * @param string $method HTTP method to use
     * @return array
     */
    public function buildOauthAuthorizationHeader($uri, $token, $tokenSecret, $bodyParams, $method = 'GET')
    {
        $uri = new Uri($uri);
        $tokenObj = new StdOAuth1Token();
        $tokenObj->setAccessToken($token);
        $tokenObj->setAccessTokenSecret($tokenSecret);
        $tokenObj->setEndOfLife(StdOAuth1Token::EOL_NEVER_EXPIRES);
        return [
            'Authorization: ' . $this->buildAuthorizationHeaderForAPIRequest($method, $uri, $tokenObj, $bodyParams)
        ];
    }

    /**
     * Builds the bearer token authorization header
     *
     * @param string $token
     * @return array
     */
    public function buildBearerTokenAuthorizationHeader($token)
    {
        return [
            'Authorization: Bearer ' . $token
        ];
    }

    /**
     * Validates a Test REST api call access using oauth access token
     *
     * @param TokenInterface $token The access token.
     * @param string $method HTTP method.
     * @return array
     * @throws TokenResponseException
     */
    public function validateAccessToken($token, $method = 'GET')
    {
        //Need to add Accept header else Magento errors out with 503
        $extraAuthenticationHeaders = ['Accept' => 'application/json'];

        $this->signature->setTokenSecret($token->getAccessTokenSecret());

        $authorizationHeader = [
            'Authorization' => $this->buildAuthorizationHeaderForAPIRequest(
                $method,
                $this->getTestApiEndpoint(),
                $token,
                []
            ),
        ];

        $headers = array_merge($authorizationHeader, $extraAuthenticationHeaders);

        $responseBody = $this->httpClient->retrieveResponse($this->getTestApiEndpoint(), [], $headers, $method);

        return json_decode($responseBody);
    }

    /**
     * @inheritDoc
     */
    protected function getSignatureMethod()
    {
        return 'HMAC-SHA256';
    }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
