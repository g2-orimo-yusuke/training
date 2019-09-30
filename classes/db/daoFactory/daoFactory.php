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

    private $mockList = [];

    private function __construct()
    {
        $this->mockList = Config::getMockArr();
    }

    /**
     * 渡されたクラス名に対応するDAOインスタンスを生成し、返却する。
     * Mockを使用するように指定されているDAOはMockDAOのインスタンスを生成し、返却する。
     * 一度生成したDAOインスタンスは保持し同一のインスタンスを要求された場合、保持しているインスタンスを返却する。
     *
     * @param string $daoName
     * @param string $rwDiv
     * @param string $splGroup
     * @param string $shardId
     *
     * @return mixed
     */
    public function createDaoInstance(string $daoName, string $rwDiv, string $splGroup, string $shardId)
    {
        if (in_array($daoName, $this->mockList)) {
            $daoName = str_replace('\\dao\\', '\\daoMock\\', $daoName);
        }

        if (!isset(self::$instances[$daoName][$rwDiv][$splGroup][$shardId])) {
//            echo '保持しているインスタンス';]
            self::$instances[$daoName][$rwDiv][$splGroup][$shardId]
                = (new $daoName( new Base($rwDiv, $splGroup, $shardId)));
        }

//        echo '新しいインスタンス';
        return self::$instances[$daoName][$rwDiv][$splGroup][$shardId];
    }

}