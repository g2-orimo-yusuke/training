<?php

namespace classes\cache;

use classes\Config;
use config\Cache;

/**
 * Redisを使ったcache操作クラス
 *
 * Class redis
 * @package classes\cache
 */
class Redis implements IKvs
{
    private $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect(
            Config::getCacheConnectInfo(Cache::CACHE_NAME_REDIS,'host'),
            Config::getCacheConnectInfo(Cache::CACHE_NAME_REDIS, 'port'));
    }

    /**
     * cacheにkeyとvalueの組み合わせで格納する。
     *
     * @param string $key
     * @param        $value
     */
    public function add(string $key, $value)
    {
        $this->redis->set($key, $value);
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
        return $this->redis->get($key);
    }

    /**
     * cacheからkeyとそれに対応するvalueを削除する。
     *
     * @param string $key
     */
    public function delete(string $key)
    {
        $this->redis->delete($key);
    }

    /**
     * cacheサーバーとの接続を切断する。
     */
    public function quit()
    {
        $this->redis->close();
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
        return $this->redis->exists($key);
    }

    /**
     * cacheにソート済セット型としてkeyとそれに対応するvalueおよびscoreを登録する。
     *
     * @param string $key
     * @param float  $score
     * @param        $value
     */
    public function zAdd(string $key, float $score, $value)
    {
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
        $this->redis->zRem($key, $member);
    }

    /**
     * 渡されたkeyで格納されているメンバの内、min〜maxに該当するスコアを持つメンバ数を返却する。
     *
     * @param string $key
     * @param        $min
     * @param        $max
     *
     * @return int
     */
    public function zCount(string $key, $min, $max)
    {
        return $this->redis->zCount($key, $min, $max);
    }

    /**
     * keyに対応するvalue配列を返却する。
     * start 〜 end で取得する要素の範囲を指定。
     * withscoresにtrueを指定するとスコアも返却する。
     * ソート順はスコアの降順。
     *
     * @param string    $key
     * @param int       $start
     * @param int       $end
     * @param bool|null $withscores
     *
     * @return array
     */
    public function zRevRange(string $key, int $start, int $end, bool $withscores = null)
    {
        return $this->redis->zRevRange($key, $start, $end, $withscores);
    }

}