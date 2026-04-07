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

namespace Magento\Framework\Mail;

use Magento\Email\Model\BackendTemplate;
use Magento\Email\Model\Template;
use Magento\Framework\App\TemplateTypesInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class EmailMessageTest
 */
class TransportBuilderTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $di;

    /**
     * @var TransportBuilder
     */
    protected $builder;

    /**
     * @var Template
     */
    protected $template;

    protected function setUp(): void
    {
        $this->di = Bootstrap::getObjectManager();
        $this->builder = $this->di->get(TransportBuilder::class);
        $this->template = $this->di->get(Template::class);
    }

    /**
     * @magentoDataFixture Magento/Email/Model/_files/email_template.php
     * @magentoDbIsolation enabled
     *
     * @param string|array $email
<<<<<<< HEAD
     * @throws LocalizedException
     */
    #[DataProvider('emailDataProvider')]
=======
     * @dataProvider emailDataProvider
     * @throws LocalizedException
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAddToEmail($email)
    {
        $template = $this->template->load('email_exception_fixture', 'template_code');
        $templateId = $template->getId();

        switch ($template->getType()) {
            case TemplateTypesInterface::TYPE_TEXT:
                $templateType = MimeInterface::TYPE_TEXT;
                break;

            case TemplateTypesInterface::TYPE_HTML:
                $templateType = MimeInterface::TYPE_HTML;
                break;

            default:
                $templateType = '';
                $this->fail('Unsupported Mime Type');
        }

        $this->builder->setTemplateModel(BackendTemplate::class);

        $vars = ['reason' => 'Reason', 'customer' => 'Customer'];
        $options = ['area' => 'frontend', 'store' => 1];
        $this->builder->setTemplateIdentifier($templateId)->setTemplateVars($vars)->setTemplateOptions($options);

        $this->builder->addTo($email);

        /** @var EmailMessage $emailMessage */
        $emailMessage = $this->builder->getTransport()->getMessage();
<<<<<<< HEAD
        $header = 'text/' . $emailMessage->getSymfonyMessage()->getBody()->getMediaSubtype();
        $this->assertStringContainsStringIgnoringCase($templateType, $header);
=======

        $this->assertStringContainsStringIgnoringCase($templateType, $emailMessage->getHeaders()['Content-Type']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $addresses = $emailMessage->getTo();

        $emails = [];
        /** @var Address $toAddress */
        foreach ($addresses as $address) {
            $emails[] = $address->getEmail();
        }

        if (is_string($email)) {
            $this->assertCount(1, $emails);
            $this->assertEquals($email, $emails[0]);
        } else {
            $this->assertEquals($email, $emails);
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function emailDataProvider(): array
=======
    public function emailDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'billy.everything@someserver.com',
            ],
            [
                [
                    'billy.everything@someserver.com',
                    'john.doe@someserver.com',
                ]
            ]
        ];
    }

    /**
     * Test if invalid email in the queue will not fail the entire queue from being sent
     *
     * @magentoDataFixture Magento/Email/Model/_files/email_template.php
     * @magentoDbIsolation enabled
     *
     * @param string|array $emails
<<<<<<< HEAD
     * @throws LocalizedException
     */
    #[DataProvider('invalidEmailDataProvider')]
=======
     * @dataProvider invalidEmailDataProvider
     * @throws LocalizedException
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAddToInvalidEmailInTheQueue($emails)
    {
        $template = $this->template->load('email_exception_fixture', 'template_code');
        $templateId = $template->getId();

        switch ($template->getType()) {
            case TemplateTypesInterface::TYPE_TEXT:
                $templateType = MimeInterface::TYPE_TEXT;
                break;

            case TemplateTypesInterface::TYPE_HTML:
                $templateType = MimeInterface::TYPE_HTML;
                break;

            default:
                $templateType = '';
                $this->fail('Unsupported Mime Type');
        }

        $this->builder->setTemplateModel(BackendTemplate::class);

        $vars = ['reason' => 'Reason', 'customer' => 'Customer'];
        $options = ['area' => 'frontend', 'store' => 1];
        $this->builder->setTemplateIdentifier($templateId)->setTemplateVars($vars)->setTemplateOptions($options);

        $allEmails = $emails[0];
        $validOnlyEmails = $emails[1];

        foreach ($allEmails as $email) {
            $this->builder->addTo($email);
        }

        /** @var EmailMessage $emailMessage */
        $emailMessage = $this->builder->getTransport()->getMessage();
<<<<<<< HEAD
        $header = 'text/' . $emailMessage->getSymfonyMessage()->getBody()->getMediaSubtype();
        $this->assertStringContainsStringIgnoringCase($templateType, $header);
=======
        $this->assertStringContainsStringIgnoringCase($templateType, $emailMessage->getHeaders()['Content-Type']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $resultEmails = [];
        /** @var Address $toAddress */
        foreach ($emailMessage->getTo() as $address) {
            $resultEmails[] = $address->getEmail();
        }

        $this->assertEquals($validOnlyEmails, $resultEmails);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function invalidEmailDataProvider(): array
=======
    public function invalidEmailDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    [
                        'billy.everything@someserver.com',
                        'billy.everythingsomeserver.com',
                        'billy.everything2@someserver.com',
                        'billy.everythin2gsomeserver.com',
                        'billy.everything3@someserver.com'
                    ],
                    [
                        'billy.everything@someserver.com',
                        'billy.everything2@someserver.com',
                        'billy.everything3@someserver.com'
                    ]
                ]
            ]
        ];
    }
}
