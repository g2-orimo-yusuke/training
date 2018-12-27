<?php

namespace classes;

/**
 * memcacheクラス
 *
 * Class memcache
 * @package classes
 */
class memcache
{
    private const PORT = 11211;

    /**
     * memcacheとの接続を確立する。
     *
     * @return \Memcached
     */
    public static function connect()
    {
        $mem = new \Memcached();
        $mem->addServer(LOCAL_HOST, self::PORT);
        return $mem;
    }

}