<?php

namespace controller\human;

use classes\View;
use controller\base;

/**
 * 変更回数ランキング機能のControllerクラス
 *
 * Class ChangeRanking
 * @package controller\human
 */
class ChangeRanking extends base
{
    public function action()
    {
        $changeRankingModel = new \model\human\ChangeRanking();
        $bean = $changeRankingModel->createViewBean();

        $viewOutPut = new View();
        echo $viewOutPut->outPutView($bean);

    }

}