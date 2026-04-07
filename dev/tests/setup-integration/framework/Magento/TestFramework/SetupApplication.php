<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework;

/**
 * Encapsulates application installation, initialization and uninstall, add flag to skip database dump.
 *
 * Allow installation and uninstallation.
 */
class SetupApplication extends Application
{
    /**
     * {@inheritdoc}
     */
    protected $dumpDb = false;

    /**
     * @var bool
     */
    protected $canLoadArea = false;

    /**
     * @var bool
     */
    protected $canInstallSequence = false;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        throw new \Exception("Can't start application.");
    }
}
