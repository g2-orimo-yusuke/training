<?php

namespace classes\db\dao;

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
    private static $dbConnection;
    private static $prepareStmt;

    private $subordinationId;
    private $verticalId;
    private $shardId;
    private $horizonId;


    public function __construct($subordinationId, $verticalId, $shardId, $horizonId)
    {
        $this->subordinationId = $subordinationId;
        $this->verticalId = $verticalId;
        $this->shardId = $shardId;
        $this->horizonId = $horizonId;
    }


    /**
     * 渡された要素名を基にDB接続のための情報を返却する。
     *
     * @param $subordinationId
     * @param $verticalId
     * @param $shardId
     * @param $horizonId
     * @param $infoElements
     *
     * @return string|null
     */
    public static function getInfo($subordinationId, $verticalId, $shardId, $horizonId, $infoElements)
    {
        return \config\Base::$arrDb[$subordinationId][$verticalId][$shardId][$horizonId][$infoElements] ?? null;
    }

    /**
     * DBコネクションオブジェクトを返却する。
     *
     * @throws \Exception
     */
    public function dbConnect()
    {
        $host = $this->getInfo($this->subordinationId, $this->verticalId, $this->shardId, $this->horizonId,'dbHost');
        $username = $this->getInfo($this->subordinationId, $this->verticalId, $this->shardId, $this->horizonId,'dbUsername');
        $password = $this->getInfo($this->subordinationId, $this->verticalId, $this->shardId, $this->horizonId,'dbPassword');
        $dbName = $this->getInfo($this->subordinationId, $this->verticalId, $this->shardId, $this->horizonId,'dbName');

        self::$dbConnection = new mysqli($host, $username, $password, $dbName);
        if (self::$dbConnection->connect_error) {
            throw new appException('dbError');
        }
    }

    /**
     * SQL ステートメントを実行し、結果を配列で返却する。
     *
     * @param string $query
     *
     * @return mixed
     */
    public function query(string $query)
    {
        return $this->convQueryResultToArr(self::$dbConnection->query($query));
    }

    /**
     * queryを実行して取得したresultオブジェクトを配列に変換し、返却する。
     *
     * @param \mysqli_result $result
     *
     * @return array
     */
    private function convQueryResultToArr(\mysqli_result $result)
    {
        $arr = [];

        for ($i = 0; $i < $result->num_rows; $i++) {
            $arr[] = $result->fetch_assoc();
        }

        return $arr;
    }

    /**
     * 文を実行する準備を行う。
     * プリペアドステートメントを生成し変数をバインドする。
     *
     * @param string   $query
     *
     * @param string   $types
     * @param string[] $var
     *
     */
    public function prepare(string $query, string $types, ...$var)
    {
        $stmtParams[] = &$types;
        foreach ($var as $k => $v) {
            $stmtParams[] = &$var[$k];
        }

        self::$prepareStmt = self::$dbConnection->prepare($query);

        call_user_func_array([self::$prepareStmt, 'bind_param'], $stmtParams);
    }

    /**
     * プリペアドクエリを実行する。
     */
    public function execute()
    {
        self::$prepareStmt->execute();
    }

//    /**
//     * 結果を保存するため、プリペアドステートメントに変数をバインドする
//     *
//     * @param string ...$bind_params
//     *
//     * @return array
//     */
//    public function bind_result(string ...$bind_params)
//    {
//        var_dump();
//
//        $bindArr = array();
//        foreach ($bind_params as $param){
//            $$param = '';
//            $bindArr[] = &$$param;
//        }
//
//        call_user_func_array(array(self::$prepareStmt, 'bind_result'), $bindArr);
//        self::fetch();
//
//        $result = array();
//
//        for ($i = 0; $i < count($bind_params); $i++)
//        {
//            $result[$bind_params[$i]] = $bindArr[$i];
//        }
//        var_dump($result);
//        return $result;
//    }

    /**
     * プリペアード・ステートメントから結果セットを取得し、配列で返却する。。
     *
     * @return array
     */
    public function getResult()
    {
        return $this->convQueryResultToArr(self::$prepareStmt->get_result());
    }

    /**
     * プリペアドステートメントから結果を取得し、バインド変数に格納する
     */
    public function fetch()
    {
        self::$prepareStmt->fetch();
    }

    /**
     * プリペアドステートメントを閉じる
     */
    public function close()
    {
        self::$prepareStmt->close();
    }

}