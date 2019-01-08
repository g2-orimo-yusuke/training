<?php

namespace config;

/**
 * cacheに関するconfigクラス
 *
 * Class cache
 * @package config
 */
class Cache
{
    public const CACHE_NAME_REDIS = 'redis';
    public const CACHE_NAME_MEMCACHED = 'memcached';

    // cacheとして使用するインメモリDB名を記述
    public const USE_CACHE = self::CACHE_NAME_REDIS;

    // インメモリDBのアクセス情報
    public static $arrConnectInfo = [
        'redis' => [
            'host' => LOCAL_HOST,
            'port' => 6379,
        ],

        'memcached' => [
            'host' => LOCAL_HOST,
            'port' => 11211,
        ],
    ];

}