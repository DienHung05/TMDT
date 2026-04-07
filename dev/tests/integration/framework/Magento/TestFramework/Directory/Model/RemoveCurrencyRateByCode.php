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

namespace Magento\TestFramework\Directory\Model;

use Magento\Directory\Model\ResourceModel\Currency;

/**
 * Remove currency rates by currency code
 */
class RemoveCurrencyRateByCode
{
    /** @var Currency  */
    private $currencyResource;

    /**
     * @param Currency $currencyResource
     */
    public function __construct(Currency $currencyResource)
    {
        $this->currencyResource = $currencyResource;
    }

    /**
     * Remove currency rates
     *
     * @param string $currencyCode
     * @return void
     */
    public function execute(string $currencyCode): void
    {
        $connection = $this->currencyResource->getConnection();
        $rateTable = $this->currencyResource->getTable('directory_currency_rate');
        $connection->delete($rateTable, $connection->quoteInto('currency_to = ? OR currency_from = ?', $currencyCode));
    }
}
