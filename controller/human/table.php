<?php

namespace controller;

use classes\config;
use classes\util;
use classes\view;

/**
 * 人情報一覧機能のControllerクラス
 *
 * Class
 * @package controller
 */
class table
{
    public function __construct()
    {
        $this->init();
    }

    /**
     * 外部ファイル読み込み
     */
    private function init()
    {
//        include_once(dirname(__FILE__) . '/../../config/base.php');
//        include_once(ROOT_DIR_PATH . 'config/human.php');
//        include_once(ROOT_DIR_PATH . 'model/human/table.php');
//        include_once(ROOT_DIR_PATH . 'classes/util.php');
//        include_once(ROOT_DIR_PATH . 'classes/view.php');
    }

    /**
     * 処理実行
     */
    public function action()
    {
        // 人情報編集の結果メッセージを設定
        $message = util::getSessionMessage();
        $tableModel = new table();
        $result = null;

        try {
            // DBから人一覧に表示する情報を取得
            $result = $tableModel->getTableInfo();
        } catch (\Exception $e) {
            $message = config::getViewMessage('error');
        }
        $viewOutPut = new view();
        echo $viewOutPut->outPutViewTable($result, $message);

    }
}

// 処理開始用
$tableController = new table();
$tableController->action();