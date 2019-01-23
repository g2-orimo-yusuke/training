<?php

namespace classes\cache;

use classes\Config;
use config\Cache;

/**
 * Memcachedを使ったcache操作クラス
 *
 * Class memcached
 * @package classes\cache
 */
class Memcached implements IKvs
{
    private $memcached;
    private $redis;

    public function __construct()
    {
        $this->memcached = new \Memcached();
        $this->memcached->addServer(
            Config::getCacheConnectInfo(Cache::CACHE_NAME_MEMCACHED, 'host')
            ,Config::getCacheConnectInfo(Cache::CACHE_NAME_MEMCACHED, 'port'));
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

    /**
     * 渡されたkey・memberのスコアにscoreを加算する。
     *
     * @param string $key
     * @param float  $score
     * @param string $value
     */
    public function zAdd(string $key, float $score, string $value)
    {
        $this->createRedisInstance();
        $this->redis->zAdd($key, $score, $value);
    }

    /**
     * 渡されたkey・memberのスコアにscoreを加算する。
     *
     * @param string $key
     * @param float  $score
     * @param string $member
     */
    public function zIncrBy(string $key, float $score, string $member)
    {
        $this->createRedisInstance();
        $this->redis->zIncrBy($key, $score, $member);
    }

    /**
     * 渡されたkey・memberを削除する。
     *
     * @param string $key
     * @param string $member
     */
    public function zRem(string $key, string $member)
    {
        $this->createRedisInstance();
        $this->redis->zRem($key, $member);
    }

    /**
     * 渡されたkeyで格納されているメンバの内、min〜maxに該当するスコアを持つメンバ数を返却する。
     *
     * @param string $key
     * @param        $min
     * @param        $max
     *
     * @return mixed
     */
    public function zCount(string $key, $min, $max)
    {
        $this->createRedisInstance();
        return $this->redis->zCount($key, $min, $max);
    }

    /**
     * keyに対応するvalue配列を返却する。
     * ソート順はランクの降順
     *
     * @param string    $key
     * @param string    $start
     * @param string    $end
     * @param bool|null $withscores
     *
     * @return mixed
     */
    public function zRevRange(string $key, string $start, string $end, bool $withscores = null)
    {
        $this->createRedisInstance();
        return $this->redis->zRevRange($key, $start, $end, $withscores);
    }

    /**
     * redisのインスタンスを生成する。
     */
    private function createRedisInstance()
    {
        if (!isset($this->redis)) {
            $this->redis = new Redis();
        }
    }
}