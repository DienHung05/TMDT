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

use Magento\Framework\Exception\MailException;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class EmailMessageTest extends TestCase
{
    private const ATTACHMENT_FILE_NAME = 'di.xml';
    private const XML_TYPE = 'text/xml';
    /**
     * @var ObjectManagerInterface
     */
    private $di;

    /**
     * @var MimePartInterfaceFactory
     */
    private $mimePartFactory;

    /**
     * @var MimeMessageInterfaceFactory
     */
    private $mimeMessageFactory;

    /**
     * @var AddressConverter
     */
    private $messageConverter;

    /**
     * @var EmailMessageInterfaceFactory
     */
    private $messageFactory;

    /**
     * @var AddressFactory
     */
    private $addressFactory;

    /**
     * @var array
     */
    private $addressList = [
        'to' => [
            ['email' => 'to@adobe.com', 'name' => 'Addressee']
        ],
        'replyTo' => ['email' => 'replyTo@adobe.com', 'name' => 'Reply To Address'],
        'from' => 'from@adobe.com',
        'sender' => ['email' => 'sender@adobe.com', 'name' => 'Sender'],
        'cc' => [
            'cc1@adobe.com' => 'CC 1 Address',
            'cc2@adobe.com' => 'CC 2 Address',
            'cc3@adobe.com' => 'CC 3 Address',
        ],
<<<<<<< HEAD
        'bcc' => [
            'bcc1@adobe.com' => 'BCC 1 Address',
            'bcc2@adobe.com' => 'BCC 2 Address'
        ],
=======
        'bcc' => ['bcc1@adobe.com', 'bcc2@adobe.com'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ];

    /**
     * @var string
     */
<<<<<<< HEAD
    private $subject = 'Test subject';
=======
    private $subject = 'Test=20subject';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var string
     */
    private $description = 'Test description';

    /**
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->di = Bootstrap::getObjectManager();
        $this->mimePartFactory = $this->di->get(MimePartInterfaceFactory::class);
        $this->mimeMessageFactory = $this->di->get(MimeMessageInterfaceFactory::class);
        $this->messageConverter = $this->di->get(AddressConverter::class);
        $this->messageFactory = $this->di->get(EmailMessageInterfaceFactory::class);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getEmailMessageDataProvider(): array
=======
    public function getEmailMessageDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'Content Test',
                MimeInterface::TYPE_TEXT
<<<<<<< HEAD
            ],
            [
=======
            ], [

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                '<h1>Html message</h1>',
                MimeInterface::TYPE_HTML
            ]
        ];
    }

    /**
     * Tests Email Message with Addresses
     *
<<<<<<< HEAD
=======
     * @dataProvider getEmailMessageDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param $content
     * @param $type
     * @return void
     * @throws MailException
     */
<<<<<<< HEAD
    #[DataProvider('getEmailMessageDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testEmailMessage($content, $type): void
    {
        $mimePart = $this->mimePartFactory->create(
            [
                'content' => $content,
                'description' => $this->description,
                'type' => $type
            ]
        );

        $mimeMessage = $this->mimeMessageFactory->create(
            [
                'parts' => [$mimePart]
            ]
        );

        $this->addressFactory = $this->di->get(AddressFactory::class);
        /** @var Address $addressTo */
        $to = [
            $this->addressFactory->create(
                [
                    'email' => $this->addressList['to'][0]['email'],
                    'name' => $this->addressList['to'][0]['name']
                ]
            )
        ];

        $from = [$this->messageConverter->convert($this->addressList['from'])];
        $cc = $this->messageConverter->convertMany($this->addressList['cc']);
        $replyTo = [
            $this->messageConverter->convert(
                $this->addressList['replyTo']['email'],
                $this->addressList['replyTo']['name']
            )
        ];
        $bcc = $this->messageConverter->convertMany($this->addressList['bcc']);
        $sender = $this->messageConverter->convert(
            $this->addressList['sender']['email'],
            $this->addressList['sender']['name']
        );
        $data = [
            'body' => $mimeMessage,
            'subject' => $this->subject,
            'from' => $from,
            'to' => $to,
            'cc' => $cc,
            'replyTo' => $replyTo,
            'bcc' => $bcc,
            'sender' => $sender,
        ];
        $message = $this->messageFactory->create($data);
<<<<<<< HEAD
        $messageString = $message->toString();

        $this->assertStringContainsString($content, $messageString);
        $this->assertStringContainsString('Content-Type: ' . $type, $messageString);
        $senderString = 'Sender: '
            . str_replace(' ', '=20', $sender->getName())
            . ' <'
            . $sender->getEmail()
            . '>';
        $this->assertStringContainsString($senderString, $messageString);
        $this->assertStringContainsString('From: ' . $from[0]->getEmail(), $messageString);
        $replyToString = 'Reply-To: '
            . $replyTo[0]->getName()
            . ' <'
            . $replyTo[0]->getEmail()
            . '>';
        $this->assertStringContainsString($replyToString, $messageString);
        $toString = 'To: '
            . $to[0]->getName()
            . ' <'
            . $to[0]->getEmail()
            . '>';
        $this->assertStringContainsString($toString, $messageString);
        $ccString = 'Cc: '
            .  $cc[0]->getName()
            . ' <'
            . $cc[0]->getEmail()
            . '>';
        $this->assertStringContainsString($ccString, $messageString);
        $this->assertStringNotContainsString('Bcc: ' . $bcc[0]->getEmail(), $messageString);
        $contentDescription = 'Content-Description: '
            . $this->description;
        $this->assertStringContainsString($contentDescription, $messageString);
        $this->assertStringContainsString(
            'Subject: ' . $this->subject,
            quoted_printable_decode($messageString)
        );
        $this->assertStringContainsString($content, $messageString);
=======

        $this->assertStringContainsString($content, $message->toString());
        $this->assertStringContainsString('Content-Type: ' . $type, $message->toString());
        $senderString = 'Sender: =?utf-8?Q?'
            . str_replace(' ', '=20', $sender->getName())
            . '?= <'
            . $sender->getEmail()
            . '>';
        $this->assertStringContainsString($senderString, $message->toString());
        $this->assertStringContainsString('From: ' . $from[0]->getEmail(), $message->toString());
        $replyToString = 'Reply-To: =?utf-8?Q?'
            . str_replace(' ', '=20', $replyTo[0]->getName())
            . '?= <'
            . $replyTo[0]->getEmail()
            . '>';
        $this->assertStringContainsString($replyToString, $message->toString());
        $toString = 'To: =?utf-8?Q?'
            . str_replace(' ', '=20', $to[0]->getName())
            . '?= <'
            . $to[0]->getEmail()
            . '>';
        $this->assertStringContainsString($toString, $message->toString());
        $ccString = 'Cc: =?utf-8?Q?'
            . str_replace(' ', '=20', $cc[0]->getName())
            . '?= <'
            . $cc[0]->getEmail()
            . '>';
        $this->assertStringContainsString($ccString, $message->toString());
        $this->assertStringContainsString('Bcc: ' . $bcc[0]->getEmail(), $message->toString());
        $contentDescription = 'Content-Description: =?UTF-8?Q?'
            . str_replace(' ', '=20', $this->description)
            . '?=';
        $this->assertStringContainsString($contentDescription, $message->toString());
        $this->assertStringContainsString(
            'Subject: =?UTF-8?Q?' . $this->subject,
            quoted_printable_decode($message->toString())
        );
        $this->assertStringContainsString($content, $message->toString());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        //tests address factory
        $this->assertInstanceOf(Address::class, $message->getTo()[0]);
        //tests address converter convert method
        $this->assertInstanceOf(Address::class, $message->getFrom()[0]);
        //tests address converter convertMany method
        $this->assertInstanceOf(Address::class, $message->getCc()[0]);
    }

    /**
     * Test Email Message with Xml Attachment
     *
     * @return void
     */
    public function testEmailMessageWithAttachment(): void
    {
        $mimePartMain = $this->mimePartFactory->create(
            [
<<<<<<< HEAD
                'content' => $this->getXmlContent(),
                'description' => $this->description,
                'type' => self::XML_TYPE,
                'fileName' => self::ATTACHMENT_FILE_NAME,
                'disposition' => MimeInterface::DISPOSITION_ATTACHMENT,
                'encoding' => MimeInterface::ENCODING_QUOTED_PRINTABLE
=======
                'content' => 'Test',
                'description' => $this->description,
                'type' => MimeInterface::TYPE_TEXT
            ]
        );
        $mimePartAttachment = $this->mimePartFactory->create(
            [
                'content' => $this->getXmlContent(),
                'disposition' => MimeInterface::DISPOSITION_ATTACHMENT,
                'fileName' => self::ATTACHMENT_FILE_NAME,
                'encoding' => MimeInterface::ENCODING_8BIT,
                'type' => self::XML_TYPE
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );

        $mimeMessage = $this->mimeMessageFactory->create(
            [
<<<<<<< HEAD
                'parts' => [$mimePartMain]
=======
                'parts' => [$mimePartMain, $mimePartAttachment]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        );

        $this->addressFactory = $this->di->get(AddressFactory::class);
        /** @var Address $addressTo */
        $addressTo = $this->addressFactory
            ->create(
                [
                    'email' => $this->addressList['to'][0]['email'],
                    'name' => $this->addressList['to'][0]['name']
                ]
            );

<<<<<<< HEAD
        $from = $this->addressFactory->create(
            [
                'email' => $this->addressList['from'],
                'name' => 'name'
            ]
        );

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $data = [
            'body' => $mimeMessage,
            'subject' => $this->subject,
            'to' => [$addressTo],
<<<<<<< HEAD
            'from' => [$from],
            'encoding' => '',
        ];
        $message = $this->messageFactory->create($data);
        $messageString = quoted_printable_decode($message->toString());

        $messageParsedString = str_replace("\r\n", "\n", $messageString);
        $this->assertStringContainsString($this->getXmlContent(), $messageParsedString);
        $this->assertStringContainsString('Content-Type: ' . self::XML_TYPE, $messageString);
        $contentDisposition = 'Content-Disposition: ' . MimeInterface::DISPOSITION_ATTACHMENT
            .'; name=' . self::ATTACHMENT_FILE_NAME . '; filename=' . self::ATTACHMENT_FILE_NAME;
=======
            'encoding' => '',
        ];
        $message = $this->messageFactory->create($data);

        $this->assertStringContainsString($this->getXmlContent(), $message->toString());
        $this->assertStringContainsString('Content-Type: ' . self::XML_TYPE, $message->toString());
        $contentDisposition = 'Content-Disposition: ' . MimeInterface::DISPOSITION_ATTACHMENT
            . '; filename="' . self::ATTACHMENT_FILE_NAME . '"';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertStringContainsString($contentDisposition, $message->toString());
    }

    /**
     * Provides xml content
     *
     * @return string
     */
    private function getXmlContent(): string
    {
        return '<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
    <type name="Magento\Framework\Console\CommandList">
        <arguments>
            <argument name="commands" xsi:type="array">
                <item name="furman_test_command_testbed" xsi:type="object">Furman\Test\Command\Testbed</item>
            </argument>
        </arguments>
    </type>
</config>
';
    }
}
