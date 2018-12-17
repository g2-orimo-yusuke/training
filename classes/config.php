<?php

namespace classes;

use config\Base;

/**
 * Viewに関するメソッドを記述するクラス
 *
 * Class output
 * @package classes
 */
class config
{
    /**
     * @return String
     */
    public static function getHostUrl()
    {
        return Base::$hostUrl[LOCAL_HOST] ?? null;
    }

    /**
     * 渡された機能名・要素名に対応する画面名を返却する。
     * 渡された機能名・要素名に対応する画面名が存在しない場合はnullを返却する。
     *
     * @param  String $funcName
     * @param  String $viewNameElements
     *
     * @return String
     */
    public static function getViewName(String $funcName, String $viewNameElements)
    {
        return \config\output::$arrViewName[$funcName][$viewNameElements] ?? null;
    }

    /**
     * 渡された要素名に対応するメッセージを返却する。
     * 渡された要素名に対応するメッセージが存在しない場合はnullを返却する。
     *
     * @param  String
     *
     * @return String
     */
    public static function getMessage($viewMessageElements)
    {
        return \config\output::$arrMsg[$viewMessageElements] ?? null;
    }

    /**
     * 渡された要素名に対応する一覧のヘッター部を連想配列で取得する。
     *
     * @param String $funcName
     *
     * @return array
     */
    public static function getColumnArr(String $funcName)
    {
        return \config\output::$arrColumn[$funcName];
    }

}
