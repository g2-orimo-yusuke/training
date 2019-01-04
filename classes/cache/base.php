<?php

namespace classes;

use Memcached;
use Redis;

/**
 * cacheクラス
 *
 * Class cache
 * @package classes
 */
class cache
{
    private const PORT = 11211;
    private $mem;

    private $red;

    public function __construct()
    {
//        $this->mem = new Memcached();
//        $this->mem->addServer(LOCAL_HOST, self::PORT);

        $this->red = new Redis();
        $this->red->connect(LOCAL_HOST, 6379);
    }

    /**
     * cacheにkeyとvalueの組み合わせで格納する。
     *
     * @param string $key
     * @param        $value
     */
    public function add(string $key, $value)
    {
//        $this->mem->add($key, $value);
        $this->red->set($key, $value);
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
//        return $this->mem->get($key) ?? null;
        return $this->red->get($key);
    }

    /**
     * cacheからkeyとそれに対応するvalueを削除する。
     *
     * @param string $key
     */
    public function delete(string $key)
    {
//        $this->mem->delete($key);
        $this->red->delete($key);
    }

    /**
     * cacheサーバーとの接続を切断する。
     */
    public function quit()
    {
//        $this->mem->quit();
        $this->red->close();
    }

}