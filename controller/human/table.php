<?php

namespace controller\human;

use classes\exception\appException;
use classes\View;

/**
 * 人情報一覧機能のControllerクラス
 *
 * Class
 * @package controller\human
 */
class Table
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

//            $cache = new InMemoryDB();
//            if (!$cache->exists('changeCount')) {
//                $cache->createChangeRanking($result);
//            }

            $bean = $tableModel->createViewBean($result);
            $viewOutPut = new View();
            echo $viewOutPut->outPutView($bean);
        } catch (appException $e) {
            $e->putLog();
        }
    }

}