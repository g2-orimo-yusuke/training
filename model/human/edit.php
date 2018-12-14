<?php

namespace model;

use classes\db;
use classes\util;
use controller\table;
use Exception;

class edit
{
    function logic()
    {
        // 登録結果メッセージ変数
        try {
            $db = new db();
            $mysqli = $db->dbConnect();
            return $db->getHumanInfo($mysqli, util::getParam('id'));
        } catch (Exception $e) {
            $message = \classes\config::getViewMessage('error');
            $this->loadTable();
        }
    }

// 変更が押下された場合に実行。画面から入力された情報を基にDBの人情報を更新する。
    function changeHuman(int $id)
    {
        try {
            $db = new db();
            $mysqli = $db->dbConnect();
            $db->changeHuman($mysqli, $id, util::getParam('name'), util::getParam('age'),
                util::getParam('email'));

            session_start();
            $_SESSION['message'] = sprintf(\classes\config::getViewMessage('change'), $id);
            $this->loadTable();

        } catch
        (Exception $e) {
            $message = \classes\config::getViewMessage('error');
            $this->loadTable();
        }

    }

// 削除が押下された場合に実行。対象idの人情報をDBから削除する。
    function deleteHuman(int $id)
    {
        try {
            $db = new db();
            $mysqli = $db->dbConnect();
            $db->deleteHuman($mysqli, $id);

            session_start();
            $_SESSION['message'] = sprintf(\classes\config::getViewMessage('delete'), $id);
            $this->loadTable();

        } catch (Exception $e) {
            $message = \classes\config::getViewMessage('error');
            $this->loadTable();
        }

    }

    private function loadTable() {
        header('Location: http://localhost:8888/controller/human/table.php');
}

}