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
 * Isolation of the current working directory changes between tests
 */
namespace Magento\TestFramework\Isolation;

class WorkingDirectory
{
    /**
     * @var string
     */
    private $_currentWorkingDir;

    /**
     * Handler for 'endTest' event
     *
     * @param \PHPUnit\Framework\TestCase $test
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function startTest(\PHPUnit\Framework\TestCase $test)
    {
        $this->_currentWorkingDir = getcwd();
    }

    /**
     * Handler for 'startTest' event
     *
     * @param \PHPUnit\Framework\TestCase $test
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function endTest(\PHPUnit\Framework\TestCase $test)
    {
<<<<<<< HEAD
        // PHP 8.5 Compatibility: Check for null before passing to chdir()
        if ($this->_currentWorkingDir !== null && getcwd() != $this->_currentWorkingDir) {
=======
        if (getcwd() != $this->_currentWorkingDir) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            chdir($this->_currentWorkingDir);
        }
    }
}
