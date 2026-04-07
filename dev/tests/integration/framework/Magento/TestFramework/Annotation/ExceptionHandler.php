<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Annotation;

<<<<<<< HEAD
use PHPUnit\Event\Code\ThrowableBuilder;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;
=======
use PHPUnit\Framework\Exception;
use ReflectionClass;
use ReflectionException;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ExceptionHandler
{
    /**
<<<<<<< HEAD
     * Throws \PHPUnit\Framework\Exception and fail the test if provided.
     *
     * @param string $message
     * @param \Throwable|null $previous
     * @param TestCase|null $test
     * @return never
     * @throws Exception
     */
    public static function handle(
        string $message,
        ?\Throwable $previous = null,
        ?TestCase $test = null
    ): never {
        if (!$test) {
            throw new Exception($message, 0, $previous);
        }

        if ($previous) {
            $throwable = ThrowableBuilder::from($previous);
            $message .= PHP_EOL . 'Caused by' . PHP_EOL . $throwable->asString();
        }
        $test::fail($message);
=======
     * Format exception message and throws PHPUnit\Framework\Exception
     *
     * @param string $message
     * @param string $testClass
     * @param string|null $testMethod
     * @param \Throwable|null $previous
     * @return void
     */
    public static function handle(
        string $message,
        string $testClass,
        string $testMethod = null,
        \Throwable $previous = null
    ): void {
        try {
            $reflected = new ReflectionClass($testClass);
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        $name = $testMethod;

        if ($name && $reflected->hasMethod($name)) {
            try {
                $reflected = $reflected->getMethod($name);
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }
        }

        $location = sprintf(
            "%s(%d): %s->%s()",
            $reflected->getFileName(),
            $reflected->getStartLine(),
            $testClass,
            $testMethod
        );

        $summary = '';
        if ($previous) {
            $exception = $previous;
            do {
                $summary .= PHP_EOL
                    . PHP_EOL
                    . 'Caused By: '
                    . $exception->getMessage()
                    . PHP_EOL
                    . $exception->getTraceAsString();
            } while ($exception = $exception->getPrevious());
        }
        throw new Exception(
            sprintf(
                "%s\n#0 %s%s",
                $message,
                $location,
                $summary
            ),
            0,
            $previous
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
