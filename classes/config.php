<?php

namespace classes;

use config\Base;
use config\Cache;
use config\Exception;
use config\View;

/**
 * configに関するメソッドを記述するクラス
 *
 * Class config
 * @package classes
 */
class Config
{
    /**
     * ホストURLを取得する。
     * 取得できない場合nullを返却する。
     *
     * @return string|null
     */
    public static function getHostUrl()
    {
        return Base::$hostUrl[LOCAL_HOST] ?? null;
    }

    /**
     * Mockを使用するDAO名を配列で取得する。
     *
     * @return array
     */
    public static function getMockArr()
    {
        return Base::$arrMock;
    }

    /**
     * 渡された機能名・要素名に対応する画面名を返却する。
     * 渡された機能名・要素名に対応する画面名が存在しない場合はnullを返却する。
     *
     * @param string $funcName
     * @param string $viewNameElements
     *
     * @return string|null
     */
    public static function getViewName(string $funcName, string $viewNameElements)
    {
        return View::$arrViewName[$funcName][$viewNameElements] ?? null;
    }

    /**
     * 渡された要素名に対応するメッセージを返却する。
     * 渡された要素名に対応するメッセージが存在しない場合はnullを返却する。
     *
     * @param string $viewMessageElements
     *
     * @return string|null
     */
    public static function getMessage(string $viewMessageElements)
    {
        return View::$arrMsg[$viewMessageElements] ?? null;
    }

    /**
     * 渡された要素名に対応する一覧のヘッター部を連想配列で取得する。
     *
     * @param string $funcName
     *
     * @return array
     */
    public static function getColumnArr(string $funcName): array
    {
        return View::$arrColumn[$funcName];
    }

    /**
     * 渡された要素名に対応する例外時メッセージを返却する。
     * 渡された要素名に対応する例外時メッセージが存在しない場合はnullを返却する。
     *
     * @param $exceptionMessageElements
     *
     * @return string|null
     */
    public static function getExceptionMessage($exceptionMessageElements)
    {
        return Exception::$arrMsg[$exceptionMessageElements] ?? null;
    }

    /**
     * 渡された要素名に対応するインメモリDBの接続情報を返却する。
     * 渡された要素名に対応するインメモリDBの接続情報が存在しない場合はnullを返却する。
     *
     * @param string $kvsName
     * @param string $infoElements
     *
     * @return string|null
     */
    public static function getCacheConnectInfo(string $kvsName, string $infoElements) {
        return Cache::$arrConnectInfo[$kvsName][$infoElements] ?? null;
    }

    /**
     * キャッシュからデータ取得する際のサイズの限界値を取得
     *
     * @param string $limitElements
     *
     * @return mixed
     */
    public static function getLimitBycache(string $limitElements)
    {
        return Cache::$getLimit[$limitElements];
    }

}
