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

namespace Magento\Newsletter\Controller\Subscriber;

<<<<<<< HEAD
use Exception;
use Laminas\Stdlib\Parameters;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\AccountManagement;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url;
use Magento\Framework\App\Config\ScopeConfigInterface;
=======
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Newsletter\Model\ResourceModel\Subscriber as SubscriberResource;
use Magento\Newsletter\Model\ResourceModel\Subscriber\CollectionFactory;
use Magento\Newsletter\Model\ResourceModel\Subscriber\Grid\Collection as GridCollection;
<<<<<<< HEAD
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\TestCase\AbstractController;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\TestFramework\TestCase\AbstractController;
use Laminas\Stdlib\Parameters;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class checks subscription behaviour from frontend
 *
 * @magentoDbIsolation enabled
 * @see \Magento\Newsletter\Controller\Subscriber\NewAction
 */
class NewActionTest extends AbstractController
{
<<<<<<< HEAD
    /** @var CustomerRepositoryInterface */
    private $customerRepository;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /** @var Session */
    private $session;

    /** @var CollectionFactory */
    private $subscriberCollectionFactory;

    /** @var SubscriberResource */
    private $subscriberResource;

    /** @var string|null */
    private $subscriberToDelete;

<<<<<<< HEAD
=======
    /** @var CustomerRepositoryInterface */
    private $customerRepository;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /** @var Url */
    private $customerUrl;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->session = $this->_objectManager->get(Session::class);
        $this->subscriberCollectionFactory = $this->_objectManager->get(CollectionFactory::class);
        $this->subscriberResource = $this->_objectManager->get(SubscriberResource::class);
        $this->customerRepository = $this->_objectManager->get(CustomerRepositoryInterface::class);
        $this->customerUrl = $this->_objectManager->get(Url::class);
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        if ($this->subscriberToDelete) {
            $this->deleteSubscriber($this->subscriberToDelete);
        }

        parent::tearDown();
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider subscribersDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $email
     * @param string $expectedMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('subscribersDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testNewAction(string $email, string $expectedMessage): void
    {
        $this->subscriberToDelete = $email ? $email : null;
        $this->prepareRequest($email);
        $this->dispatch('newsletter/subscriber/new');

        $this->performAsserts($expectedMessage);
    }

    /**
<<<<<<< HEAD
     * @magentoConfigFixture current_store newsletter/general/active 1
     *
     * @return void
     */
    public function testNewActionWithSubscriptionConfigEnabled(): void
    {
        $email = 'good_subscription@example.com';
        $this->subscriberToDelete = $email;
        $this->prepareRequest($email);
        $this->dispatch('newsletter/subscriber/new');
        $subscriberCollection = $this->subscriberCollectionFactory->create();
        $subscriberCollection->addFieldToFilter('subscriber_email', $email)->setPageSize(1);
        $this->assertEquals(1, count($subscriberCollection));
        $this->assertEquals($email, $subscriberCollection->getFirstItem()->getEmail());
    }

    /**
     * @magentoConfigFixture current_store newsletter/general/active 0
     *
     * @return void
     */
    public function testNewActionWithSubscriptionConfigDisabled(): void
    {
        $email = 'bad_subscription@example.com';
        $this->prepareRequest($email);
        $this->dispatch('newsletter/subscriber/new');
        $subscriberCollection = $this->subscriberCollectionFactory->create();
        $subscriberCollection->addFieldToFilter('subscriber_email', $email)->setPageSize(1);
        $this->assertEquals(0, count($subscriberCollection));
    }

    /**
     * @return array
     */
    public static function subscribersDataProvider(): array
=======
     * @return array
     */
    public function subscribersDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'without_email' => [
                'email' => '',
<<<<<<< HEAD
                'expectedMessage' => '',
            ],
            'with_unused_email' => [
                'email' => 'not_used@example.com',
                'expectedMessage' => 'Thank you for your subscription.',
            ],
            'with_invalid_email' => [
                'email' => 'invalid_email.com',
                'expectedMessage' => 'Please enter a valid email address.'
=======
                'message' => '',
            ],
            'with_unused_email' => [
                'email' => 'not_used@example.com',
                'message' => 'Thank you for your subscription.',
            ],
            'with_invalid_email' => [
                'email' => 'invalid_email.com',
                'message' => 'Please enter a valid email address.'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/new_customer.php
<<<<<<< HEAD
     *
     * @return void
     */
    #[DataProvider('emailAndStatusDataProvider')]
=======
     * @dataProvider emailAndStatusDataProvider
     *
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testNewActionUsedEmail($email, $subscriptionType): void
    {
        $this->prepareRequest($email);
        $this->dispatch('newsletter/subscriber/new');

        /** @var GridCollection $gridCollection */
        $gridCollection = $this->_objectManager->create(GridCollection::class);
        $item = $gridCollection->getFirstItem();
        self::assertEquals($subscriptionType, (int)$item->getType());
        $this->performAsserts('Thank you for your subscription.');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function emailAndStatusDataProvider()
    {
        return [
            'email' => ['new_customer@example.com', 2],
            'subscriptionType' => ['not_a_customer@gmail.com', 1],
=======
    public function emailAndStatusDataProvider()
    {
        return [
            'customer' => ['new_customer@example.com', 2],
            'not_a_customer' => ['not_a_customer@gmail.com', 1],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/new_customer.php
     *
     * @return void
     */
    public function testNewActionOwnerEmail(): void
    {
        $this->prepareRequest('new_customer@example.com');
        $this->session->loginById(1);
        $this->dispatch('newsletter/subscriber/new');

        $this->performAsserts('Thank you for your subscription.');
    }

    /**
     * @magentoDataFixture Magento/Newsletter/_files/customer_with_subscription.php
     *
     * @return void
     */
    public function testAlreadyExistEmail(): void
    {
        $this->prepareRequest('new_customer@example.com');
        $this->dispatch('newsletter/subscriber/new');

        $this->performAsserts('This email address is already subscribed.');
    }

    /**
     * @magentoConfigFixture current_store newsletter/subscription/allow_guest_subscribe 0
     *
     * @return void
     */
    public function testWithNotAllowedGuestSubscription(): void
    {
        $message = sprintf(
            'Sorry, but the administrator denied subscription for guests. Please <a href="%s">register</a>.',
            $this->customerUrl->getRegisterUrl()
        );
        $this->subscriberToDelete = 'guest@example.com';
        $this->prepareRequest('guest@example.com');
        $this->dispatch('newsletter/subscriber/new');

        $this->performAsserts($message);
    }

    /**
     * @magentoConfigFixture current_store newsletter/subscription/allow_guest_subscribe 0
     *
     * @magentoDataFixture Magento/Customer/_files/new_customer.php
     *
     * @return void
     */
    public function testCustomerSubscribeUnrelatedEmailWithNotAllowedGuestSubscription(): void
    {
        $this->markTestSkipped('Blocked by MC-31662');
        $this->subscriberToDelete = 'guest@example.com';
        $this->session->loginById($this->customerRepository->get('new_customer@example.com')->getId());
        $this->prepareRequest('guest@example.com');
        $this->dispatch('newsletter/subscriber/new');
        //ToDo message need to be specified after bug MC-31662 fixing
        $this->performAsserts('');
    }

    /**
     * @magentoConfigFixture current_store newsletter/subscription/confirm 1
     *
     * @return void
     */
    public function testWithRequiredConfirmation(): void
    {
        $this->subscriberToDelete = 'guest@example.com';
        $this->prepareRequest('guest@example.com');
        $this->dispatch('newsletter/subscriber/new');

        $this->performAsserts('The confirmation request has been sent.');
    }

    /**
     * @magentoDataFixture Magento/Newsletter/_files/three_subscribers.php
     *
     * @return void
     */
    public function testWithEmailAssignedToAnotherCustomer(): void
    {
        $this->session->loginById(1);
        $this->prepareRequest('customer2@search.example.com');
        $this->dispatch('newsletter/subscriber/new');
<<<<<<< HEAD
        $scopeConfig = $this->_objectManager->get(ScopeConfigInterface::class);
        $guestLoginConfig = $scopeConfig->getValue(
            AccountManagement::GUEST_CHECKOUT_LOGIN_OPTION_SYS_CONFIG,
            ScopeInterface::SCOPE_WEBSITE,
            1
        );

        if ($guestLoginConfig) {
            $this->performAsserts('This email address is already assigned to another user.');
        } else {
            $this->performAsserts('This email address is already subscribed.');
        }
=======

        $this->performAsserts('This email address is already assigned to another user.');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Prepare request
     *
     * @param string $email
     * @return void
     */
    private function prepareRequest(string $email): void
    {
        $parameters = $this->_objectManager->create(Parameters::class);
        $parameters->set('HTTP_REFERER', 'http://localhost/testRedirect');
        $this->getRequest()->setServer($parameters);
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setPostValue(['email' => $email]);
    }

    /**
     * Assert session message and expected redirect
     *
     * @param string $message
     * @return void
     */
    private function performAsserts(string $message): void
    {
        if ($message) {
            $this->assertSessionMessages($this->equalTo([(string)__($message)]));
        }
        $this->assertRedirect($this->equalTo('http://localhost/testRedirect'));
    }

    /**
     * Delete subscribers by email
     *
     * @param string $email
<<<<<<< HEAD
     *
     * @return void
     * @throws Exception
=======
     * @return void
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    private function deleteSubscriber(string $email): void
    {
        $collection = $this->subscriberCollectionFactory->create();
        $item = $collection->addFieldToFilter('subscriber_email', $email)->setPageSize(1)->getFirstItem();
        if ($item->getId()) {
            $this->subscriberResource->delete($item);
        }
    }
}
