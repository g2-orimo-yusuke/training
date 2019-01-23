<?php

namespace classes\cache;

use config\Cache;

/**
 * inMemoryDBクラス
 *
 * Class inMemoryDB
 * @package classes
 */
class InMemoryDB
{
    private $instance;

    public function __construct()
    {
        switch (Cache::USE_CACHE) {
            case Cache::CACHE_NAME_REDIS :
                $this->instance = new Redis();
                break;
            case Cache::CACHE_NAME_MEMCACHED :
                $this->instance = new Memcached();
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
        return $this->instance->exists($key);
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
        $this->instance->zIncrBy($key, $score, $member);
    }

    /**
     * 渡されたkey・memberを削除する。
     *
     * @param string $key
     * @param string $member
     */
    public function zRem(string $key, string $member)
    {
        $this->instance->zRem($key, $member);
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
        return $this->instance->zCount($key, $min, $max);
    }

    /**
     * keyに対応するvalue配列を返却する。
     * ソート順はランクの降順
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
        return $this->instance->zRevRange($key, $start, $end, $withscores);
    }

    /**
     * 渡されたscoreの順位を返却する。
     *
     * @param string $key
     * @param string $score
     *
     * @return int
     */
    public function getRank(string $key, string $score)
    {
        $rank = $this->zCount($key, ++$score, '+inf');
        return ++$rank;
    }

    /**
     * 渡されたkeyのランキングデータをcacheから取得し、取得データに順位を付与して返却する。
     * 返却配列: [[0]=>{順位, value, score}, [1]=>{順位, value, score}, ……]
     *
     * @param string $cacheKey
     * @param string $getLimit
     *
     * @return array
     */
    public function createRankingArr(string $cacheKey, string $getLimit)
    {
        $rankArr = [];

        $result = $this->zRevRange($cacheKey, 0, $getLimit, true);
        foreach ($result as $value => $score) {
            $rankArr[] = [$this->getRank($cacheKey, $score), $value, $score];
        }

        return $rankArr;
    }

}