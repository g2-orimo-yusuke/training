<?php

namespace controller;

use classes\util;
use classes\view;

/**
 * 人情報登録機能のControllerクラス
 *
 * Class Regist
 * @package controller
 */
class Regist
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
//        include_once(ROOT_DIR_PATH . 'model/human/regist.php');
//        include_once(ROOT_DIR_PATH . 'classes/view.php');
//        include_once(ROOT_DIR_PATH . 'classes/db.php');
//        include_once(ROOT_DIR_PATH . 'classes/util.php');
    }

    /**
     * 処理実行
     */
    public function action()
    {
        if (util::isExistsInputParam('regist')) {

            $registModel = new \model\Regist();
            $registModel->registHuman();
        }
        $message = util::getSessionMessage();

        $viewOutPut = new view();
        echo $viewOutPut->outPutViewRegist($message);
    }
}

// このクラスを処理開始の起点とするため自身の呼び出し処理を書く
$registController = new Regist();
$registController->action();
