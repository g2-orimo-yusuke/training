<?php

namespace config;

use classes\db\dao\Human;

/**
 * システムのベースとなる情報を記述するクラス。
 *
 * Class Base
 * @package config
 */
class Base
{
    // Mockを使うDAOを指定（class名）
    static $arrMock = [/*Human::class*/];

    // DBアクセス情報
    static $arrDb = [
        'master' => [
            'users' => [
                'shard0' => [
                        'dbHost'     => 'localhost',
                        'dbUsername' => 'root',
                        'dbPassword' => 'password',
                        'dbName'     => 'testdb',
                ],
                'shard1' => [
                        'dbHost'     => 'localhost',
                        'dbUsername' => 'root',
                        'dbPassword' => 'password',
                        'dbName'     => 'testdb',
                ],
            ],
        ],
        'slave0' => [
            'users' => [
                'shard0' => [
                    'dbHost'     => 'localhost',
                    'dbUsername' => 'root',
                    'dbPassword' => 'password',
                    'dbName'     => 'testdb',
                ],
                'shard1' => [
                    'dbHost'     => 'localhost',
                    'dbUsername' => 'root',
                    'dbPassword' => 'password',
                    'dbName'     => 'testdb',
                ],
            ],
        ],
    ];


    // hostURL
    static $hostUrl = [
        'localhost' => 'http://localhost:8888/',
    ];

}
