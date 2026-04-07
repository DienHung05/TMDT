<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Webapi\Controller\Rest;

use Magento\TestFramework\TestCase\AbstractController;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class SchemaRequestProcessorTest extends AbstractController
{
    /**
     * Test that the rest controller returns the correct schema response.
     *
     * @param string $path
<<<<<<< HEAD
     */
    #[DataProvider('schemaRequestProvider')]
=======
     * @dataProvider schemaRequestProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSchemaRequest($path)
    {
        ob_start();
        $this->dispatch($path);
        ob_end_clean();
        $schema = $this->getResponse()->getBody();

        // Check that an HTTP 200 response status is visible in the schema.
        $this->assertMatchesRegularExpression('/200 Success/', $schema);
    }

    /**
     * Response getter
     *
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function getResponse()
    {
        if (!$this->_response) {
            $this->_response = $this->_objectManager->get(\Magento\Framework\Webapi\Rest\Response::class);
        }
        return $this->_response;
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function schemaRequestProvider()
=======
    public function schemaRequestProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['rest/schema'],
            ['rest/schema?services=all'],
            ['rest/all/schema?services=all'],
            ['rest/default/schema?services=all'],
            ['rest/schema?services=all'],
        ];
    }
}
