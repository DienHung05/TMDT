<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\Mail;

use Magento\Framework\Mail\EmailMessageInterface;

/**
<<<<<<< HEAD
 * Mock of mail transport interface
=======
 * Class TransportInterfaceMock
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class TransportInterfaceMock implements \Magento\Framework\Mail\TransportInterface
{
    /**
     * @var null|EmailMessageInterface
     */
    private $message;

    /**
<<<<<<< HEAD
     * @var null|callable
     */
    private $onMessageSentCallback;

    /**
     * TransportInterfaceMock constructor.
     *
     * @param null|EmailMessageInterface $message
     * @param null|callable $onMessageSentCallback
     */
    public function __construct(
        $message = null,
        ?callable $onMessageSentCallback = null
    ) {
        $this->message = $message;
        $this->onMessageSentCallback = $onMessageSentCallback;
=======
     * TransportInterfaceMock constructor.
     *
     * @param null|EmailMessageInterface $message
     */
    public function __construct($message = null)
    {
        $this->message = $message;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Mock of send a mail using transport
     *
     * @return void
     */
    public function sendMessage()
    {
<<<<<<< HEAD
        $this->onMessageSentCallback && call_user_func($this->onMessageSentCallback, $this->message);
=======
        //phpcs:ignore Squiz.PHP.NonExecutableCode.ReturnNotRequired
        return;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Get message
     *
     * @return null|EmailMessageInterface
     */
    public function getMessage()
    {
        return $this->message;
    }
}
