<?php

namespace classes;

use config\Human;

/**
 * Viewに関するメソッドを記述するクラス
 *
 * Class config
 * @package classes
 */
class config
{
    /**
     * 渡された要素名に対応する画面名を返却する。
     * 渡された要素名に対応する画面名が存在しない場合はnullを返却する。
     *
     * @param  String $viewNameElements 取得したい画面名の要素名
     *
     * @return String                   画面名
     */
    public static function getViewName($viewNameElements)
    {
        return Human::$arrViewName[$viewNameElements] ?? null;
    }

    /**
     * 渡された要素名に対応するメッセージを返却する。
     * 渡された要素名に対応するメッセージが存在しない場合はnullを返却する。
     *
     * @param  String  取得したいメッセージの要素名
     *
     * @return String  メッセージ
     */
    public static function getViewMessage($viewMessageElements)
    {
        return Human::$arrMsg[$viewMessageElements] ?? null;
    }

    /**
     * 人情報一覧のヘッター部を連想配列で取得する。
     *
     * @return array
     */
    public static function getColumnArr() {
        return Human::$arrColumn;
    }

}
