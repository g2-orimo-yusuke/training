<?php

namespace classes\cache;

use classes\Config;

/**
 * Memcachedを使ったcache操作クラス
 *
 * Class memcached
 * @package classes\cache
 */
class Memcached
{
    private $memcached;

    public function __construct()
    {
        $this->memcached = new \Memcached();
        $this->memcached->addServer(Config::getCacheConnectInfo('host'), Config::getCacheConnectInfo('port'));
    }

    /**
     * cacheにkeyとvalueの組み合わせで格納する。
     *
     * @param string $key
     * @param        $value
     */
    public function add(string $key, $value)
    {
        $this->memcached->add($key, $value);
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
        return $this->memcached->get($key) ?? null;
    }

    /**
     * cacheからkeyとそれに対応するvalueを削除する。
     *
     * @param string $key
     */
    public function delete(string $key)
    {
        $this->memcached->delete($key);
    }

    /**
     * cacheサーバーとの接続を切断する。
     */
    public function quit()
    {
        $this->memcached->quit();
    }

    /**
     * cacheに渡されたkeyが存在するか判定する。
     * true: 存在する
     * false: 存在しない
     *
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key)
    {
        if ($this->memcached->get($key)) {
            return true;
        } else {
            return false;
        }
    }

    public function zAdd(string $key, float $score, string $value)
    {

    }

    public function zIncrBy(string $key, float $score, string $member) {

    }

    public function zDelete(string $key, string $member)
    {

    }

    public function zCount(string $key, $min, $max)
    {
        return 0;
    }

    public function zRevRange(string $key, string $start, string $end ,bool $withscores = null)
    {
        return '';
    }
}