<?php

namespace classes\cache;

/**
 * KVSのインターフェース
 *
 * Interface kvsInterface
 * @package classes\cache
 */
interface IKvs
{
    /**
     * cacheにkeyとvalueの組み合わせで格納する。
     *
     * @param string $key
     * @param        $value
     *
     * @return mixed
     */
    public function add(string $key, $value);

    /**
     * cacheからkeyに対応するvalueを取り出す。
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);

    /**
     * cacheからkeyとそれに対応するvalueを削除する。
     *
     * @param string $key
     *
     * @return mixed
     */
    public function delete(string $key);

    /**
     * cacheサーバーとの接続を切断する。
     *
     * @return mixed
     */
    public function quit();

    /**
     * cacheに渡されたkeyが存在するか判定する。
     * true: 存在する
     * false: 存在しない
     *
     * @param string $key
     *
     * @return mixed
     */
    public function exists(string $key);

}