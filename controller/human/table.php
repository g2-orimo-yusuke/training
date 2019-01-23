<?php

namespace controller\human;

use classes\exception\appException;
use classes\View;
use controller\base;

/**
 * 人情報一覧機能のControllerクラス
 *
 * Class Table
 * @package controller\human
 */
class Table extends base
{
    /**
     * 処理実行
     * @throws \Exception
     */
    public function action()
    {
        $tableModel = new \model\human\Table();

        // DBから人一覧に表示する情報を取得
        try {
            $result = $tableModel->getInfo();

            $bean = $tableModel->createViewBean($result);
            $viewOutPut = new View();
            echo $viewOutPut->outPutView($bean);
        } catch (appException $e) {
            $e->putLog();
        }
    }

}