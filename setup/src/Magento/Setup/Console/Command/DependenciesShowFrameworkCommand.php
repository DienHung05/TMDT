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
use Magento\Framework\Component\ComponentRegistrarInterface;
use Magento\Setup\Model\ObjectManagerProvider;
use Magento\Setup\Module\Dependency\ServiceLocator;

/**
 * Command for showing numbers of dependencies on Magento Framework
 */
class DependenciesShowFrameworkCommand extends AbstractDependenciesCommand
{
<<<<<<< HEAD
    public const NAME = 'info:dependencies:show-framework';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var ComponentRegistrarInterface
     */
    private $registrar;

    /**
     * Constructor
     *
     * @param ComponentRegistrarInterface $registrar
     * @param ObjectManagerProvider $objectManagerProvider
     */
    public function __construct(ComponentRegistrarInterface $registrar, ObjectManagerProvider $objectManagerProvider)
    {
        $this->registrar = $registrar;
        parent::__construct($objectManagerProvider);
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
        $this->setDescription('Shows number of dependencies on Magento framework')
<<<<<<< HEAD
            ->setName(self::NAME);
=======
            ->setName('info:dependencies:show-framework');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        parent::configure();
    }

    /**
     * Return default output filename for framework dependencies report
     *
     * @return string
     */
    protected function getDefaultOutputFilename()
    {
        return 'framework-dependencies.csv';
    }

    /**
     * Build Framework dependencies report
     *
     * @param string $outputPath
     * @return void
     */
    protected function buildReport($outputPath)
    {
        $filePaths = $this->registrar->getPaths(ComponentRegistrar::MODULE);

        $filesForParse = Files::init()->getFiles($filePaths, '*');
        $configFiles = Files::init()->getConfigFiles('module.xml', [], false);

        ServiceLocator::getFrameworkDependenciesReportBuilder()->build(
            [
                'parse' => [
                    'files_for_parse' => $filesForParse,
                    'config_files' => $configFiles,
                    'declared_namespaces' => Files::init()->getNamespaces(),
                ],
                'write' => ['report_filename' => $outputPath],
            ]
        );
    }
}
