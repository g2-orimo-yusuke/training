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
            'vertical0' => [
                'shard0' => [
                    'horizon0' => [
                        'dbHost'     => 'localhost',
                        'dbUsername' => 'root',
                        'dbPassword' => 'password',
                        'dbName'     => 'testdb',
                    ],
                    'horizon1' => [

                    ],
                ],
                'shard1' => [

                ],
            ],
            'vertical1' => [

            ],
        ],
        'slave0' => [
            'vertical0' => [

                'shard0' => [

                ],
                'shard1' => [

                ],
            ],
            'vertical1' => [

            ],
        ],

    ];


    // hostURL
    static $hostUrl = [
        'localhost' => 'http://localhost:8888/',
    ];

}
