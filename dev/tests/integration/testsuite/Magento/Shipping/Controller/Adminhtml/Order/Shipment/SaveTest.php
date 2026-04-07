<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
declare(strict_types=1);

namespace Magento\Shipping\Controller\Adminhtml\Order\Shipment;

use PHPUnit\Framework\Constraint\StringContains;

/**
 * Class verifies shipment creation functionality.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 * @magentoDataFixture Magento/Sales/_files/order.php
 */
class SaveTest extends AbstractShipmentControllerTest
{
    /**
     * @var string
     */
<<<<<<< HEAD
    protected $resource = 'Magento_Sales::ship';

    /**
     * @var string
     */
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    protected $uri = 'backend/admin/order_shipment/save';

    /**
     * @return void
     */
    public function testSendEmailOnShipmentSave(): void
    {
        $tracking = [
            [
                'number' => 'some_racking_number',
                'title' => 'some_tracking_title',
                'carrier_code' => 'carrier_code'
            ]
        ];
        $order = $this->prepareRequest(['shipment' => ['send_email' => true], 'tracking' => $tracking]);
        $this->dispatch('backend/admin/order_shipment/save');

        $this->assertSessionMessages(
            $this->equalTo([(string)__('The shipment has been created.')]),
            \Magento\Framework\Message\MessageInterface::TYPE_SUCCESS
        );
        $this->assertRedirect($this->stringContains('sales/order/view/order_id/' . $order->getEntityId()));

        $shipment = $this->getShipment($order);
        $message = $this->transportBuilder->getSentMessage();
        $subject = __('Your %1 order has shipped', $order->getStore()->getFrontendName())->render();
        $messageConstraint = $this->logicalAnd(
            new StringContains($order->getBillingAddress()->getName()),
            new StringContains(
                'Thank you for your order from ' . $shipment->getStore()->getFrontendName()
            ),
            new StringContains(
                "Your Shipment #{$shipment->getIncrementId()} for Order #{$order->getIncrementId()}"
            ),
            new StringContains(
                'some_tracking_title'
            ),
            new StringContains(
                'some_racking_number'
            ),
            new StringContains(
                'shipping/tracking/popup?hash='
            )
        );

        $this->assertEquals($message->getSubject(), $subject);
<<<<<<< HEAD
        $this->assertThat(quoted_printable_decode($message->getBody()->bodyToString()), $messageConstraint);
=======
        $this->assertThat($message->getBody()->getParts()[0]->getRawContent(), $messageConstraint);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @inheritdoc
     */
    public function testAclHasAccess()
    {
        $this->prepareRequest();

        parent::testAclHasAccess();
    }

    /**
     * @inheritdoc
     */
    public function testAclNoAccess()
    {
        $this->prepareRequest();

        parent::testAclNoAccess();
    }

    /**
     * @param array $params
     * @return \Magento\Sales\Api\Data\OrderInterface|null
     */
    private function prepareRequest(array $params = [])
    {
        $order = $this->getOrder('100000001');
        $this->getRequest()->setMethod('POST');
        $this->getRequest()->setParams(
            [
                'order_id' => $order->getEntityId(),
                'form_key' => $this->formKey->getFormKey(),
            ]
        );

<<<<<<< HEAD
        $this->getRequest()->setPostValue($params);
=======
        $data = $params ?? [];
        $this->getRequest()->setPostValue($data);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $order;
    }
}
