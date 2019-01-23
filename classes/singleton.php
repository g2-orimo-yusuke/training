<?php

namespace classes;

/**
 * クラスをシングルトン化するtrait
 *
 * Trait singleton
 * @package classes
 */
trait Singleton
{
    protected function __construct()
    {
    }

    /**
     * 自分自身のインスタンスを生成し返却する。
     *
     * @return mixed
     */
    public static function getInstance()
    {
        static $instances = null;
        if (!isset($instances)) {
            $instances = new self();
        }
        return $instances;
    }

    /**
     * クラスのインスタンス複製を禁止する。
     *
     * @throws \Exception
     */
    public final function __clone()
    {
        throw new \Exception();
    }
}