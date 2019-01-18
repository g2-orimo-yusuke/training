<?php

namespace classes\db;

/**
 * DAOを生成するクラスのインターフェース
 *
 * Interface DaoFactoryInterface
 * @package classes\db
 */
interface IDaoFactory
{
    /**
     * humanのDAOインスタンスを生成し、返却する。
     *
     * @return mixed
     */
    public function createHumanDao();
}