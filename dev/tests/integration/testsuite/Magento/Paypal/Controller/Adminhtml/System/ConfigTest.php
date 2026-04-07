<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Paypal\Controller\Adminhtml\System;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
class ConfigTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     *
<<<<<<< HEAD
=======
     * @dataProvider saveMerchantCountryDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $section
     * @param array $groups
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('saveMerchantCountryDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveMerchantCountry(string $section, array $groups): void
    {
        /** @var ScopeConfigInterface $scopeConfig */
        $scopeConfig = Bootstrap::getObjectManager()->get(ScopeConfigInterface::class);

        $request = $this->getRequest();
        $request->setPostValue($groups)
            ->setParam('section', $section)
            ->setMethod(HttpRequest::METHOD_POST);

        $this->dispatch('backend/admin/system_config/save');

        $this->assertSessionMessages($this->equalTo(['You saved the configuration.']));

        $this->assertEquals(
            'GB',
            $scopeConfig->getValue('paypal/general/merchant_country')
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function saveMerchantCountryDataProvider(): array
=======
    public function saveMerchantCountryDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'section' => 'paypal',
                'groups' => [
                    'groups' => [
                        'general' => [
                            'fields' => [
                                'merchant_country' => ['value' => 'GB'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'section' => 'payment',
                'groups' => [
                    'groups' => [
                        'account' => [
                            'fields' => [
                                'merchant_country' => ['value' => 'GB'],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
