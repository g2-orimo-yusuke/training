<?php

namespace controller\human;

use classes\View;

class ChangeRanking
{
    public function action()
    {
        $changeRankingModel = new \model\human\ChangeRanking();
        $bean = $changeRankingModel->createViewBean();

        $viewOutPut = new View();
        echo $viewOutPut->outPutView($bean);

    }

}