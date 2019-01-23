<?php

namespace classes\db\daoFactory;

use classes\Config;
use classes\db\dao\Base;
use classes\Singleton;

/**
 * DAO生成クラス
 *
 * Class DaoFactory
 * @property array mockList
 * @package classes\db
 */
class DaoFactory implements IDaoFactory
{
    use Singleton;

    private static $instances = [];

    private static $mockList;

    private function __construct()
    {
        $this->mockList = Config::getMockArr();
    }

    /**
     * 渡されたクラス名に対応するDAOインスタンスを生成し、返却する。
     * Mockを使用するように指定されているDAOはMockDAOのインスタンスを生成し、返却する。
     * 一度生成したDAOインスタンスは保持し同一のインスタンスを要求された場合、保持しているインスタンスを返却する。
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
    public function createDaoInstance($daoClassName, $subordinationId, $verticalId, $shardId, $horizonId)
    {
        if (in_array($daoClassName, $this->mockList)) {
            $daoClassName = str_replace('\\dao\\', '\\daoMock\\', $daoClassName);
        }

        if (!isset(self::$instances[$daoClassName][$subordinationId][$verticalId][$shardId][$horizonId])) {
//            echo '保持しているインスタンス';]
            self::$instances[$daoClassName][$subordinationId][$verticalId][$shardId][$horizonId]
                = new $daoClassName(new Base($subordinationId, $verticalId, $shardId, $horizonId));
        }

//        echo '新しいインスタンス';
        return self::$instances[$daoClassName][$subordinationId][$verticalId][$shardId][$horizonId];
    }

}