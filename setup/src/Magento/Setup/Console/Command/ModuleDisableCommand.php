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
namespace Magento\Setup\Console\Command;

/**
 * Command for disabling list or all of modules
 */
class ModuleDisableCommand extends AbstractModuleManageCommand
{
<<<<<<< HEAD
    public const NAME = 'module:disable';

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName(self::NAME)
=======
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('module:disable')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Disables specified modules');
        parent::configure();
    }

    /**
     * Disable modules
     *
     * @return bool
     */
    protected function isEnable()
    {
        return false;
    }
}
