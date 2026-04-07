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

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use \Magento\Backend\Setup\ConfigOptionsList as BackendConfigOptionsList;

class InfoAdminUriCommand extends Command
{
<<<<<<< HEAD
    public const NAME = 'info:adminuri';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var \Magento\Framework\App\DeploymentConfig
     */
    private $deploymentConfig;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\DeploymentConfig $deploymentConfig
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(\Magento\Framework\App\DeploymentConfig $deploymentConfig)
    {
        $this->deploymentConfig = $deploymentConfig;
        parent::__construct();
    }

    /**
     * Initialization of the command
     *
     * @return void
     */
    protected function configure()
    {
<<<<<<< HEAD
        $this->setName(self::NAME)
=======
        $this->setName('info:adminuri')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Displays the Magento Admin URI');
        parent::configure();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
=======
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $output->writeln(
            "\nAdmin URI: /"
            . $this->deploymentConfig->get(BackendConfigOptionsList::CONFIG_PATH_BACKEND_FRONTNAME)
            . "\n"
        );
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
