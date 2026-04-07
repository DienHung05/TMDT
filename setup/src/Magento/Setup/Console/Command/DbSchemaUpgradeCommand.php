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

use Magento\Framework\App\DeploymentConfig;
use Magento\Setup\Model\InstallerFactory;
use Magento\Framework\Setup\ConsoleLogger;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for install and update of DB schema.
 */
class DbSchemaUpgradeCommand extends AbstractSetupCommand
{
<<<<<<< HEAD
    public const NAME = 'setup:db-schema:upgrade';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * Factory to create installer.
     *
     * @var InstallerFactory
     */
    private $installFactory;

    /**
     * Deployment configuration.
     *
     * @var DeploymentConfig
     */
    private $deploymentConfig;

    /**
     * Inject dependencies.
     *
     * @param InstallerFactory $installFactory
     * @param DeploymentConfig $deploymentConfig
     */
    public function __construct(InstallerFactory $installFactory, DeploymentConfig $deploymentConfig)
    {
        $this->installFactory = $installFactory;
        $this->deploymentConfig = $deploymentConfig;
        parent::__construct();
    }

    /**
     * Initialization of the command.
     *
     * @return void
     */
    protected function configure()
    {
        $this
<<<<<<< HEAD
            ->setName(self::NAME)
=======
            ->setName('setup:db-schema:upgrade')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDefinition(
                [
                    new InputOption(
                        InstallCommand::CONVERT_OLD_SCRIPTS_KEY,
                        null,
                        InputOption::VALUE_OPTIONAL,
                        'Allows to convert old scripts (InstallSchema, UpgradeSchema) to db_schema.xml format',
                        false
                    )
                ]
            )
            ->setDescription('Installs and upgrades the DB schema');
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
        if (!$this->deploymentConfig->isAvailable()) {
            $output->writeln("<info>No information is available: the Magento application is not installed.</info>");
            // we must have an exit code higher than zero to indicate something was wrong
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
        $installer = $this->installFactory->create(new ConsoleLogger($output));
        $installer->installSchema($input->getOptions());
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
