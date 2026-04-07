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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Setup;

use Magento\Framework\App\ResourceConnection;
use Magento\Setup\Module\Setup\ResourceConfig;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ResourceConfigTest extends TestCase
{
    /**
<<<<<<< HEAD
     * @param string $resourceName
     */
    #[DataProvider('getConnectionNameDataProvider')]
=======
     * @dataProvider getConnectionNameDataProvider
     * @param string $resourceName
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetConnectionName($resourceName)
    {
        $connectionName = ResourceConnection::DEFAULT_CONNECTION;
        $resourceConfig = new ResourceConfig();
        $this->assertEquals($connectionName, $resourceConfig->getConnectionName($resourceName));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getConnectionNameDataProvider()
=======
    public function getConnectionNameDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'validResourceName' => ['validResourceName'],
            'invalidResourceName' => ['invalidResourceName'],
            'blankResourceName' => ['']
        ];
    }
}
