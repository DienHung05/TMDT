<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework;

use Magento\TestFramework\Workaround\Override\Config;
use Magento\TestFramework\Workaround\Override\WrapperGenerator;
<<<<<<< HEAD
=======
use PHPUnit\Runner\StandardTestSuiteLoader;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Runner\TestSuiteLoader;

/**
 * Custom suite loader for adding wrapper for tests.
 */
<<<<<<< HEAD
class SuiteLoader
{
    /**
     * @var TestSuiteLoader
=======
class SuiteLoader implements TestSuiteLoader
{
    /**
     * @var StandardTestSuiteLoader
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    private $suiteLoader;

    /**
     * @var WrapperGenerator
     */
    private $generator;

    /**
     * @var Config
     */
    private $testsConfig;

    /**
     * SuiteLoader constructor.
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->suiteLoader = new TestSuiteLoader();
=======
        $this->suiteLoader = new StandardTestSuiteLoader();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->generator = new WrapperGenerator();
        $this->testsConfig = Config::getInstance();
    }

    /**
     * @inheritdoc
     */
    public function load(string $suiteClassFile): \ReflectionClass
    {
        $resultClass = $this->suiteLoader->load($suiteClassFile);

        if ($this->testsConfig->hasSkippedTest($resultClass->getName())
            && !in_array(SkippableInterface::class, $resultClass->getInterfaceNames(), true)
        ) {
            $resultClass = new \ReflectionClass($this->generator->generateTestWrapper($resultClass));
        }

        return $resultClass;
    }

    /**
     * @inheritdoc
     */
    public function reload(\ReflectionClass $aClass): \ReflectionClass
    {
        return $aClass;
    }
}
