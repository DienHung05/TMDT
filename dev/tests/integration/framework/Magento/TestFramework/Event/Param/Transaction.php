<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Parameter holder for transaction events
 */
namespace Magento\TestFramework\Event\Param;

class Transaction
{
    /**
     * @var bool
     */
    protected $_isStartRequested;

    /**
     * @var bool
     */
    protected $_isRollbackRequested;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_isStartRequested = false;
        $this->_isRollbackRequested = false;
    }

    /**
     * Request to start transaction
     */
    public function requestTransactionStart()
    {
        $this->_isStartRequested = true;
    }

    /**
     * Request to rollback transaction
     */
    public function requestTransactionRollback()
    {
        $this->_isRollbackRequested = true;
    }

    /**
     * Whether transaction start has been requested or not
     *
     * @return bool
     */
    public function isTransactionStartRequested()
    {
        return $this->_isStartRequested;
    }

    /**
     * Whether transaction rollback has been requested or not
     *
     * @return bool
     */
    public function isTransactionRollbackRequested()
    {
        return $this->_isRollbackRequested;
    }
}
