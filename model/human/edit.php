<?php

namespace edit;

/* editHumanのロジック */

// 登録結果メッセージ変数
$message = '';
//include_once(dirname(__FILE__) . '/../../config/base.php');
//include_once(ROOT_DIR_PATH . 'classes/db.php');
//include_once(ROOT_DIR_PATH . 'classes/util.php');
// DB接続開始
$mysqli = db_connect();
// 人情報をDBから取得
try {
    $result = get_human_info($mysqli, $_GET['id']);
} catch (Exception $e) {
    $message = \classes\config::getViewMessage('error');
}
// 変更が押下された場合に実行。画面から入力された情報を基にDBの人情報を更新する。
if (isset($_POST['change'])) {
    try {
        $inputParam = $_POST;
        change_human($mysqli, $result['id'], $inputParam['name'], $inputParam['age'], $inputParam['email']);

        session_start();
        $_SESSION['message'] = sprintf(\classes\config::getViewMessage('change'), $result['id']);
        header('Location: http://localhost:8888/view/human/table.php');

    } catch (Exception $e) {
        $message = \classes\config::getViewMessage('error');
    }
}
// 削除が押下された場合に実行。対象idの人情報をDBから削除する。
if (isset($_POST['delete'])) {
    try {
        delete_human($mysqli, $result['id']);

        session_start();
        $_SESSION['message'] = sprintf($arrMsg['delete'], $result['id']);
        header('Location: http://localhost:8888/view/human/table.php');

    } catch (Exception $e) {
        $message = $arrMsg['error'];
    }
}
