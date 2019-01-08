<?php

namespace config;

/**
 * exceptionに関するconfigクラス
 *
 * Class exception
 * @package config
 */
class Exception
{
    /* 例外発生時に表示するメッセージの定義 */
    static $arrMsg = [
        'dbError'      => 'DB処理時にエラーが発生しました。',
        'pageNotFound' => 'ページが存在しません。',
    ];
}