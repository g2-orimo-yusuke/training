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
