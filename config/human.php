<?php

namespace config;

class Human
{
    static $arrColumn = [
        'id' => 'ID',
        'name' => '名前',
        'age' => '年齢',
        'email' => 'メールアドレス',
    ];

    /* view名の定義 */
    static $arrViewName = [
        'editHuman' => '人情報編集',
        'humanTable' => '人一覧',
        'registHuman' => '新規登録',
    ];

    /* viewに表示するメッセージの定義 */
    static $arrMsg = [
        'error' => 'エラーが発生しました。',
        'regist' => '登録しました。',
        'change' => 'id=%dを変更しました。',
        'delete' => 'id=%dを削除しました。',
    ];
}
