<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Annotation;

use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionMethod;
=======
use PHPUnit\Util\Test as TestUtil;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Returns annotations for given testcase.
 */
class TestCaseAnnotation
{
    /**
     * @var TestCaseAnnotation
     */
    private static $instance;

    /**
     * Get instance of test case annotation access service.
     *
     * @return TestCaseAnnotation
     */
    public static function getInstance(): TestCaseAnnotation
    {
        return self::$instance ?? self::$instance = new TestCaseAnnotation();
    }

    /**
     * Get annotations for the given test case.
     *
     * @param TestCase $testCase
     *
     * @return array
     */
    public function getAnnotations(TestCase $testCase): array
    {
<<<<<<< HEAD
        $className = get_class($testCase);
        $methodName = $testCase->name();

        return [
            'method' => $methodName ? $this->parseDocComment($className, $methodName) : [],
            'class'  => $this->parseDocComment($className),
        ];
    }

    /**
     * Parse docblock annotations for a class or method.
     *
     * @param string $className
     * @param string|null $methodName
     * @return array
     */
    private function parseDocComment(string $className, ?string $methodName = null): array
    {
        try {
            if ($methodName) {
                $reflection = new ReflectionMethod($className, $methodName);
            } else {
                $reflection = new ReflectionClass($className);
            }

            $docComment = $reflection->getDocComment();
            if (!$docComment) {
                return [];
            }

            return $this->parseAnnotations($docComment);
        } catch (\ReflectionException $e) {
            return [];
        }
    }

    /**
     * Parse annotations from a docblock comment.
     *
     * @param string $docComment
     * @return array
     */
    private function parseAnnotations(string $docComment): array
    {
        $annotations = [];
        $lines = explode("\n", $docComment);

        foreach ($lines as $line) {
            $line = ltrim($line, " \t*");
            if (preg_match('/@([a-zA-Z_][a-zA-Z0-9_]*)(?:\s+(.*))?$/', $line, $match)) {
                $annotationName = $match[1];
                $annotationValue = isset($match[2]) ? trim($match[2]) : '';

                if (!isset($annotations[$annotationName])) {
                    $annotations[$annotationName] = [];
                }

                $annotations[$annotationName][] = $annotationValue;
            }
        }

        return $annotations;
=======
        return TestUtil::parseTestMethodAnnotations(
            get_class($testCase),
            $testCase->getName(false)
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
