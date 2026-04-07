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
use Magento\Setup\Module\Dependency\ServiceLocator;

/**
 * Command for showing number of dependencies between modules
 */
class DependenciesShowModulesCommand extends AbstractDependenciesCommand
{
<<<<<<< HEAD
    public const NAME = 'info:dependencies:show-modules';

    /**
     * @inheritdoc
=======
    /**
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function configure()
    {
        $this->setDescription('Shows number of dependencies between modules')
<<<<<<< HEAD
            ->setName(self::NAME);
=======
            ->setName('info:dependencies:show-modules');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        parent::configure();
    }

    /**
     * Return default output filename for modules dependencies report
     *
     * @return string
     */
    protected function getDefaultOutputFilename()
    {
        return 'modules-dependencies.csv';
    }

    /**
     * Build circular dependencies between modules report
     *
     * @param string $outputPath
     * @return void
     */
    protected function buildReport($outputPath)
    {
        $filesForParse = Files::init()->getComposerFiles(ComponentRegistrar::MODULE, false);

        ServiceLocator::getDependenciesReportBuilder()->build(
            [
                'parse' => ['files_for_parse' => $filesForParse],
                'write' => ['report_filename' => $outputPath],
            ]
        );
    }
}
