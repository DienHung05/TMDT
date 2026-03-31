<?php
namespace Vendor\CurrencyRate\Cron;

use Vendor\CurrencyRate\Model\VietcombankApi;
use Vendor\CurrencyRate\Model\RateCache;

class UpdateRates
{
    protected $api;
    protected $cache;

    public function __construct(
        VietcombankApi $api,
        RateCache $cache
    ) {
        $this->api = $api;
        $this->cache = $cache;
    }

    public function execute()
    {
        $rates = $this->api->fetchRates();

        if (!empty($rates)) {
            $this->cache->save($rates);
        }
    }
}
