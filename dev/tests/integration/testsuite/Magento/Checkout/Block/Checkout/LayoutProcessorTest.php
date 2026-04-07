<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Checkout\Block\Checkout;

use Magento\Framework\App\Config\MutableScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

class LayoutProcessorTest extends TestCase
{
    /**
     * Tests default country for shipping address.
     *
     * @param string $defaultCountryId
     * @param bool $isCountryValueExpected
     * @magentoConfigFixture default_store checkout/options/display_billing_address_on 1
     * @magentoDataFixture Magento/Backend/_files/allowed_countries_fr.php
<<<<<<< HEAD
     */
    #[DataProvider('defaultCountryDataProvider')]
=======
     * @dataProvider defaultCountryDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testShippingAddressCountryId(string $defaultCountryId, bool $isCountryValueExpected): void
    {
        /** @var MutableScopeConfigInterface $mutableConfig */
        $mutableConfig = Bootstrap::getObjectManager()->get(MutableScopeConfigInterface::class);
        $mutableConfig->setValue('general/country/default', $defaultCountryId, ScopeInterface::SCOPE_STORE, 'default');

        /** @var $layoutProcessor LayoutProcessor */
        $layoutProcessor = Bootstrap::getObjectManager()->get(LayoutProcessor::class);

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
        ['children']['shippingAddress']['children']['shipping-address-fieldset']['children'] = [];
        $data = $layoutProcessor->process($jsLayout);

        $countryId = $data["components"]["checkout"]["children"]["steps"]["children"]["shipping-step"]["children"]
        ["shippingAddress"]["children"]["shipping-address-fieldset"]["children"]["country_id"];

        $isCountryValueExists = array_key_exists('value', $countryId);

        $this->assertEquals($isCountryValueExpected, $isCountryValueExists);
        if ($isCountryValueExpected) {
            $this->assertEquals($defaultCountryId, $countryId['value']);
        }
    }

    /**
     * @return array[]
     */
<<<<<<< HEAD
    public static function defaultCountryDataProvider(): array
=======
    public function defaultCountryDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Default country isn\'t in allowed country list' => [
                'defaultCountryId' => 'US',
                'isCountryValueExpected' => false
            ],
            'Default country is in allowed country list' => [
                'defaultCountryId' => 'FR',
                'isCountryValueExpected' => true
            ],
        ];
    }
}
