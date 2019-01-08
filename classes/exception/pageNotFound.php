<?php

namespace classes\exception;

use classes\Config;

/**
 * 不正なURLでアクセスされた場合の例外クラス
 *
 * Class pageNotFound
 * @package classes\exception
 */
class pageNotFound extends base
{
    /**
     * 不正なURLでアクセスされた例外時の処理
     *
     * pageNotFound constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        echo Config::getMessage('pageNotFound');
        try {
            $this->createLog(Config::getMessage('pageNotFound'));
        } catch (\Exception $e) {
            throw $e;
        }
    }

}