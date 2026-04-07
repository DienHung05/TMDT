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
/** @var \Magento\Paypal\Model\Billing\Agreement $billingAgreement */
$billingAgreement = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Paypal\Model\Billing\Agreement::class
)->setAgreementLabel(
    'TEST'
)->setCustomerId(
    1
)->setMethodCode(
    'paypal_express'
)->setReferenceId(
    'REF-ID-TEST-678'
)->setStatus(
    Magento\Paypal\Model\Billing\Agreement::STATUS_ACTIVE
)->setStoreId(
    1
)->save();
