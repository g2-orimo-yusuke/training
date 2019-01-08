<?php

namespace model\human;

use classes\Config;
use classes\exception\appException;
use classes\Param;
use classes\beans\ViewOutput;

/**
 * 人情報登録機能のModelクラス
 *
 * Class regist
 * @package model\human
 */
class Regist
{
    /**
     * 人情報登録画面から入力された情報をDBに登録する。
     *
     * @throws \Exception
     */
    public function regist(): void
    {
        try {
            $db = new \classes\db\Human();
            $mysqli = $db->dbConnect();
            $db->register($mysqli, Param::getParam('name'), Param::getParam('age'), Param::getParam('email'));

            Param::setViewMessage(Config::getMessage('regist'));
        } catch (appException $e) {
            Param::setViewMessage(Config::getMessage('error'));
            throw $e;
        }
    }

    /**
     * 画面表示用のBeanを生成する。
     *
     * @return ViewOutput
     */
    public function createViewBean(): ViewOutput
    {
        $bean = new ViewOutput();
        $bean->setViewName(Config::getViewName('human', 'regist'));
        $nextViewNameArray = ['nextViewName' => Config::getViewName('human', 'table')];

        $bean->setNextViewName($nextViewNameArray);
        $messageArray = ['message' => Param::getViewMessage()];

        $bean->setMessage($messageArray);
        $bean->setViewPath('view/human/regist.php');
        return $bean;
    }

}
