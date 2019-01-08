<?php

namespace controller\human;

use classes\exception\appException;
use classes\Param;
use classes\View;
use Exception;

/**
 * 人情報登録機能のControllerクラス
 *
 * Class regist
 * @package controller\human
 */
class Regist
{
    /**
     * 処理実行
     *
     * @throws Exception
     */
    public function action(): void
    {
        $registModel = new \model\human\Regist();

        if (Param::isExistsInputParam('regist')) {
            try {
                $registModel->regist();
            } catch (appException $e) {
                $e->putLog();
            }
        }
        $bean = $registModel->createViewBean();
        $viewOutPut = new View();

        echo $viewOutPut->outPutView($bean);
    }
}