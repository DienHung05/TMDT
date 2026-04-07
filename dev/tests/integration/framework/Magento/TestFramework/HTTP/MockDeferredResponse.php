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

namespace Magento\TestFramework\HTTP;

use Magento\Framework\Async\CancelingDeferredException;
use Magento\Framework\HTTP\AsyncClient\HttpResponseDeferredInterface;
use Magento\Framework\HTTP\AsyncClient\Response;

/**
 * Mock for HTTP responses.
 */
class MockDeferredResponse implements HttpResponseDeferredInterface
{
    /**
     * @var Response
     */
    private $response;

    /**
     * MockDeferredResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @inheritDoc
     */
    public function cancel(bool $force = false): void
    {
        throw new CancelingDeferredException('Cannot be canceled');
    }

    /**
     * @inheritDoc
     */
    public function isCancelled(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function isDone(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function get(): Response
    {
        return $this->response;
    }
}
