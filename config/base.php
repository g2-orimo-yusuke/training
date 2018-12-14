<?php

namespace config;

// mysqliの例外をスローさせるための記述
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// プロジェクトのルートディレクトリのパス
define('ROOT_DIR_PATH', '/Applications/MAMP/htdocs/');

/**
 * システムのベースとなる情報を記述するクラス。
 *
 * Class Base
 * @package config
 */
class Base
{

    // DBアクセス情報
    static $arrDb = [
        'dbHost' => 'localhost',
        'dbUsername' => 'root',
        'dbPassword' => 'password',
        'dbName' => 'testdb',
    ];


}
