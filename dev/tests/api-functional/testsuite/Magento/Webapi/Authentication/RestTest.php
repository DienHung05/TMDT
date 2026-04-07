<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Webapi\Authentication;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Authentication\Rest\OauthClient;

=======
 * Test authentication mechanisms in REST.
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Webapi\Authentication;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @magentoApiDataFixture consumerFixture
 */
class RestTest extends \Magento\TestFramework\TestCase\WebapiAbstract
{
<<<<<<< HEAD
=======
    /** @var \Magento\TestFramework\Authentication\Rest\OauthClient[] */
    protected $_oAuthClients = [];

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /** @var \Magento\Integration\Model\Oauth\Consumer */
    protected static $_consumer;

    /** @var \Magento\Integration\Model\Oauth\Token */
    protected static $_token;

    /** @var string */
    protected static $_consumerKey;

    /** @var string */
    protected static $_consumerSecret;

    /** @var string */
    protected static $_verifier;

<<<<<<< HEAD
    /** @var \Magento\TestFramework\Authentication\Rest\OauthClient */
    private $_oauthClient;

    protected function setUp(): void
    {
        $this->_markTestAsRestOnly();
        $objectManager = Bootstrap::getObjectManager();
        $this->_oauthClient = $objectManager->create(OauthClient::class);
=======
    protected function setUp(): void
    {
        $this->_markTestAsRestOnly();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        parent::setUp();
    }

    /**
     * Create a consumer
     */
    public static function consumerFixture($date = null)
    {
        /** Clear the credentials because during the fixture generation, any previous credentials are invalidated */
        \Magento\TestFramework\Authentication\OauthHelper::clearApiAccessCredentials();

        $consumerCredentials = \Magento\TestFramework\Authentication\OauthHelper::getConsumerCredentials($date);
        self::$_consumerKey = $consumerCredentials['key'];
        self::$_consumerSecret = $consumerCredentials['secret'];
        self::$_verifier = $consumerCredentials['verifier'];
        self::$_consumer = $consumerCredentials['consumer'];
        self::$_token = $consumerCredentials['token'];
    }

    protected function tearDown(): void
    {
        parent::tearDown();
<<<<<<< HEAD
        $this->_oauthClient = null;
=======
        $this->_oAuthClients = [];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        if (isset(self::$_consumer)) {
            self::$_consumer->delete();
            self::$_token->delete();
        }
    }

    public function testGetRequestToken()
    {
<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oauthClient->getRequestToken();

        $this->assertNotEmpty($requestToken["oauth_token"], "Request token value is not set");
        $this->assertNotEmpty($requestToken["oauth_token_secret"], "Request token secret is not set");

        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN,
            strlen($requestToken["oauth_token"]),
=======
        /** @var $oAuthClient \Magento\TestFramework\Authentication\Rest\OauthClient */
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oAuthClient->requestRequestToken();

        $this->assertNotEmpty($requestToken->getRequestToken(), "Request token value is not set");
        $this->assertNotEmpty($requestToken->getRequestTokenSecret(), "Request token secret is not set");

        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN,
            strlen($requestToken->getRequestToken()),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            "Request token value length should be " . \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN
        );
        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN_SECRET,
<<<<<<< HEAD
            strlen($requestToken["oauth_token_secret"]),
=======
            strlen($requestToken->getRequestTokenSecret()),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            "Request token secret length should be " . \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN_SECRET
        );
    }

    /**
     */
    public function testGetRequestTokenExpiredConsumer()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('401 Unauthorized');

        $this::consumerFixture('2012-01-01 00:00:00');
        $this::$_consumer->setUpdatedAt('2012-01-01 00:00:00');
        $this::$_consumer->save();
<<<<<<< HEAD

        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $oauthClient->getRequestToken();
=======
        /** @var $oAuthClient \Magento\TestFramework\Authentication\Rest\OauthClient */
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $oAuthClient->requestRequestToken();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     */
    public function testGetRequestTokenInvalidConsumerKey()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('401 Unauthorized');

<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create('invalid_key', self::$_consumerSecret);
        $oauthClient->getRequestToken();
=======
        $oAuthClient = $this->_getOauthClient('invalid_key', self::$_consumerSecret);
        $oAuthClient->requestRequestToken();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     */
    public function testGetRequestTokenInvalidConsumerSecret()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('401 Unauthorized');

<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, 'invalid_secret');
        $oauthClient->getRequestToken();
=======
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, 'invalid_secret');
        $oAuthClient->requestRequestToken();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testGetAccessToken()
    {
<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oauthClient->getRequestToken();
        $accessToken = $oauthClient->getAccessToken($requestToken, self::$_verifier);

        $this->assertNotEmpty($accessToken["oauth_token"], "Access token value is not set.");
        $this->assertNotEmpty($accessToken["oauth_token_secret"], "Access token secret is not set.");

        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN,
            strlen($accessToken["oauth_token"]),
=======
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oAuthClient->requestRequestToken();
        $accessToken = $oAuthClient->requestAccessToken(
            $requestToken->getRequestToken(),
            self::$_verifier,
            $requestToken->getRequestTokenSecret()
        );
        $this->assertNotEmpty($accessToken->getAccessToken(), "Access token value is not set.");
        $this->assertNotEmpty($accessToken->getAccessTokenSecret(), "Access token secret is not set.");

        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN,
            strlen($accessToken->getAccessToken()),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            "Access token value length should be " . \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN
        );
        $this->assertEquals(
            \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN_SECRET,
<<<<<<< HEAD
            strlen($accessToken["oauth_token_secret"]),
=======
            strlen($accessToken->getAccessTokenSecret()),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            "Access token secret length should be " . \Magento\Framework\Oauth\Helper\Oauth::LENGTH_TOKEN_SECRET
        );
    }

    /**
     */
    public function testGetAccessTokenInvalidVerifier()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('401 Unauthorized');

<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oauthClient->getRequestToken();
        $oauthClient->getAccessToken($requestToken, 'invalid verifier');
=======
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oAuthClient->requestRequestToken();
        $oAuthClient->requestAccessToken(
            $requestToken->getRequestToken(),
            'invalid verifier',
            $requestToken->getRequestTokenSecret()
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     */
    public function testGetAccessTokenConsumerMismatch()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('401 Unauthorized');

<<<<<<< HEAD
        $oauthClientA = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $requestTokenA = $oauthClientA->getRequestToken();
        $oauthVerifierA = self::$_verifier;

        self::consumerFixture();
        $oauthClientB = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $oauthClientB->getRequestToken();
        $oauthClientB->getAccessToken($requestTokenA, $oauthVerifierA);
=======
        $oAuthClientA = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $requestTokenA = $oAuthClientA->requestRequestToken();
        $oauthVerifierA = self::$_verifier;

        self::consumerFixture();
        $oAuthClientB = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $oAuthClientB->requestRequestToken();

        $oAuthClientB->requestAccessToken(
            $requestTokenA->getRequestToken(),
            $oauthVerifierA,
            $requestTokenA->getRequestTokenSecret()
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     */
    public function testAccessApiInvalidAccessToken()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('400 Bad Request');

<<<<<<< HEAD
        $oauthClient = $this->_oauthClient->create(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oauthClient->getRequestToken();
        $accessToken = $oauthClient->getAccessToken(
            $requestToken,
            self::$_verifier
        );

        $accessToken['oauth_token'] = 'invalid';
        $oauthClient->validateAccessToken($accessToken);
=======
        $oAuthClient = $this->_getOauthClient(self::$_consumerKey, self::$_consumerSecret);
        $requestToken = $oAuthClient->requestRequestToken();
        $accessToken = $oAuthClient->requestAccessToken(
            $requestToken->getRequestToken(),
            self::$_verifier,
            $requestToken->getRequestTokenSecret()
        );
        $accessToken->setAccessToken('invalid');
        $oAuthClient->validateAccessToken($accessToken);
    }

    protected function _getOauthClient($consumerKey, $consumerSecret)
    {
        if (!isset($this->_oAuthClients[$consumerKey])) {
            $credentials = new \OAuth\Common\Consumer\Credentials($consumerKey, $consumerSecret, TESTS_BASE_URL);
            $this->_oAuthClients[$consumerKey] = new \Magento\TestFramework\Authentication\Rest\OauthClient(
                $credentials
            );
        }
        return $this->_oAuthClients[$consumerKey];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
