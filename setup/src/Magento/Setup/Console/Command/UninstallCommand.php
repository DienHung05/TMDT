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
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Magento\Setup\Model\InstallerFactory;
use Magento\Framework\Setup\ConsoleLogger;

class UninstallCommand extends AbstractSetupCommand
{
<<<<<<< HEAD
    public const NAME = 'setup:uninstall';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var InstallerFactory
     */
    private $installerFactory;

    /**
     * @param InstallerFactory $installerFactory
     */
    public function __construct(InstallerFactory $installerFactory)
    {
        $this->installerFactory = $installerFactory;
        parent::__construct();
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName(self::NAME)
=======
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('setup:uninstall')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Uninstalls the Magento application');
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
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('Are you sure you want to uninstall Magento?[y/N]', false);

        if ($helper->ask($input, $output, $question) || !$input->isInteractive()) {
            $installer = $this->installerFactory->create(new ConsoleLogger($output));
            $installer->uninstall();
        }
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
