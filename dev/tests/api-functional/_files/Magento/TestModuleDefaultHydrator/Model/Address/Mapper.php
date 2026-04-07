<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestModuleDefaultHydrator\Model\Address;

use Magento\Framework\EntityManager\MapperInterface;

/**
 * Class Mapper
 */
class Mapper implements MapperInterface
{
    /**
     * {@inheritdoc}
     */
    public function entityToDatabase($entityType, $data)
    {
        $data['street'] = implode("\n", $data['street']);
        $data['region_id'] = $data['region']['region_id'];
        $data['region_code'] = $data['region']['region_code'];
        $data['region'] = $data['region']['region'];
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function databaseToEntity($entityType, $data)
    {
        $data['street'] = explode("\n", $data['street']);
        $region = [
            'region' => $data['region'],
            'region_code' => $data['region_code'],
            'region_id' => $data['region_id']
        ];
        $data['region'] = $region;
        unset($data['region_id'], $data['region_code']);
        return $data;
    }
}
