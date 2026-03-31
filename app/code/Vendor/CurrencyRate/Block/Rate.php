<?php

namespace Vendor\CurrencyRate\Block;

use Magento\Framework\View\Element\Template;
use Vendor\CurrencyRate\Model\RateCache;
use Vendor\CurrencyRate\Model\VietcombankApi;

class Rate extends Template
{
    protected $cache;
    protected $api; // 👈 THIẾU CÁI NÀY

    public function __construct(
        Template\Context $context,
        RateCache $cache,
        VietcombankApi $api, // 👈 inject ở đây
        array $data = []
    ) {
        $this->cache = $cache;
        $this->api = $api; // 👈 gán vào property
        parent::__construct($context, $data);
    }

    public function getRates()
    {
        return $this->api->fetchRates(); // test trực tiếp API
    }
}
