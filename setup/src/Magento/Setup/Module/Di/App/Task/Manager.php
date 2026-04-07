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
namespace Magento\Setup\Module\Di\App\Task;

class Manager
{
    /**
     * @var OperationFactory
     */
    private $operationFactory;

    /**
     * @var OperationInterface[]
     */
    private $operationsList = [];

    /**
     * @param OperationFactory $operationFactory
     */
    public function __construct(
        OperationFactory $operationFactory
    ) {
        $this->operationFactory = $operationFactory;
    }

    /**
     * Adds operations to task
     *
     * @param string $operationCode
     * @param mixed $arguments
     * @return void
     */
    public function addOperation($operationCode, $arguments = null)
    {
        $this->operationsList[] = $this->operationFactory->create($operationCode, $arguments);
    }

    /**
     * Processes list of operations
     *
     * @param callable $beforeCallback
     * @param callable $afterCallback
     * @return void
     */
<<<<<<< HEAD
    public function process(?\Closure $beforeCallback = null, ?\Closure $afterCallback = null)
=======
    public function process(\Closure $beforeCallback = null, \Closure $afterCallback = null)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        /** @var OperationInterface $operation */
        foreach ($this->operationsList as $operation) {
            if (is_callable($beforeCallback)) {
                $beforeCallback($operation);
            }

            $operation->doOperation();

            if (is_callable($afterCallback)) {
                $afterCallback($operation);
            }
        }
        $this->operationsList = [];
    }
}
