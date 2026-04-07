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

namespace Magento\Customer\Controller\Adminhtml;

<<<<<<< HEAD
use Magento\Backend\Block\Template\Context;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Backend\Model\Session;
use Magento\Customer\Api\CustomerNameGenerationInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\EmailNotification;
<<<<<<< HEAD
use Magento\Framework\Acl\Builder;
use Magento\Framework\App\Area;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Mail\TransportInterface;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\Bootstrap;
use Magento\TestFramework\Helper\Bootstrap as BootstrapHelper;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\TestFramework\TestCase\AbstractBackendController;
use PHPUnit\Framework\MockObject\MockObject;
=======
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\TestFramework\TestCase\AbstractBackendController;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class IndexTest extends AbstractBackendController
{
    /**
<<<<<<< HEAD
=======
     * Base controller URL
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var string
     */
    private $baseControllerUrl = 'backend/customer/index/';

    /** @var CustomerRepositoryInterface */
    private $customerRepository;

    /** @var CustomerNameGenerationInterface */
    private $customerViewHelper;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->customerRepository = $this->_objectManager->get(CustomerRepositoryInterface::class);
        $this->customerViewHelper = $this->_objectManager->get(CustomerNameGenerationInterface::class);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        /**
         * Unset customer data
         */
        $this->_objectManager->get(Session::class)->setCustomerData(null);

        /**
         * Unset messages
         */
        $this->_objectManager->get(Session::class)->getMessages(true);
    }

    /**
     * Ensure that an email is sent during inlineEdit action
     *
     * @magentoConfigFixture current_store customer/account_information/change_email_template change_email_template
     * @magentoConfigFixture current_store customer/password/forgot_email_identity support
     * @magentoDataFixture Magento/Customer/_files/customer_sample.php
     */
    public function testInlineEditChangeEmail()
    {
        $customerId = 1;
        $newEmail = 'newcustomer@example.com';
        $transportBuilderMock = $this->prepareEmailMock(
            2,
            'change_email_template',
            [
                'name' => 'CustomerSupport',
                'email' => 'support@example.com',
            ],
            $customerId,
            $newEmail
        );
        $this->addEmailMockToClass($transportBuilderMock, EmailNotification::class);
        $post = [
            'items' => [
                $customerId => [
                    'middlename' => 'test middlename',
                    'group_id' => 1,
                    'website_id' => 1,
                    'firstname' => 'test firstname',
                    'lastname' => 'test lastname',
                    'email' => $newEmail,
                    'password' => 'password',
                ],
            ]
        ];
        $this->getRequest()->setParam('ajax', true)->setParam('isAjax', true);
        $this->getRequest()->setPostValue($post)->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setParam('id', 1);
        $this->dispatch('backend/customer/index/inlineEdit');

        /**
         * Check that no errors were generated and set to session
         */
<<<<<<< HEAD
        $this->assertSessionMessages($this->isEmpty(), MessageInterface::TYPE_ERROR);
=======
        $this->assertSessionMessages($this->isEmpty(), \Magento\Framework\Message\MessageInterface::TYPE_ERROR);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer_sample.php
     */
    public function testEditAction()
    {
        $this->getRequest()->setParam('id', 1);
        $this->dispatch('backend/customer/index/edit');
        $body = $this->getResponse()->getBody();

        // verify
        $this->assertStringContainsString('<h1 class="page-title">test firstname test lastname</h1>', $body);
    }

    /**
     * Test new customer form page.
     */
    public function testNewAction()
    {
        $this->dispatch('backend/customer/index/edit');
        $body = $this->getResponse()->getBody();

        // verify
        $this->assertStringContainsString('<h1 class="page-title">New Customer</h1>', $body);
    }

    /**
     * Test the editing of a new customer that has not been saved but the page has been reloaded
     */
    public function te1stNewActionWithCustomerData()
    {
        $customerData = [
            'customer_id' => 0,
            'customer' => [
                'created_in' => false,
                'disable_auto_group_change' => false,
                'email' => false,
                'firstname' => false,
                'group_id' => false,
                'lastname' => false,
                'website_id' => false,
                'customer_address' => [],
            ],
        ];
<<<<<<< HEAD
        $context = BootstrapHelper::getObjectManager()->get(Context::class);
=======
        $context = Bootstrap::getObjectManager()->get(\Magento\Backend\Block\Template\Context::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $context->getBackendSession()->setCustomerData($customerData);
        $this->testNewAction();
    }

    /**
     * @magentoDbIsolation enabled
     */
    public function testResetPasswordActionNoCustomerId()
    {
        // No customer ID in post, will just get redirected to base
        $this->getRequest()->setMethod(HttpRequest::METHOD_GET);
        $this->dispatch('backend/customer/index/resetPassword');
        $this->assertRedirect($this->stringContains($this->baseControllerUrl));
    }

    /**
     * @magentoDbIsolation enabled
     */
    public function testResetPasswordActionBadCustomerId()
    {
        // Bad customer ID in post, will just get redirected to base
        $this->getRequest()->setMethod(HttpRequest::METHOD_GET);
        $this->getRequest()->setPostValue(['customer_id' => '789']);
        $this->dispatch('backend/customer/index/resetPassword');
        $this->assertRedirect($this->stringContains($this->baseControllerUrl));
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testResetPasswordActionSuccess()
    {
        $this->getRequest()->setPostValue(['customer_id' => '1']);
        $this->getRequest()->setMethod(HttpRequest::METHOD_GET);
        $this->dispatch('backend/customer/index/resetPassword');
        $this->assertSessionMessages(
            $this->equalTo(['The customer will receive an email with a link to reset password.']),
<<<<<<< HEAD
            MessageInterface::TYPE_SUCCESS
=======
            \Magento\Framework\Message\MessageInterface::TYPE_SUCCESS
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $this->assertRedirect($this->stringContains($this->baseControllerUrl . 'edit'));
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testAclDeleteActionAllow()
    {
        $this->getRequest()->setParam('id', 1);
        $this->dispatch('backend/customer/index/edit');
        $body = $this->getResponse()->getBody();
        $this->assertStringContainsString('Delete Customer', $body);
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testAclDeleteActionDeny()
    {
        $resource= 'Magento_Customer::delete';
<<<<<<< HEAD
        $this->_objectManager->get(Builder::class)
            ->getAcl()
            ->deny(Bootstrap::ADMIN_ROLE_ID, $resource);
=======
        $this->_objectManager->get(\Magento\Framework\Acl\Builder::class)
            ->getAcl()
            ->deny(null, $resource);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->getRequest()->setParam('id', 1);
        $this->dispatch('backend/customer/index/edit');
        $body = $this->getResponse()->getBody();
        $this->assertStringNotContainsString('Delete Customer', $body);
    }

    /**
     * Prepare email mock to test emails.
     *
     * @param int $occurrenceNumber
     * @param string $templateId
     * @param array $sender
     * @param int $customerId
     * @param string|null $newEmail
<<<<<<< HEAD
     * @return MockObject
=======
     * @return \PHPUnit\Framework\MockObject\MockObject
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    protected function prepareEmailMock(
        int $occurrenceNumber,
        string $templateId,
        array $sender,
        int $customerId,
        $newEmail = null
<<<<<<< HEAD
    ) : MockObject {
        $area = Area::AREA_FRONTEND;
=======
    ) : \PHPUnit\Framework\MockObject\MockObject {
        $area = \Magento\Framework\App\Area::AREA_FRONTEND;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $customer = $this->customerRepository->getById($customerId);
        $storeId = $customer->getStoreId();
        $name = $this->customerViewHelper->getCustomerName($customer);

<<<<<<< HEAD
        $transportMock = $this->getMockBuilder(TransportInterface::class)
            ->onlyMethods(['sendMessage', 'getMessage'])
            ->getMock();
        $transportMock->expects($this->exactly($occurrenceNumber))
            ->method('sendMessage');
        $transportMock->method('getMessage')
            ->willReturn(null);
        $transportBuilderMock = $this->getMockBuilder(TransportBuilder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(
=======
        $transportMock = $this->getMockBuilder(\Magento\Framework\Mail\TransportInterface::class)
            ->setMethods(['sendMessage'])
            ->getMockForAbstractClass();
        $transportMock->expects($this->exactly($occurrenceNumber))
            ->method('sendMessage');
        $transportBuilderMock = $this->getMockBuilder(\Magento\Framework\Mail\Template\TransportBuilder::class)
            ->disableOriginalConstructor()
            ->setMethods(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'addTo',
                    'setFrom',
                    'setTemplateIdentifier',
                    'setTemplateVars',
                    'setTemplateOptions',
                    'getTransport',
                ]
            )
            ->getMock();
        $transportBuilderMock->method('setTemplateIdentifier')
            ->with($templateId)
            ->willReturnSelf();
        $transportBuilderMock->method('setTemplateOptions')
            ->with(['area' => $area, 'store' => $storeId])
            ->willReturnSelf();
        $transportBuilderMock->method('setTemplateVars')
            ->willReturnSelf();
        $transportBuilderMock->method('setFrom')
            ->with($sender)
            ->willReturnSelf();
        $transportBuilderMock->method('addTo')
            ->with($this->logicalOr($customer->getEmail(), $newEmail), $name)
            ->willReturnSelf();
        $transportBuilderMock->expects($this->exactly($occurrenceNumber))
            ->method('getTransport')
            ->willReturn($transportMock);

        return $transportBuilderMock;
    }

    /**
<<<<<<< HEAD
     * @param MockObject $transportBuilderMock
     * @param string $className
     */
    protected function addEmailMockToClass(
        MockObject $transportBuilderMock,
=======
     * @param \PHPUnit\Framework\MockObject\MockObject $transportBuilderMock
     * @param string $className
     */
    protected function addEmailMockToClass(
        \PHPUnit\Framework\MockObject\MockObject $transportBuilderMock,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $className
    ) {
        $mocked = $this->_objectManager->create(
            $className,
            ['transportBuilder' => $transportBuilderMock]
        );
        $this->_objectManager->addSharedInstance(
            $mocked,
            $className
        );
    }
}
