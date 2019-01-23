<?php

namespace model\human;


use classes\beans\ViewOutput;
use classes\cache\InMemoryDB;
use classes\Config;

class ChangeRanking
{
    /**
     * 画面表示用のBeanを生成する。
     *
     * @return ViewOutput
     */
    public function createViewBean(): ViewOutput
    {
        $bean = new ViewOutput();
        $bean->setViewName(Config::getViewName('human', 'changeRanking'));

        $nextViewNameArray = [
            'nextViewName' => Config::getViewName('human', 'table'),
        ];
        $bean->setNextViewName($nextViewNameArray);

        $outPutArray = ['arrColumn' => Config::getColumnArr('ranking')];
        $bean->setOutputArray($outPutArray);

        $bean->setViewPath('view/human/changeRanking.php');

        $cache = new InMemoryDB();
        $bean->setResult($cache->createRankingArr('changeCount', config::getLimitBycache('changeCount')));

        return $bean;
    }

}