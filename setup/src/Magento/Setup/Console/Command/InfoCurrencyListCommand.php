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

use Symfony\Component\Console\Helper\TableFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Magento\Framework\Setup\Lists;
use Magento\Framework\App\ObjectManager;

/**
 * Command prints list of available currencies
 */
class InfoCurrencyListCommand extends Command
{
<<<<<<< HEAD
    public const NAME = 'info:currency:list';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * List model provides lists of available options for currency, language locales, timezones
     *
     * @var Lists
     */
    private $lists;

    /**
     * @var TableFactory
     */
    private $tableHelperFactory;

    /**
     * @param Lists $lists
     * @param TableFactory $tableHelperFactory
     */
<<<<<<< HEAD
    public function __construct(Lists $lists, ?TableFactory $tableHelperFactory = null)
=======
    public function __construct(Lists $lists, TableFactory $tableHelperFactory = null)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->lists = $lists;
        $this->tableHelperFactory = $tableHelperFactory ?: ObjectManager::getInstance()->create(TableFactory::class);
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
        $this->setName('info:currency:list')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Displays the list of available currencies');

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
        $tableHelper = $this->tableHelperFactory->create(['output' => $output]);
        $tableHelper->setHeaders(['Currency', 'Code']);

        foreach ($this->lists->getCurrencyList() as $key => $currency) {
            $tableHelper->addRow([$currency, $key]);
        }

        $tableHelper->render();
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
