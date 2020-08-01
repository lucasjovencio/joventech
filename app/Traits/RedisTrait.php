<?php

namespace App\Traits;
use Illuminate\Support\Facades\Redis;

Trait RedisTrait
{
    private function setRedis(string $key,array $data)
    {
        Redis::set($key, \json_encode($data));
        return $this->getRedis($key);
    }

    private function getRedis(string $key)
    {
        return \json_decode(Redis::get($key));
    }

    private function getCollectRedis(string $key)
    {
        return collect($this->getRedis($key));
    }

    private function findRedis(string $key,$id)
    {
        return $this->getCollectRedis($key)->firstWhere('id',$id);
    }
}