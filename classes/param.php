<?php

namespace classes;

use classes\cache\InMemoryDB;

/**
 * parameter操作に関する処理を記述するクラス
 *
 * Class param
 */
class Param
{
    /**
     * cacheに登録されているメッセージを取り出し返却する。
     * cacheに登録されたメッセージを削除する。
     *
     * @return string
     */
    public static function getViewMessage() :string
    {
        $cache = new InMemoryDB();

        if ($cache->get('message')) {
            $message = $cache->get('message');
            $cache->delete('message');
            return $message;
        }

        $cache->quit();

        return '';
    }

    /**
     * cacheにメッセージを登録する。
     *
     * @param String $message
     */
    public static function setViewMessage(string $message) :void
    {
        $cache = new InMemoryDB();
        $cache->add('message', $message);
        $cache->quit();
    }

    /**
     * パラメーター取得
     *
     * @param string $name 取得したいリクエスト名
     *
     * @return string
     */
    public static function getParam(string $name) :string
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return null;
    }

    /**
     * 入力された値が$_POSTに存在するか判別する
     *
     * @param $name
     *
     * @return bool
     */
    public static function isExistsInputParam(string $name) :bool
    {
        return isset($_POST[$name]);
    }

}