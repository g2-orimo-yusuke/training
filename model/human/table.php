<?php

namespace model\human;

use classes\Config;
use classes\exception\appException;
use classes\Param;
use classes\beans\ViewOutput;
use Exception;

/**
 * 人一覧機能のModelクラス
 *
 * Class table
 * @package model\human
 */
class Table
{
    /**
     * DBから人一覧に出力する情報を取得し、返却する。
     *
     * @return mixed
     * @throws Exception
     */
    public function getInfo()
    {
        try {
            $db = new \classes\db\Human();
            $mysqli = $db->dbConnect();
            $result = $db->getTable($mysqli);
            return $result;
        } catch (appException $e) {
            Param::setViewMessage(Config::getMessage('error'));
            throw $e;
        }
    }

    /**
     * 画面表示用のBeanを生成する。
     *
     * @param \mysqli_result $result
     *
     * @return ViewOutput
     */
    public function createViewBean(\mysqli_result $result): ViewOutput
    {
        $bean = new ViewOutput();
        $bean->setViewName(Config::getViewName('human', 'table'));

        $nextViewNameArray = [
            'nextViewName1' => Config::getViewName('human', 'regist'),
            'nextViewName2' => Config::getViewName('human', 'changeRanking')
        ];
        $bean->setNextViewName($nextViewNameArray);

        $messageArray = ['message' => Param::getViewMessage()];
        $bean->setMessage($messageArray);

        $outPutArray = ['arrColumn' => Config::getColumnArr('human')];

        $bean->setOutputArray($outPutArray);
        $bean->setResult($result);
        $bean->setViewPath('view/human/table.php');
        return $bean;
    }

}