<?php

namespace model\human;

use classes\Config;
use classes\db\dao\Human;
use classes\db\daoFactory\DaoFactory;
use classes\exception\appException;
use classes\Param;
use classes\beans\ViewOutput;
use Exception;

/**
 * 人情報編集機能のModelクラス
 *
 * Class edit
 * @package model\human
 */
class Edit
{
    /**
     * 人情報一覧画面で選択した人情報を取得する。
     *
     * @return array
     * @throws appException
     * @throws Exception
     */
    public function getInfo(): array
    {
        try {
            $daoFactory = DaoFactory::getInstance();
            $dao = $daoFactory->createDaoInstance(Human::class, 'master', 'vertical0', 'shard0', 'horizon0');

            return $dao->getInfoById(Param::getParam('id'));
        } catch (appException $e) {
            Param::setViewMessage(Config::getMessage('error'));
            throw $e;
        }
    }

    /**
     * 人情報編集画面にて入力された情報を基にDBの対象idの人情報を変更する。
     *
     * @param int $id
     *
     * @throws Exception
     */
    public function change(int $id): void
    {
        try {
            $daoFactory = DaoFactory::getInstance();
            $dao = $daoFactory->createDaoInstance(Human::class, 'master', 'vertical0', 'shard0', 'horizon0');
            $dao->change($id, Param::getParam('name'), Param::getParam('age'),
                Param::getParam('email'));

            Param::setViewMessage(sprintf(Config::getMessage('change'), $id));

        } catch
        (appException $e) {
            Param::setViewMessage(Config::getMessage('error'));
            throw $e;
        }
    }

    /**
     * 対象idの人情報をDBから削除する。
     *
     * @param int $id
     *
     * @throws Exception
     */
    public function delete(int $id): void
    {
        try {
            $daoFactory = DaoFactory::getInstance();
            $dao = $daoFactory->createDaoInstance(Human::class, 'master', 'vertical0', 'shard0', 'horizon0');
            $dao->delete($id);
            Param::setViewMessage(sprintf(Config::getMessage('delete'), $id));

        } catch (Exception $e) {
            Param::setViewMessage(Config::getMessage('error'));
            throw $e;
        }
    }

    /**
     * 画面表示用のBeanを生成する。
     *
     * @param array $result
     *
     * @return ViewOutput
     */
    public function createViewBean(array $result): ViewOutput
    {
        $bean = new ViewOutput();
        $bean->setViewName(Config::getViewName('human', 'edit'));

        $nextViewNameArray = ['nextViewName' => Config::getViewName('human', 'table')];
        $bean->setNextViewName($nextViewNameArray);

        $messageArray = ['message' => Param::getViewMessage()];
        $bean->setMessage($messageArray);

        $bean->setResult($result);
        $bean->setViewPath('view/human/edit.php');
        return $bean;
    }

}