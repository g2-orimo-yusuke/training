<?php

namespace model;

use classes\db;

/**
 * 人一覧機能のModelクラス
 *
 * Class table
 * @package model
 */
class table
{
    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
//        include_once(dirname(__FILE__) . '/../../config/base.php');
//        include_once(ROOT_DIR_PATH . 'classes/db.php');
    }

    /**
     * DBから人一覧に出力する情報を取得し、返却する。
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTableInfo()
    {
        try {
            $db = new db();
            $mysqli = $db->dbConnect();
            $result = $db->getHumanTable($mysqli);
            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
