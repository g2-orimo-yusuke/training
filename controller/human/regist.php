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
