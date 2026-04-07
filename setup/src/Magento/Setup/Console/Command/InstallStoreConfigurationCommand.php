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

use Magento\Framework\Setup\ConsoleLogger;
use Magento\Framework\App\DeploymentConfig;
use Magento\Setup\Model\InstallerFactory;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Setup\Model\StoreConfigurationDataMapper;
use Magento\Setup\Model\ObjectManagerProvider;
<<<<<<< HEAD
=======
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Exception\LocalizedException;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Validator\Locale as LocaleValidator;
use Magento\Framework\Validator\Timezone as TimezoneValidator;
use Magento\Framework\Validator\Currency as CurrencyValidator;
use Magento\Framework\Validator\Url as UrlValidator;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InstallStoreConfigurationCommand extends AbstractSetupCommand
{
<<<<<<< HEAD
    public const NAME = 'setup:store-config:set';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var InstallerFactory
     */
    private $installerFactory;

    /**
<<<<<<< HEAD
=======
     * Deployment configuration
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var DeploymentConfig
     */
    private $deploymentConfig;

    /**
<<<<<<< HEAD
=======
     * Object Manager
     *
     * @var ObjectManagerInterface
     * @deprecated 2.2.0
     */
    private $objectManager;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var LocaleValidator
     */
    private $localeValidator;

    /**
     * @var TimezoneValidator
     */
    private $timezoneValidator;

    /**
     * @var CurrencyValidator
     */
    private $currencyValidator;

    /**
     * @var UrlValidator
     */
    private $urlValidator;

    /**
     * Inject dependencies
     *
     * @param InstallerFactory $installerFactory
     * @param DeploymentConfig $deploymentConfig
<<<<<<< HEAD
     * @param ObjectManagerProvider $objectManagerProvider Deprecated since not used anymore
     * @param LocaleValidator $localeValidator
     * @param TimezoneValidator $timezoneValidator
     * @param CurrencyValidator $currencyValidator
     * @param UrlValidator $urlValidator
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
=======
     * @param ObjectManagerProvider $objectManagerProvider
     * @param LocaleValidator $localeValidator,
     * @param TimezoneValidator $timezoneValidator,
     * @param CurrencyValidator $currencyValidator,
     * @param UrlValidator $urlValidator
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function __construct(
        InstallerFactory $installerFactory,
        DeploymentConfig $deploymentConfig,
        ObjectManagerProvider $objectManagerProvider,
        LocaleValidator $localeValidator,
        TimezoneValidator $timezoneValidator,
        CurrencyValidator $currencyValidator,
        UrlValidator $urlValidator
    ) {
        $this->installerFactory = $installerFactory;
        $this->deploymentConfig = $deploymentConfig;
<<<<<<< HEAD
=======
        $this->objectManager = $objectManagerProvider->get();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->localeValidator = $localeValidator;
        $this->timezoneValidator = $timezoneValidator;
        $this->currencyValidator = $currencyValidator;
        $this->urlValidator = $urlValidator;
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
        $this->setName('setup:store-config:set')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setDescription('Installs the store configuration. Deprecated since 2.2.0. Use config:set instead')
            ->setDefinition($this->getOptionsList());
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
            $output->writeln(
                "<info>Store settings can't be saved because the Magento application is not installed.</info>"
            );
            // we must have an exit code higher than zero to indicate something was wrong
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
        $errors = $this->validate($input);
        if ($errors) {
            $output->writeln($errors);
            // we must have an exit code higher than zero to indicate something was wrong
            return \Magento\Framework\Console\Cli::RETURN_FAILURE;
        }
        $installer = $this->installerFactory->create(new ConsoleLogger($output));
        $installer->installUserConfig($input->getOptions());
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }

    /**
     * Get list of options for the command
     *
     * @return InputOption[]
     */
    public function getOptionsList()
    {
        return [
            new InputOption(
                StoreConfigurationDataMapper::KEY_BASE_URL,
                null,
                InputOption::VALUE_REQUIRED,
                'URL the store is supposed to be available at. '
                . 'Deprecated, use config:set with path web/unsecure/base_url'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_LANGUAGE,
                null,
                InputOption::VALUE_REQUIRED,
                'Default language code. '
                . 'Deprecated, use config:set with path general/locale/code'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_TIMEZONE,
                null,
                InputOption::VALUE_REQUIRED,
                'Default time zone code. '
                . 'Deprecated, use config:set with path general/locale/timezone'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_CURRENCY,
                null,
                InputOption::VALUE_REQUIRED,
                'Default currency code. '
                . 'Deprecated, use config:set with path currency/options/base, currency/options/default'
                . ' and currency/options/allow'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_USE_SEF_URL,
                null,
                InputOption::VALUE_REQUIRED,
                'Use rewrites. '
                . 'Deprecated, use config:set with path web/seo/use_rewrites'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_IS_SECURE,
                null,
                InputOption::VALUE_REQUIRED,
                'Use secure URLs. Enable this option only if SSL is available. '
                . 'Deprecated, use config:set with path web/secure/use_in_frontend'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_BASE_URL_SECURE,
                null,
                InputOption::VALUE_REQUIRED,
                'Base URL for SSL connection. '
                . 'Deprecated, use config:set with path web/secure/base_url'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN,
                null,
                InputOption::VALUE_REQUIRED,
                'Run admin interface with SSL. '
                . 'Deprecated, use config:set with path web/secure/use_in_adminhtml'
            ),
            new InputOption(
                StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY,
                null,
                InputOption::VALUE_REQUIRED,
                'Whether to use a "security key" feature in Magento Admin URLs and forms. '
                . 'Deprecated, use config:set with path admin/security/use_form_key'
            ),
        ];
    }

    /**
     * Check if option values provided by the user are valid
     *
     * @param InputInterface $input
     * @return string[]
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function validate(InputInterface $input)
    {
        $errors = [];
        $errorMsg = '';
        $options = $input->getOptions();
        foreach ($options as $key => $value) {
            if (!$value) {
                continue;
            }
            switch ($key) {
                case StoreConfigurationDataMapper::KEY_BASE_URL:
                    if (strcmp($value, '{{base_url}}') == 0) {
                        break;
                    }
                    $errorMsg = $this->validateUrl(
                        $value,
                        StoreConfigurationDataMapper::KEY_BASE_URL,
                        ['http', 'https']
                    );

                    break;
                case StoreConfigurationDataMapper::KEY_LANGUAGE:
                    $errorMsg = $this->validateCodes(
                        $this->localeValidator,
                        $value,
                        StoreConfigurationDataMapper::KEY_LANGUAGE
                    );
                    break;
                case StoreConfigurationDataMapper::KEY_TIMEZONE:
                    $errorMsg = $this->validateCodes(
                        $this->timezoneValidator,
                        $value,
                        StoreConfigurationDataMapper::KEY_TIMEZONE
                    );
                    break;
                case StoreConfigurationDataMapper::KEY_CURRENCY:
                    $errorMsg = $this->validateCodes(
                        $this->currencyValidator,
                        $value,
                        StoreConfigurationDataMapper::KEY_CURRENCY
                    );
                    break;
                case StoreConfigurationDataMapper::KEY_USE_SEF_URL:
                    $errorMsg = $this->validateBinaryValue($value, StoreConfigurationDataMapper::KEY_USE_SEF_URL);
                    break;
                case StoreConfigurationDataMapper::KEY_IS_SECURE:
                    $errorMsg = $this->validateBinaryValue($value, StoreConfigurationDataMapper::KEY_IS_SECURE);
                    break;
                case StoreConfigurationDataMapper::KEY_BASE_URL_SECURE:
                    $errorMsg = $this->validateUrl(
                        $value,
                        StoreConfigurationDataMapper::KEY_BASE_URL_SECURE,
                        ['https']
                    );
                    break;
                case StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN:
                    $errorMsg = $this->validateBinaryValue($value, StoreConfigurationDataMapper::KEY_IS_SECURE_ADMIN);
                    break;
                case StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY:
                    $errorMsg = $this->validateBinaryValue(
                        $value,
                        StoreConfigurationDataMapper::KEY_ADMIN_USE_SECURITY_KEY
                    );
                    break;
                case StoreConfigurationDataMapper::KEY_JS_LOGGING:
                    $errorMsg = $this->validateBinaryValue(
                        $value,
                        StoreConfigurationDataMapper::KEY_JS_LOGGING
                    );
                    break;
            }
            if ($errorMsg !== '') {
                $errors[] = $errorMsg;
            }
        }
        return $errors;
    }

    /**
     * Validate binary value for a specified key
     *
     * @param string $value
     * @param string $key
     * @return string
     */
    private function validateBinaryValue($value, $key)
    {
        $errorMsg = '';
        if ($value !== '0' && $value !== '1') {
            $errorMsg = '<error>' . 'Command option \'' . $key . '\': Invalid value. Possible values (0|1).</error>';
        }
        return $errorMsg;
    }

    /**
     * Validate codes for languages, currencies or timezones
     *
<<<<<<< HEAD
     * @param LocaleValidator|TimezoneValidator|CurrencyValidator $lists
     * @param string $code
     * @param string $type
=======
     * @param LocaleValidator|TimezoneValidator|CurrencyValidator  $lists
     * @param string  $code
     * @param string  $type
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @return string
     */
    private function validateCodes($lists, $code, $type)
    {
        $errorMsg = '';
        if (!$lists->isValid($code)) {
            $errorMsg = '<error>' . 'Command option \'' . $type . '\': Invalid value. To see possible values, '
                . "run command 'bin/magento info:" . $type . ':list\'.</error>';
        }
        return $errorMsg;
    }

    /**
     * Validate URL
     *
     * @param string $url
     * @param string $option
     * @param array $allowedSchemes
     * @return string
     */
    private function validateUrl($url, $option, array $allowedSchemes)
    {
        $errorMsg = '';

        if (!$this->urlValidator->isValid($url, $allowedSchemes)) {
            $errorTemplate = '<error>Command option \'%s\': Invalid URL \'%s\'.'
                . ' Domain Name should contain only letters, digits and hyphen.'
                . ' And you should use only following schemes: \'%s\'.</error>';
            $errorMsg = sprintf(
                $errorTemplate,
                $option,
                $url,
                implode(', ', $allowedSchemes)
            );
        }

        return $errorMsg;
    }
}
