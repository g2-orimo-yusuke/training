<?php

namespace classes\db;

/**
 * DAO生成クラス
 *
 * Class DaoFactory
 * @package classes\db
 */
class DaoFactory implements IDaoFactory
{
    private static $instance;

    private function __construct()
    {

    }

    /**
     * 自分自身のインスタンスを生成し返却する。（Singleton）
     *
     * @return IDaoFactory
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new DaoFactory();
        }

        return self::$instance;
    }

    /**
     * このクラスのインスタンス複製を禁止する。
     *
     * @throws \Exception
     */
    public final function __clone() {
        throw new \Exception();
    }

    /**
     * humanのDAOインスタンスを生成し、返却する。
     *
     * @return Human
     */
    public function createHumanDao()
    {
        return new Human();
    }

}