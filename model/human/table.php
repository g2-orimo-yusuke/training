<?php

namespace model;

/**
 * 人一覧機能のModelクラス
 *
 * Class table
 * @package model
 */
class table
{
    /**
     * DBから人一覧に出力する情報を取得し、返却する。
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTableInfo()
    {
        try {
            $db = new \classes\db();
            $mysqli = $db->dbConnect();
            $result = $db->getHumanTable($mysqli);
            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
