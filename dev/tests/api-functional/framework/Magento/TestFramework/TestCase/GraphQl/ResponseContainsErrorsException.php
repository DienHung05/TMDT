<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\TestCase\GraphQl;

/**
<<<<<<< HEAD
 * Exception thrown when GraphQL response contains errors.
=======
 * Response contains errors exception
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class ResponseContainsErrorsException extends \Exception
{
    /**
     * @var array
     */
    private $responseData;

    /**
<<<<<<< HEAD
     * @var array
     */
    private $responseHeaders;

    /**
     * @var array
     */
    private $responseCookies;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $message
     * @param array $responseData
     * @param \Exception|null $cause
     * @param int $code
<<<<<<< HEAD
     * @param array $responseHeaders
     * @param array $responseCookies
     */
    public function __construct(
        string $message,
        array $responseData,
        ?\Exception $cause = null,
        int $code = 0,
        array $responseHeaders = [],
        array $responseCookies = []
    ) {
        parent::__construct($message, $code, $cause);
        $this->responseData = $responseData;
        $this->responseHeaders = $responseHeaders;
        $this->responseCookies = $responseCookies;
=======
     */
    public function __construct(string $message, array $responseData, \Exception $cause = null, int $code = 0)
    {
        parent::__construct($message, $code, $cause);
        $this->responseData = $responseData;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Get response data
     *
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }
<<<<<<< HEAD

    /**
     * Get response headers
     *
     * @return array
     */
    public function getResponseHeaders(): array
    {
        return $this->responseHeaders;
    }

    /**
     * Get response cookies
     *
     * @return array
     */
    public function getResponseCookies(): array
    {
        return $this->responseCookies;
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
