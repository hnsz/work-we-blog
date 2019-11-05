<?php
namespace App\SeedDataProviders;

use App\Contracts\SeedDataProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Cache;
 
class CachedSeedDataProvider implements SeedDataProvider
{
    private $sdprov;
    private $cache;


    public function  __construct(Cache\Repository $cache, SeedDataProvider $sdprov)
    {
        
        
        $this->cache = $cache;
        $this->sdprov = $sdprov;
        
    }
    private function cacheSet() //update?
    {
        
        $this->cache->set($this->sdprof->class, $this->sdprov->json());
    }


    public function json()
    {
        return $this->sdprov->json();
    }

    public function get()
    {
        return $this->sdprov->get();
    }

}
