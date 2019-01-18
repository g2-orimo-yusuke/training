<?php

namespace classes\db;


class mockFactory implements IDaoFactory
{
    private static $instance;

    /**
     * 自分自身のインスタンスを生成し、返却する。（Singleton）
     *
     * @return mockFactory
     */
    public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new mockFactory();
        }
        return self::$instance;
    }

    /**
     * このクラスのインスタンス複製を禁止する。
     *
     * @throws \Exception
     */
    public function __clone()
    {
        throw new \Exception();
    }

    /**
     * humanのDAOインスタンスを生成し、返却する。
     *
     * @return mixed|void
     */
    public function createHumanDao()
    {
        // TODO: Implement createHumanDao() method.
    }

}
