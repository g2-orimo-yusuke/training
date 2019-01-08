<?php

namespace config;

/**
 * viewに関するconfigクラス
 *
 * Class view
 * @package config
 */
class View
{
    /* 表のカラム部の定義 */
    static $arrColumn = [
        'human' => [
            'id'    => 'ID',
            'name'  => '名前',
            'age'   => '年齢',
            'email' => 'メールアドレス',
        ],

        'ranking' => [
            'rank' => '順位',
            'id'    => 'ID',
            'changeCount' => '変更回数',
        ]
    ];



    /* view名の定義 */
    static $arrViewName = [
        'human' => [
            'edit'   => '人情報編集',
            'table'  => '人一覧',
            'regist' => '新規登録',
            'changeRanking' => '変更回数ランキング'
        ],
    ];

    /* viewに表示するメッセージの定義 */
    static $arrMsg = [
        'error'        => 'エラーが発生しました。',
        'regist'       => '登録しました。',
        'change'       => 'id=%dを変更しました。',
        'delete'       => 'id=%dを削除しました。',
        'pageNotFound' => 'ページが存在しません。',
    ];

}
