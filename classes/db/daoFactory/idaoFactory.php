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
     * @param $daoClassName
     *
     * @param $subordinationId
     * @param $verticalId
     * @param $shardId
     * @param $horizonId
     *
     * @return mixed
     */
    public function createDaoInstance($daoClassName, $subordinationId, $verticalId, $shardId, $horizonId);
}