<?php
<<<<<<< HEAD

/**
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */

=======
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
namespace Magento\Setup\Console\Command;

use Magento\Deploy\Console\Command\App\ConfigImportCommand;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\State as AppState;
<<<<<<< HEAD
use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\RuntimeException;
use Magento\Framework\Setup\ConsoleLogger;
use Magento\Framework\Setup\Declaration\Schema\DryRunLogger;
use Magento\Framework\Setup\Declaration\Schema\OperationsExecutor;
use Magento\Setup\Model\DbInitStatementsCleanup;
=======
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\RuntimeException;
use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Setup\ConsoleLogger;
use Magento\Framework\Setup\Declaration\Schema\DryRunLogger;
use Magento\Framework\Setup\Declaration\Schema\OperationsExecutor;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Setup\Model\InstallerFactory;
use Magento\Setup\Model\SearchConfigFactory;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for updating installed application after the code base has changed.
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class UpgradeCommand extends AbstractSetupCommand
{
    /**
     * Option to skip deletion of generated/code directory.
     */
<<<<<<< HEAD
    public const INPUT_KEY_KEEP_GENERATED = 'keep-generated';

    public const NAME = 'setup:upgrade';
=======
    const INPUT_KEY_KEEP_GENERATED = 'keep-generated';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Installer service factory.
     *
     * @var InstallerFactory
     */
    private $installerFactory;

    /**
     * @var DeploymentConfig
     */
    private $deploymentConfig;

    /**
     * @var AppState
     */
    private $appState;

    /**
     * @var SearchConfigFactory
     */
    private $searchConfigFactory;

<<<<<<< HEAD
    /**
=======
    /*
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var CacheInterface
     */
    private $cache;

    /**
<<<<<<< HEAD
     * @var DbInitStatementsCleanup
     */
    private $dbInitStatementsCleanup;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param InstallerFactory $installerFactory
     * @param SearchConfigFactory $searchConfigFactory
     * @param DeploymentConfig $deploymentConfig
     * @param AppState|null $appState
     * @param CacheInterface|null $cache
<<<<<<< HEAD
     * @param DbInitStatementsCleanup|null $dbInitStatementsCleanup
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function __construct(
        InstallerFactory $installerFactory,
        SearchConfigFactory $searchConfigFactory,
<<<<<<< HEAD
        ?DeploymentConfig $deploymentConfig = null,
        ?AppState $appState = null,
        ?CacheInterface $cache = null,
        ?DbInitStatementsCleanup $dbInitStatementsCleanup = null
=======
        DeploymentConfig $deploymentConfig = null,
        AppState $appState = null,
        CacheInterface $cache = null
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ) {
        $this->installerFactory = $installerFactory;
        $this->searchConfigFactory = $searchConfigFactory;
        $this->deploymentConfig = $deploymentConfig ?: ObjectManager::getInstance()->get(DeploymentConfig::class);
        $this->appState = $appState ?: ObjectManager::getInstance()->get(AppState::class);
        $this->cache = $cache ?: ObjectManager::getInstance()->get(CacheInterface::class);
<<<<<<< HEAD
        $this->dbInitStatementsCleanup = $dbInitStatementsCleanup
            ?: ObjectManager::getInstance()->get(DbInitStatementsCleanup::class);
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        parent::__construct();
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $options = [
            new InputOption(
                self::INPUT_KEY_KEEP_GENERATED,
                null,
                InputOption::VALUE_NONE,
                'Prevents generated files from being deleted. ' . PHP_EOL .
                'We discourage using this option except when deploying to production. ' . PHP_EOL .
                'Consult your system integrator or administrator for more information.'
            ),
            new InputOption(
                InstallCommand::CONVERT_OLD_SCRIPTS_KEY,
                null,
                InputOption::VALUE_OPTIONAL,
                'Allows to convert old scripts (InstallSchema, UpgradeSchema) to db_schema.xml format',
                false
            ),
            new InputOption(
                OperationsExecutor::KEY_SAFE_MODE,
                null,
                InputOption::VALUE_OPTIONAL,
                'Safe installation of Magento with dumps on destructive operations, like column removal'
            ),
            new InputOption(
                OperationsExecutor::KEY_DATA_RESTORE,
                null,
                InputOption::VALUE_OPTIONAL,
                'Restore removed data from dumps'
            ),
            new InputOption(
                DryRunLogger::INPUT_KEY_DRY_RUN_MODE,
                null,
                InputOption::VALUE_OPTIONAL,
                'Magento Installation will be run in dry-run mode',
                false
            )
        ];
<<<<<<< HEAD
        $this->setName(self::NAME)
=======
        $this->setName('setup:upgrade')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Upgrades the Magento application, DB data, and schema')
            ->setDefinition($options);
        parent::configure();
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected function execute(InputInterface $input, OutputInterface $output): int
=======
    protected function execute(InputInterface $input, OutputInterface $output)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        try {
            $request = $input->getOptions();
            $keepGenerated = $input->getOption(self::INPUT_KEY_KEEP_GENERATED);
<<<<<<< HEAD
            
            // Clean up deprecated 'SET NAMES utf8;' from database connections
            $output->writeln('<info>Cleaning up deprecated SET NAMES utf8 from database connections...</info>');
            $this->dbInitStatementsCleanup->execute();
            $this->deploymentConfig->resetData();

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $installer = $this->installerFactory->create(new ConsoleLogger($output));
            $installer->updateModulesSequence($keepGenerated);
            $searchConfig = $this->searchConfigFactory->create();
            $this->cache->clean();
            $searchConfig->validateSearchEngine();
<<<<<<< HEAD
            $installer->installSchema($request);
            $installer->removeUnusedTriggers();
=======
            $installer->removeUnusedTriggers();
            $installer->installSchema($request);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $installer->installDataFixtures($request, true);

            if ($this->deploymentConfig->isAvailable()) {
                $importConfigCommand = $this->getApplication()->find(ConfigImportCommand::COMMAND_NAME);
                $arrayInput = new ArrayInput([]);
                $arrayInput->setInteractive($input->isInteractive());
                $result = $importConfigCommand->run($arrayInput, $output);
                if ($result === Cli::RETURN_FAILURE) {
                    throw new RuntimeException(
                        __('%1 failed. See previous output.', ConfigImportCommand::COMMAND_NAME)
                    );
                }
            }

            if (!$keepGenerated && $this->appState->getMode() === AppState::MODE_PRODUCTION) {
                $output->writeln(
                    '<info>Please re-run Magento compile command. Use the command "setup:di:compile"</info>'
                );
            }
<<<<<<< HEAD

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $output->writeln(
                "<info>Media files stored outside of 'Media Gallery Allowed' folders"
                . " will not be available to the media gallery.</info>"
            );
            $output->writeln(
                '<info>Please refer to Developer Guide for more details.</info>'
            );
<<<<<<< HEAD

            // Add standardized success message for deployment script parsing
            $output->writeln('<info>Upgrade completed successfully.</info>');

        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');

            // Add standardized failure message for deployment script parsing
            $output->writeln('<error>Upgrade failed: ' . $e->getMessage() . '</error>');

=======
        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            return Cli::RETURN_FAILURE;
        }

        return Cli::RETURN_SUCCESS;
    }
}
