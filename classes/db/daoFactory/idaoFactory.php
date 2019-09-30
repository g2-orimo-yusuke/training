<?php

namespace classes\db\daoFactory;

/**
 * DAOを生成するクラスのインターフェース
 *
 * Interface DaoFactoryInterface
 * @package classes\db
 */
interface IDaoFactory
{
    /**
     * 渡されたクラス名に対応するDAOインスタンスを生成し、返却する。
     *
     * @param string $daoName
     * @param string $rwDiv
     * @param string $splGroup
     * @param string $shardId
     *
     * @return mixed
     */
    public function createDaoInstance(string $daoName, string $rwDiv, string $splGroup, string $shardId);
}