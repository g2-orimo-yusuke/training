<?php

namespace classes\cache;

use config\cache;

/**
 * cacheクラス
 *
 * Class base
 * @package classes
 */
class base
{
    private $instance;

    public function __construct()
    {
        switch (cache::USE_CACHE) {
            case cache::CACHE_NAME_REDIS :
                $this->instance = new \classes\cache\redis();
                break;
            case cache::CACHE_NAME_MEMCACHED :
                $this->instance = new \classes\cache\memcached();
        }
    }

    /**
     * cacheにkeyとvalueの組み合わせで格納する。
     *
     * @param string $key
     * @param        $value
     */
    public function add(string $key, $value)
    {
        $this->instance->add($key, $value);
    }

    /**
     * cacheからkeyに対応するvalueを取り出す。
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->instance->get($key);
    }

    /**
     * cacheからkeyとそれに対応するvalueを削除する。
     *
     * @param string $key
     */
    public function delete(string $key)
    {
        $this->instance->delete($key);
    }

    /**
     * cacheサーバーとの接続を切断する。
     */
    public function quit()
    {
        $this->instance->quit();
    }

}