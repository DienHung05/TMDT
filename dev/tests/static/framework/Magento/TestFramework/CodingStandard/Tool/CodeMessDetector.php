<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * PHP Code Mess v1.3.3 tool wrapper
 */
namespace Magento\TestFramework\CodingStandard\Tool;

use \Magento\TestFramework\CodingStandard\ToolInterface;

class CodeMessDetector implements ToolInterface
{
    /**
     * Ruleset directory
     *
     * @var string
     */
    private $rulesetFile;

    /**
<<<<<<< HEAD
=======
     * Report file
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var string
     */
    private $reportFile;

    /**
<<<<<<< HEAD
     * @param string $rulesetFile \Directory that locates the inspection rules
=======
     * Constructor
     *
     * @param string $rulesetDir \Directory that locates the inspection rules
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $reportFile Destination file to write inspection report to
     */
    public function __construct($rulesetFile, $reportFile)
    {
        $this->reportFile = $reportFile;
        $this->rulesetFile = $rulesetFile;
    }

    /**
     * Whether the tool can be ran on the current environment
     *
     * @return bool
     */
    public function canRun()
    {
        return class_exists(\PHPMD\TextUI\Command::class);
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function run(array $whiteList)
    {
        if (empty($whiteList)) {
<<<<<<< HEAD
            return class_exists(\PHPMD\TextUI\ExitCode::class) ? \PHPMD\TextUI\ExitCode::Success : 0;
        }

        $command = new \PHPMD\TextUI\Command();
        // Build ArrayInput matching PHPMD's Symfony Command definition:
        $input = new \Symfony\Component\Console\Input\ArrayInput(
            [
                'paths' => array_values($whiteList),
                '--format' => 'text',
                '--ruleset' => [realpath($this->rulesetFile)],
                '--reportfile-text' => $this->reportFile,
            ],
            $command->getDefinition()
        );
        $output = new \Symfony\Component\Console\Output\NullOutput();
        return $command->run($input, $output);
=======
            return \PHPMD\TextUI\Command::EXIT_SUCCESS;
        }

        $commandLineArguments = [
            'run_file_mock', //emulate script name in console arguments
            implode(',', $whiteList),
            'text', //report format
            $this->rulesetFile,
            '--reportfile',
            $this->reportFile,
        ];

        $options = new \PHPMD\TextUI\CommandLineOptions($commandLineArguments);

        $command = new \PHPMD\TextUI\Command();

        return $command->run($options, new \PHPMD\RuleSetFactory());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
