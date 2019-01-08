<?php

namespace classes\exception;

use classes\Config;
use Exception;

/**
 * アプリ例外クラス
 *
 * Class appException
 * @package classes\exception
 */
class appException extends base
{
    protected $message;

    /**
     * アプリ例外時の処理
     *
     * appException constructor.
     *
     * @param string $messageElements
     *
     * @throws Exception
     */
    public function __construct($messageElements)
    {
        parent::__construct();
        $this->message = Config::getExceptionMessage($messageElements);
    }

    /**
     * Exceptionログを出力する。
     *
     * @throws Exception
     */
    public function putLog() :void
    {
        try {
            $this->createLog($this->message);
        } catch (Exception $e) {
            throw $e;
        }
    }

}