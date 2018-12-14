<?php

namespace model;

use classes\db;
use classes\util;

/**
 * 人情報登録機能のModelクラス
 *
 * Class Regist
 * @package model
 */
class Regist
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
//        include_once(dirname(__FILE__) . '/../../config/base.php');
//        include_once(ROOT_DIR_PATH . 'classes/db.php');
//        include_once(ROOT_DIR_PATH . 'classes/util.php');
//        include_once(ROOT_DIR_PATH . 'classes/config.php');
    }

    /**
     * 人情報登録画面から入力された情報をDBに登録する。
     */
    public function registhuman()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        try {
            $db = new db();
            $mysqli = $db->dbConnect();
            $db->registerHuman($mysqli, util::getParam('name'), util::getParam('age'), util::getParam('email'));

            $_SESSION['message'] = \classes\config::getViewMessage('regist');
        } catch (\Exception $e) {
            $_SESSION['message'] = \classes\config::getViewMessage('error');
        }
    }
}
