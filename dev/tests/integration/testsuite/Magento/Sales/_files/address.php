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
/** @var $address \Magento\Sales\Model\Order\Address */
$address = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Sales\Model\Order\Address::class
);
$address->setRegion(
    'CA'
)->setPostcode(
    '90210'
)->setFirstname(
    'a_unique_firstname'
)->setLastname(
    'lastname'
)->setStreet(
    'street'
)->setCity(
    'Beverly Hills'
)->setEmail(
    'admin@example.com'
)->setTelephone(
    '1111111111'
)->setCountryId(
    'US'
)->setAddressType(
    'shipping'
)->save();
