<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Model\ConfigOptionsList;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\Config\Data\ConfigData;
use Magento\Framework\Config\File\ConfigFilePool;
use Magento\Framework\Setup\ConfigOptionsListInterface;
use Magento\Framework\Setup\Option\SelectConfigOption;

/**
 * Deployment configuration options for the folders.
<<<<<<< HEAD
 * @deprecated Magento always uses the pub directory
 * @see Nothing
=======
 * @deprecared Magento always uses the pub directory
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
class Directory implements ConfigOptionsListInterface
{
    /**
     * Input key for config command.
     */
    private const INPUT_KEY_DOCUMENT_ROOT_IS_PUB = 'document-root-is-pub';

    /**
     * Path in in configuration.
     */
<<<<<<< HEAD
    public const CONFIG_PATH_DOCUMENT_ROOT_IS_PUB = 'directories/document_root_is_pub';
=======
    const CONFIG_PATH_DOCUMENT_ROOT_IS_PUB = 'directories/document_root_is_pub';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * The available configuration values.
     *
     * @var array
     */
    private $selectOptions = [true, false];

    /**
     * Create config and update document root value according to provided options
     *
     * @param array $options
     * @param DeploymentConfig $deploymentConfig
     * @return ConfigData|ConfigData[]
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function createConfig(array $options, DeploymentConfig $deploymentConfig)
    {
        $configData = new ConfigData(ConfigFilePool::APP_ENV);
        if (isset($options[self::INPUT_KEY_DOCUMENT_ROOT_IS_PUB])) {
            $configData->set(
                self::CONFIG_PATH_DOCUMENT_ROOT_IS_PUB,
                \filter_var($options[self::INPUT_KEY_DOCUMENT_ROOT_IS_PUB], FILTER_VALIDATE_BOOLEAN)
            );
        }

        return $configData;
    }

    /**
     * Return options from Directory configuration.
     *
     * @return \Magento\Framework\Setup\Option\AbstractConfigOption[]|SelectConfigOption[]
     */
    public function getOptions()
    {
        return [
            new SelectConfigOption(
                self::INPUT_KEY_DOCUMENT_ROOT_IS_PUB,
                SelectConfigOption::FRONTEND_WIZARD_SELECT,
                $this->selectOptions,
                self::CONFIG_PATH_DOCUMENT_ROOT_IS_PUB,
                'Flag to show is Pub is on root, can be true or false only',
                true
            ),
        ];
    }

    /**
     * Validate options.
     *
     * @param array $options
     * @param DeploymentConfig $deploymentConfig
     * @return array|string[]
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function validate(array $options, DeploymentConfig $deploymentConfig)
    {
        return [];
    }
}
