<?php
/**
<<<<<<< HEAD
 * Copyright 2011 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

require_once __DIR__ . '/../../../../app/autoload.php';

if (!defined('TESTS_TEMP_DIR')) {
    define('TESTS_TEMP_DIR', dirname(__DIR__) . '/tmp');
}

<<<<<<< HEAD
=======
// PHP 8 compatibility. Define constants that are not present in PHP < 8.0
if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 80000) {
    if (!defined('T_NAME_QUALIFIED')) {
        define('T_NAME_QUALIFIED', 24001);
    }
    if (!defined('T_NAME_FULLY_QUALIFIED')) {
        define('T_NAME_FULLY_QUALIFIED', 24002);
    }
}

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
require_once __DIR__ . '/autoload.php';

setCustomErrorHandler();

\Magento\Framework\Phrase::setRenderer(new \Magento\Framework\Phrase\Renderer\Placeholder());

error_reporting(E_ALL);
ini_set('display_errors', 1);

<<<<<<< HEAD
if (extension_loaded('xdebug')) {
    ini_set('xdebug.max_nesting_level', '200');
}

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/*  For data consistency between displaying (printing) and serialization a float number */
ini_set('precision', 14);
ini_set('serialize_precision', 14);

/**
<<<<<<< HEAD
 * PHPUnit error handler (set_error_handler callback; named for PHPMD).
 *
 * @param int $errNo
 * @param string $errStr
 * @param string $errFile
 * @param int $errLine
 * @return bool
 */
function magentoUnitTestsPhpErrorHandler(int $errNo, string $errStr, string $errFile, int $errLine): bool
{
    $errLevel = error_reporting();
    if (($errLevel & $errNo) !== 0) {
        $errorNames = [
            E_ERROR => 'Error',
            E_WARNING => 'Warning',
            E_PARSE => 'Parse',
            E_NOTICE => 'Notice',
            E_CORE_ERROR => 'Core Error',
            E_CORE_WARNING => 'Core Warning',
            E_COMPILE_ERROR => 'Compile Error',
            E_COMPILE_WARNING => 'Compile Warning',
            E_USER_ERROR => 'User Error',
            E_USER_WARNING => 'User Warning',
            E_USER_NOTICE => 'User Notice',
            E_RECOVERABLE_ERROR => 'Recoverable Error',
            E_DEPRECATED => 'Deprecated',
            E_USER_DEPRECATED => 'User Deprecated',
        ];

        $errName = $errorNames[$errNo] ?? '';

        throw new \PHPUnit\Framework\Exception(
            sprintf('%s: %s in %s:%s.', $errName, $errStr, $errFile, $errLine),
            $errNo
        );
    }

    return false;
}

/**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 * Set custom error handler
 */
function setCustomErrorHandler()
{
<<<<<<< HEAD
    set_error_handler('magentoUnitTestsPhpErrorHandler');
=======
    set_error_handler(
        function ($errNo, $errStr, $errFile, $errLine) {
            $errLevel = error_reporting();
            if (($errLevel & $errNo) !== 0) {
                $errorNames = [
                    E_ERROR => 'Error',
                    E_WARNING => 'Warning',
                    E_PARSE => 'Parse',
                    E_NOTICE => 'Notice',
                    E_CORE_ERROR => 'Core Error',
                    E_CORE_WARNING => 'Core Warning',
                    E_COMPILE_ERROR => 'Compile Error',
                    E_COMPILE_WARNING => 'Compile Warning',
                    E_USER_ERROR => 'User Error',
                    E_USER_WARNING => 'User Warning',
                    E_USER_NOTICE => 'User Notice',
                    E_STRICT => 'Strict',
                    E_RECOVERABLE_ERROR => 'Recoverable Error',
                    E_DEPRECATED => 'Deprecated',
                    E_USER_DEPRECATED => 'User Deprecated',
                ];

                $errName = isset($errorNames[$errNo]) ? $errorNames[$errNo] : "";

                throw new \PHPUnit\Framework\Exception(
                    sprintf("%s: %s in %s:%s.", $errName, $errStr, $errFile, $errLine),
                    $errNo
                );
            }
        }
    );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
