<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
<<<<<<< HEAD
use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer_group_rollback.php');

$objectManager = Bootstrap::getObjectManager();
/** @var Registry $registry */
$registry = $objectManager->get(Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);
/** @var CustomerRepositoryInterface $customerRepo */
$customerRepo = $objectManager->get(CustomerRepositoryInterface::class);
$addressRepo = $objectManager->get(AddressRepositoryInterface::class);
try {
    $customer = $customerRepo->get('secondcustomer@example.com');
    foreach ($customer->getAddresses() as $address) {
        $addressRepo->delete($address);
    }
    $customerRepo->delete($customer);
    // phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
} catch (NoSuchEntityException $exception) {
    //Already deleted
}
<<<<<<< HEAD
/** Remove customer group */
/** @var GroupRepositoryInterface $groupRepository */
$groupRepository = $objectManager->create(GroupRepositoryInterface::class);
/** @var SearchCriteriaBuilder $searchBuilder */
$searchBuilder = $objectManager->create(SearchCriteriaBuilder::class);
foreach ($groupRepository->getList($searchBuilder->create())->getItems() as $group) {
    if ('custom_group_2' === $group->getCode()) {
        $groupRepository->delete($group);
    }
}
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
