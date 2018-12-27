<?php

namespace classes\exception;

use classes\config;

/**
 * DB処理時の例外クラス
 *
 * Class dbException
 * @package classes\exception
 */
class dbException extends base
{
    /**
     * DB処理例外時の処理
     *
     * dbException constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        try {
            $this->createLog(config::getExceptionMessage('dbError'));
        } catch (\Exception $e) {
            throw $e;
        }
    }

}