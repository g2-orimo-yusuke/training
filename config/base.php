<?php

namespace config;

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
        'dbHost'     => 'localhost',
        'dbUsername' => 'root',
        'dbPassword' => 'password',
        'dbName'     => 'testdb',
    ];

    // hostURL
    static $hostUrl = [
        'localhost' => 'http://localhost:8888/',
    ];

}
