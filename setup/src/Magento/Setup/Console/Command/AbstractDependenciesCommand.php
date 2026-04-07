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

use Magento\Framework\App\Utility\Files;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Component\DirSearch;
use Magento\Framework\Filesystem\Directory\ReadFactory;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\Framework\View\Design\Theme\ThemePackageList;
use Magento\Setup\Model\ObjectManagerProvider;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Abstract class for dependency report commands
 */
abstract class AbstractDependenciesCommand extends Command
{
    /**
     * Input key for directory option
     */
<<<<<<< HEAD
    public const INPUT_KEY_DIRECTORY = 'directory';
=======
    const INPUT_KEY_DIRECTORY = 'directory';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Input key for output path of report file
     */
<<<<<<< HEAD
    public const INPUT_KEY_OUTPUT = 'output';

    /**
     *
     * Magento object manager.
     * Responsible for creating and managing application objects
=======
    const INPUT_KEY_OUTPUT = 'output';

    /**
     * Object Manager
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * Constructor
     *
     * @param ObjectManagerProvider $objectManagerProvider
     */
    public function __construct(ObjectManagerProvider $objectManagerProvider)
    {
        $this->objectManager = $objectManagerProvider->get();
        parent::__construct();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function configure()
    {
        $this->setDefinition(
            [
                new InputOption(
                    self::INPUT_KEY_OUTPUT,
                    'o',
                    InputOption::VALUE_REQUIRED,
                    'Report filename',
                    $this->getDefaultOutputFilename()
                )
            ]
        );
        parent::configure();
    }

    /**
     * Build dependencies report
     *
     * @param string $outputPath
     * @return void
     */
    abstract protected function buildReport($outputPath);

    /**
     * Get the default output report filename
     *
     * @return string
     */
    abstract protected function getDefaultOutputFilename();

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
        try {
            /** @var \Magento\Framework\Component\ComponentRegistrar $componentRegistrar */
            $componentRegistrar = $this->objectManager->get(\Magento\Framework\Component\ComponentRegistrar::class);
            /** @var \Magento\Framework\Component\DirSearch $dirSearch */
            $dirSearch = $this->objectManager->get(\Magento\Framework\Component\DirSearch::class);
            /** @var \Magento\Framework\View\Design\Theme\ThemePackageList $themePackageList */
            $themePackageList = $this->objectManager->get(\Magento\Framework\View\Design\Theme\ThemePackageList::class);
            Files::setInstance(new Files($componentRegistrar, $dirSearch, $themePackageList));
            $this->buildReport($input->getOption(self::INPUT_KEY_OUTPUT));
            $output->writeln('<info>Report successfully processed.</info>');
        } catch (\Exception $e) {
            $output->writeln(
                '<error>Please check the path you provided. Dependencies report generator failed with error: ' .
                $e->getMessage() . '</error>'
            );
            // we must have an exit code higher than zero to indicate something was wrong
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
