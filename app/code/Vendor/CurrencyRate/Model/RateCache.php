<?php
namespace Vendor\CurrencyRate\Model;

use Magento\Framework\App\CacheInterface;

class RateCache
{
    const CACHE_KEY = 'vietcombank_rates';
    const CACHE_TTL = 3600; // 1h

    protected $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    public function save($data)
    {
        $this->cache->save(
            json_encode($data),
            self::CACHE_KEY,
            [],
            self::CACHE_TTL
        );
    }

    public function load()
    {
        $data = $this->cache->load(self::CACHE_KEY);

        return $data ? json_decode($data, true) : [];
    }
}
