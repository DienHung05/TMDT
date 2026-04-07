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

namespace Magento\Newsletter\Model\ResourceModel\Subscriber;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Newsletter\Model\ResourceModel\Subscriber\Collection
     */
    protected $_collectionModel;

    protected function setUp(): void
    {
        $this->_collectionModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Newsletter\Model\ResourceModel\Subscriber\Collection::class);
    }

    /**
     * @magentoDataFixture Magento/Newsletter/_files/subscribers.php
     */
    public function testShowCustomerInfo()
    {
        $this->_collectionModel->showCustomerInfo()->load();

        /** @var \Magento\Newsletter\Model\Subscriber[] $subscribers */
        $subscribers = $this->_collectionModel->getItems();
        $this->assertCount(3, $subscribers);

        while ($subscribers) {
            $subscriber = array_shift($subscribers);
            if ($subscriber->getCustomerId()) {
                $this->assertEquals('John', $subscriber->getFirstname(), $subscriber->getSubscriberEmail());
                $this->assertEquals('Smith', $subscriber->getLastname(), $subscriber->getSubscriberEmail());
            } else {
                $this->assertNull($subscriber->getFirstname(), $subscriber->getSubscriberEmail());
                $this->assertNull($subscriber->getLastname(), $subscriber->getSubscriberEmail());
            }
        }
    }
}
