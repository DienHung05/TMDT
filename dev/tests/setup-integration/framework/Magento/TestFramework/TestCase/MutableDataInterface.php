<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\TestCase;

/**
 * This interface allows to add data to test case dynamically, for example from startTest listeners
 * in order to reuse it later.
 */
interface MutableDataInterface
{
    /**
     * Set data providers data.
     *
     * @param  array $data
     * @return void
     */
<<<<<<< HEAD
    public function setData(int|string $dataName, array $data);
=======
    public function setData(array $data);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Retrieve data injected dynamically in test case.
     *
     * @return array
     */
    public function getData();

    /**
     * Revert data to default dataProviders data.
     *
     * @return void
     */
    public function flushData();
}
