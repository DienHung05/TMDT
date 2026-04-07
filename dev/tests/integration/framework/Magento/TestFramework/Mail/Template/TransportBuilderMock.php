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

namespace Magento\TestFramework\Mail\Template;

/**
<<<<<<< HEAD
 * Mock of mail transport builder
=======
 * Class TransportBuilderMock
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class TransportBuilderMock extends \Magento\Framework\Mail\Template\TransportBuilder
{
    /**
     * @var \Magento\Framework\Mail\Message
     */
    protected $_sentMessage;

    /**
<<<<<<< HEAD
     * @var callable
     */
    private $onMessageSentCallback;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * Reset object state
     *
     * @return $this
     */
    protected function reset()
    {
        $this->_sentMessage = $this->message;
<<<<<<< HEAD
        return parent::reset();
=======
        parent::reset();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Return message object with prepared data
     *
     * @return \Magento\Framework\Mail\Message|null
     */
    public function getSentMessage()
    {
        return $this->_sentMessage;
    }

    /**
     * Return transport mock.
     *
     * @return \Magento\TestFramework\Mail\TransportInterfaceMock
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getTransport()
    {
        $this->prepareMessage();
        $this->reset();
<<<<<<< HEAD
        return $this->objectManager->create(
            \Magento\TestFramework\Mail\TransportInterfaceMock::class,
            [
                'message' => $this->message,
                'onMessageSentCallback' => $this->onMessageSentCallback
            ]
        );
    }

    /**
     * Set callback to be called when message is sent.
     *
     * @param callable $callback
     */
    public function setOnMessageSentCallback(callable $callback): void
    {
        $this->onMessageSentCallback = $callback;
    }

    /**
     * Clean previous test data.
     */
    public function clean(): void
    {
        $this->_sentMessage = null;
        $this->onMessageSentCallback = null;
=======
        return new \Magento\TestFramework\Mail\TransportInterfaceMock($this->message);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
