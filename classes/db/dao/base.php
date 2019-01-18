<?php

namespace classes\db;

use classes\exception\appException;
use mysqli;

/**
 * DB操作の共通的な処理を記述するクラス
 *
 * Class inMemoryDB\db
 * @package classes
 */
class Base
{
    /**
     * 渡された要素名を基にDB接続のための情報を返却する。
     *
     * @param $infoElements
     *
     * @return string|null
     */
    public static function getInfo($infoElements)
    {
        return \config\Base::$arrDb[$infoElements] ?? null;
    }

    /**
     * DBコネクションオブジェクトを返却する。
     *
     * @return mysqli
     *
     * @throws \Exception
     */
    public function dbConnect(): mysqli
    {
        $host = $this->getInfo('dbHost');
        $username = $this->getInfo('dbUsername');
        $password = $this->getInfo('dbPassword');
        $dbName = $this->getInfo('dbName');

        $mysqli = new mysqli($host, $username, $password, $dbName);
        if ($mysqli->connect_error) {
            throw new appException('dbError');
        }
        return $mysqli;
    }

}