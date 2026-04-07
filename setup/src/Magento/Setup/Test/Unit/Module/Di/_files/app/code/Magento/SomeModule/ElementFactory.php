<?php
/**
<<<<<<< HEAD
 * Copyright 2011 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\SomeModule;

use Magento\Framework\ObjectManagerInterface;

<<<<<<< HEAD
=======
require_once __DIR__ . '/Element.php';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class ElementFactory
{
    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
<<<<<<< HEAD
     * @param array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->_objectManager->create(\Magento\SomeModule\Element::class, ['data' => $data]);
=======
     * @param string $className
     * @param array $data
     * @return mixed
     */
    public function create($className, array $data = [])
    {
        $instance = $this->_objectManager->create($className, $data);
        return $instance;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
