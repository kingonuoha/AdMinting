<?php

namespace App\Facebook;


use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\Log;
use Facebook\PersistentData\PersistentDataInterface;

class CachePersistentDataHandler implements PersistentDataInterface
{
    protected $cache;

    public function __construct(CacheManager $cache)
    {
        $this->cache = $cache;
    }

    public function get($key)
    { 
         $value = $this->cache->get($key);
        Log::info("PersistentDataHandler get key: $key, value: $value");
        return $value;
    }
    
    public function set($key, $value)
    {
        Log::info("Storing key: {$key} with value: {$value}");
        $this->cache->put($key, $value, 300); // Store for 5 minutes
    }
}
