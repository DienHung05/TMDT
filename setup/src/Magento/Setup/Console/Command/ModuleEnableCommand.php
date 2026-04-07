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
 * Command for enabling list or all of modules
 */
class ModuleEnableCommand extends AbstractModuleManageCommand
{
<<<<<<< HEAD
    public const NAME = 'module:enable';

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
        $this->setName('module:enable')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Enables specified modules');
        parent::configure();
    }

    /**
     * Enable modules
     *
     * @return bool
     */
    protected function isEnable()
    {
        return true;
    }
}
