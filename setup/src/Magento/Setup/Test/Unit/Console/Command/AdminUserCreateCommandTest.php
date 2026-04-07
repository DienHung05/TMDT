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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Console\Command;

<<<<<<< HEAD
use Magento\Framework\App\Config\ScopeConfigInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Setup\Console\Command\AdminUserCreateCommand;
use Magento\Setup\Model\AdminAccount;
use Magento\Setup\Model\Installer;
use Magento\Setup\Model\InstallerFactory;
use Magento\Setup\Mvc\Bootstrap\InitParamListener;
use Magento\User\Model\UserValidationRules;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Tester\CommandTester;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputArgument;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AdminUserCreateCommandTest extends TestCase
{
    /**
     * @var MockObject|QuestionHelper
     */
    private $questionHelperMock;

    /**
     * @var MockObject|InstallerFactory
     */
    private $installerFactoryMock;

    /**
<<<<<<< HEAD
     * @var MockObject|ScopeConfigInterface
     */
    private $scopeConfigMock;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var MockObject|AdminUserCreateCommand
     */
    private $command;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->installerFactoryMock = $this->createMock(InstallerFactory::class);
<<<<<<< HEAD
        $this->scopeConfigMock = $this->createMock(ScopeConfigInterface::class);

        $this->command = new AdminUserCreateCommand(
            $this->installerFactoryMock,
            new UserValidationRules($this->scopeConfigMock)
        );

        $this->questionHelperMock = $this->getMockBuilder(QuestionHelper::class)
            ->onlyMethods(['ask'])
=======
        $this->command = new AdminUserCreateCommand($this->installerFactoryMock, new UserValidationRules());

        $this->questionHelperMock = $this->getMockBuilder(QuestionHelper::class)
            ->setMethods(['ask'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
    }

    /**
     * @return void
     */
    public function testExecute(): void
    {
        $options = [
            '--' . AdminAccount::KEY_USER => 'user',
            '--' . AdminAccount::KEY_PASSWORD => '123123q',
            '--' . AdminAccount::KEY_EMAIL => 'test@test.com',
            '--' . AdminAccount::KEY_FIRST_NAME => 'John',
            '--' . AdminAccount::KEY_LAST_NAME => 'Doe'
        ];
        $data = [
            AdminAccount::KEY_USER => 'user',
            AdminAccount::KEY_PASSWORD => '123123q',
            AdminAccount::KEY_EMAIL => 'test@test.com',
            AdminAccount::KEY_FIRST_NAME => 'John',
            AdminAccount::KEY_LAST_NAME => 'Doe',
            InitParamListener::BOOTSTRAP_PARAM => null
        ];
        $commandTester = new CommandTester($this->command);
        $installerMock = $this->createMock(Installer::class);
        $installerMock->expects($this->once())->method('installAdminUser')->with($data);
        $this->installerFactoryMock->expects($this->once())->method('create')->willReturn($installerMock);
        $commandTester->execute($options, ['interactive' => false]);
        $this->assertEquals('Created Magento administrator user named user' . PHP_EOL, $commandTester->getDisplay());
    }

    /**
     * @return void
     */
    public function testInteraction(): void
    {
        $application = new Application();
        $application->add($this->command);

        $this->questionHelperMock
            ->method('ask')
            ->willReturnOnConsecutiveCalls('admin', 'Password123', 'john.doe@example.com', 'John', 'Doe');

        // We override the standard helper with our mock
        $this->command->getHelperSet()->set($this->questionHelperMock, 'question');

        $installerMock = $this->createMock(Installer::class);

        $expectedData = [
            'admin-user' => 'admin',
            'admin-password' => 'Password123',
            'admin-email' => 'john.doe@example.com',
            'admin-firstname' => 'John',
            'admin-lastname' => 'Doe',
            'magento-init-params' => null,
            'help' => false,
            'quiet' => false,
            'verbose' => false,
            'version' => false,
<<<<<<< HEAD
            'ansi' => null,
            'no-interaction' => false,
            'silent' => false
=======
            'ansi' => false,
            'no-ansi' => false,
            'no-interaction' => false
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];

        $installerMock->expects($this->once())->method('installAdminUser')->with($expectedData);
        $this->installerFactoryMock->expects($this->once())->method('create')->willReturn($installerMock);

        $commandTester = new CommandTester($this->command);
        $commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        $this->assertEquals(
            'Created Magento administrator user named admin' . PHP_EOL,
            $commandTester->getDisplay()
        );
    }

    /**
     * @param int $mode
     * @param string $description
     *
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('getOptionListDataProvider')]
    public function testGetOptionsList(int $mode, string $description): void
    {
        /* @var $argsList InputArgument[] */
=======
     * @dataProvider getOptionListDataProvider
     */
    public function testGetOptionsList($mode, $description): void
    {
        /* @var $argsList \Symfony\Component\Console\Input\InputArgument[] */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $argsList = $this->command->getOptionsList($mode);
        $this->assertEquals(AdminAccount::KEY_EMAIL, $argsList[2]->getName());
        $this->assertEquals($description, $argsList[2]->getDescription());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getOptionListDataProvider(): array
=======
    public function getOptionListDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'mode' => InputOption::VALUE_REQUIRED,
                'description' => '(Required) Admin email'
            ],
            [
                'mode' => InputOption::VALUE_OPTIONAL,
                'description' => 'Admin email'
            ]
        ];
    }

    /**
     * @param bool[] $options
     * @param string[] $errors
<<<<<<< HEAD
     * @param int $minPasswordLength
     *
     * @throws Exception
     */
    #[DataProvider('validateDataProvider')]
    public function testValidate(array $options, array $errors, int $minPasswordLength = 7): void
    {
        $inputMock = $this->createMock(InputInterface::class);
=======
     *
     * @dataProvider validateDataProvider
     */
    public function testValidate(array $options, array $errors): void
    {
        $inputMock = $this->getMockForAbstractClass(
            InputInterface::class,
            [],
            '',
            false
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $inputMock
            ->method('getOption')
            ->willReturnOnConsecutiveCalls(...$options);

<<<<<<< HEAD
        $this->scopeConfigMock->expects($this->any())
            ->method('getValue')
            ->willReturnMap([
                ['admin/security/minimum_password_length', 'default', null, $minPasswordLength],
            ]);

        $command = new AdminUserCreateCommand(
            $this->installerFactoryMock,
            new UserValidationRules($this->scopeConfigMock)
        );

        $this->assertEquals($errors, $command->validate($inputMock));
=======
        $this->assertEquals($errors, $this->command->validate($inputMock));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function validateDataProvider(): array
=======
    public function validateDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [null, 'Doe', 'admin', 'test@test.com', '123123q', '123123q'],
                ['"First Name" is required. Enter and try again.']
            ],
            [
                ['John', null, null, 'test@test.com', '123123q', '123123q'],
                ['"User Name" is required. Enter and try again.', '"Last Name" is required. Enter and try again.'],
            ],
            [['John', 'Doe', 'admin', null, '123123q', '123123q'], ['Please enter a valid email.']],
            [
                ['John', 'Doe', 'admin', 'test', '123123q', '123123q'],
                ["'test' is not a valid email address in the basic format local-part@hostname"]
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', '', ''],
                [
                    'Password is required field.',
                    'Your password must be at least 7 characters.',
                    'Your password must include both numeric and alphabetic characters.'
                ]
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', '123123', '123123'],
                [
                    'Your password must be at least 7 characters.',
                    'Your password must include both numeric and alphabetic characters.'
                ]
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', '1231231', '1231231'],
                ['Your password must include both numeric and alphabetic characters.']
            ],
<<<<<<< HEAD
            [
                ['John', 'Doe', 'admin', 'test@test.com', '123123q', '123123q'],
                []
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', '123123q', '123123q'],
                [
                    'Your password must be at least 12 characters.',
                ],
                12
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', 'password123', 'password123'],
                [
                    'Your password must be at least 12 characters.',
                ],
                12
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', 'password1234', 'password1234'],
                [],
                12
            ],
            [
                ['John', 'Doe', 'admin', 'test@test.com', '123456789012', '123456789012'],
                [
                    'Your password must include both numeric and alphabetic characters.'
                ],
                12
            ],
=======
            [['John', 'Doe', 'admin', 'test@test.com', '123123q', '123123q'], []],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
