<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Setup\Console\Command;

use Magento\Catalog\Model\Indexer\Product\Price\DimensionModeConfiguration;
use Symfony\Component\Console\Tester\CommandTester;
use Magento\Framework\Console\Cli;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test command that sets indexer mode for catalog_product_price indexer
 *
 * @magentoDbIsolation disabled
 */
class PriceIndexerDimensionsModeSetCommandTest extends \Magento\TestFramework\Indexer\TestCase
{
    /** @var  ObjectManagerInterface */
    private $objectManager;

    /** @var  \Magento\Indexer\Console\Command\IndexerSetDimensionsModeCommand */
    private $command;

    /** @var  CommandTester */
    private $commandTester;

    /**
     * setUp
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();

        $this->objectManager->get(\Magento\TestFramework\App\Config::class)->clean();

        $this->command = $this->objectManager->create(
            \Magento\Indexer\Console\Command\IndexerSetDimensionsModeCommand::class
        );

        $this->commandTester = new CommandTester($this->command);

        parent::setUp();
    }

    /**
     * setUpBeforeClass
     */
    public static function setUpBeforeClass(): void
    {
        $db = Bootstrap::getInstance()->getBootstrap()
            ->getApplication()
            ->getDbInstance();
        if (!$db->isDbDumpExists()) {
            throw new \LogicException('DB dump does not exist.');
        }
        $db->restoreFromDbDump();

        parent::setUpBeforeClass();
    }

    /**
     * @magentoAppArea adminhtml
     * @magentoAppIsolation enabled
     *
     * @param string $previousMode
     * @param string $currentMode
<<<<<<< HEAD
     */
    #[DataProvider('modesDataProvider')]
=======
     * @dataProvider modesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSwitchMode($previousMode, $currentMode)
    {
        $this->commandTester->execute(
            [
                'indexer' => 'catalog_product_price',
                'mode'    => $currentMode,
            ]
        );
        $expectedOutput = 'Dimensions mode for indexer "Product Price" was changed from \''
            . $previousMode . '\' to \'' . $currentMode . '\'' . PHP_EOL;

        $actualOutput = $this->commandTester->getDisplay();

        $this->assertStringContainsString($expectedOutput, $actualOutput);

        static::assertEquals(
            Cli::RETURN_SUCCESS,
            $this->commandTester->getStatusCode(),
            $this->commandTester->getDisplay(true)
        );
    }

    /**
     * Modes data provider
     * @return array
     */
<<<<<<< HEAD
    public static function modesDataProvider()
=======
    public function modesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [DimensionModeConfiguration::DIMENSION_NONE, DimensionModeConfiguration::DIMENSION_WEBSITE],
            [DimensionModeConfiguration::DIMENSION_WEBSITE, DimensionModeConfiguration::DIMENSION_CUSTOMER_GROUP],
            [
                DimensionModeConfiguration::DIMENSION_CUSTOMER_GROUP,
                DimensionModeConfiguration::DIMENSION_WEBSITE_AND_CUSTOMER_GROUP
            ],
            [
                DimensionModeConfiguration::DIMENSION_WEBSITE_AND_CUSTOMER_GROUP,
                DimensionModeConfiguration::DIMENSION_NONE
            ],
            [
                DimensionModeConfiguration::DIMENSION_NONE,
                DimensionModeConfiguration::DIMENSION_WEBSITE_AND_CUSTOMER_GROUP
            ],
            [
                DimensionModeConfiguration::DIMENSION_WEBSITE_AND_CUSTOMER_GROUP,
                DimensionModeConfiguration::DIMENSION_CUSTOMER_GROUP
            ],
            [DimensionModeConfiguration::DIMENSION_CUSTOMER_GROUP, DimensionModeConfiguration::DIMENSION_WEBSITE],
            [DimensionModeConfiguration::DIMENSION_WEBSITE, DimensionModeConfiguration::DIMENSION_NONE],
        ];
    }

    /**
     * @magentoAppArea adminhtml
     * @magentoAppIsolation enabled
     */
    public function testSwitchModeForSameMode()
    {
        $this->commandTester->execute(
            [
                'indexer' => 'catalog_product_price',
                'mode' => DimensionModeConfiguration::DIMENSION_NONE
            ]
        );
        $expectedOutput = 'Dimensions mode for indexer "Product Price" has not been changed' . PHP_EOL;

        $actualOutput = $this->commandTester->getDisplay();

        $this->assertStringContainsString($expectedOutput, $actualOutput);

        static::assertEquals(
            Cli::RETURN_SUCCESS,
            $this->commandTester->getStatusCode(),
            $this->commandTester->getDisplay(true)
        );
    }

    /**
     * @magentoAppArea adminhtml
     * @magentoAppIsolation enabled
     *
     */
    public function testSwitchModeWithInvalidArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->commandTester->execute(
            [
                'indexer' => 'indexer_not_valid'
            ]
        );
    }
}
