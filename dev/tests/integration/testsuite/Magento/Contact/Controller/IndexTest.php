<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Contact\Controller;

use Magento\Framework\App\Request\Http as HttpRequest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Contact index controller test
 */
class IndexTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * Test contacting.
     */
    public function testPostAction()
    {
        $params = [
            'name' => 'customer name',
            'comment' => 'comment',
            'email' => 'user@example.com',
            'hideit' => '',
        ];
        $this->getRequest()->setPostValue($params)->setMethod(HttpRequest::METHOD_POST);

        $this->dispatch('contact/index/post');
        $this->assertRedirect($this->stringContains('contact/index'));
        $this->assertSessionMessages(
            $this->containsEqual(
                "Thanks for contacting us with your comments and questions. We&#039;ll respond to you very soon."
            ),
            \Magento\Framework\Message\MessageInterface::TYPE_SUCCESS
        );
    }

    /**
     * Test validation.
     *
     * @param array $params For Request.
     * @param string $expectedMessage Expected response.
<<<<<<< HEAD
     */
    #[DataProvider('dataInvalidPostAction')]
=======
     *
     * @dataProvider dataInvalidPostAction
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testInvalidPostAction($params, $expectedMessage)
    {
        $this->getRequest()->setPostValue($params)->setMethod(HttpRequest::METHOD_POST);

        $this->dispatch('contact/index/post');
        $this->assertRedirect($this->stringContains('contact/index'));
        $this->assertSessionMessages(
            $this->containsEqual($expectedMessage),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
        );
    }

    /**
     * @return array
     */
    public static function dataInvalidPostAction()
    {
        return [
            'missing_comment' => [
<<<<<<< HEAD
                [  // $params
=======
                'params' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'name' => 'customer name',
                    'comment' => '',
                    'email' => 'user@example.com',
                    'hideit' => '',
                ],
<<<<<<< HEAD
                "Enter the comment and try again.",  // $expectedMessage
            ],
            'missing_name' => [
                [  // $params
=======
                'expectedMessage' => "Enter the comment and try again.",
            ],
            'missing_name' => [
                'params' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'name' => '',
                    'comment' => 'customer comment',
                    'email' => 'user@example.com',
                    'hideit' => '',
                ],
<<<<<<< HEAD
                "Enter the Name and try again.",  // $expectedMessage
            ],
            'invalid_email' => [
                [  // $params
=======
                'expectedMessage' => "Enter the Name and try again.",
            ],
            'invalid_email' => [
                'params' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'name' => 'customer name',
                    'comment' => 'customer comment',
                    'email' => 'invalidemail',
                    'hideit' => '',
                ],
<<<<<<< HEAD
                "The email address is invalid. Verify the email address and try again.",  // $expectedMessage
=======
                'expectedMessage' => "The email address is invalid. Verify the email address and try again.",
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
