<?php

namespace controller\human;

use classes\exception\appException;
use classes\Param;
use classes\View;
use classes\Config;
use Exception;

/**
 * 人情報編集機能のControllerクラス
 *
 * Class edit
 * @package controller\human
 */
class Edit
{
    /**
     * 処理実行
     *
     * @throws appException
     * @throws Exception
     */
    public function action() :void
    {
        $editModel = new \model\human\Edit();
        $result = $editModel->getInfo();

        // 更新・削除ボタンが押されていない初期表示の処理
        if (!Param::isExistsInputParam('change')
            && !Param::isExistsInputParam('delete')) {
            $bean = $editModel->createViewBean($result);
            $vieOutPut = new View();
            echo $vieOutPut->outPutView($bean);
        }

        if (Param::isExistsInputParam('change')) {
            try {
                $editModel->change($result['id']);
                $this->loadTable();
            } catch (appException $e) {
                $this->loadTable();
                $e->putLog();
            }
        }

        if (Param::isExistsInputParam('delete')) {
            try {
                $editModel->delete($result['id']);
                $this->loadTable();
            } catch (appException $e) {
                $this->loadTable();
                $e->putLog();
            }
        }
    }

    /**
     * 人情報一覧画面に遷移する。
     */
    private function loadTable()
    {
        header("Location:" . Config::getHostUrl() . "public/index.php?c=human/table");
    }

}