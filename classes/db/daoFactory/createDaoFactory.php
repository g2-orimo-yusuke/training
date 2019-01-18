<?php
/**
 * Created by PhpStorm.
 * User: orimo.yusuke
 * Date: 2019-01-17
 * Time: 16:04
 */

namespace classes\db\daoFactory;


use const config\DB_NAME_MOCK;
use const config\DB_NAME_MYSQL;
use const config\USE_DB;

class chooseDaoFactory
{
    public function createHumanFactory()
    {
        switch (USE_DB) {
            case DB_NAME_MYSQL:
                return DaoFactory::getInstance();
                break;
            case DB_NAME_MOCK:
                return mockFactory::getInstance();
        }
    }
}