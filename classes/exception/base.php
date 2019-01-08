<?php

namespace classes\exception;

use Exception;

/**
 * 例外の基底クラス
 *
 * Class inMemoryDB
 * @package classes\exception
 */
class base extends Exception
{
    /**
     * 例外時のログを作成する。
     * 【ログの内訳】
     * [time] 例外発生日時
     * [userAgent] ユーザーエージェント情報
     * [remoteHost] クライアントipアドレス - クライアントホスト名
     * [url] サーバーipアドレス - GET or POST - URL
     * [request] リクエスト内容 "key":"value", ……
     * [trace] スタックトレース
     *
     * @param $message
     *
     * @throws Exception
     */
    public function createLog(string $message): void
    {
        try {
            $dt = new \DateTime();
            $dt->setTimezone(new \DateTimeZone('Asia/Tokyo'));
        } catch (Exception $e) {
            throw $e;
        }

        error_log(
            PHP_EOL
            . '[time]' . $dt->format('d/M/Y:H:i:s')
            . PHP_EOL
            . '[userAgent]' . $_SERVER['HTTP_USER_AGENT']
            . PHP_EOL
            . '[remoteHost]' . $_SERVER['REMOTE_ADDR'] . ' - ' . $_SERVER['REMOTE_HOST']
            . PHP_EOL
            . '[url]' . $_SERVER['SERVER_ADDR']
            . ' - ' . $_SERVER['REQUEST_METHOD']
            . ' - ' . (empty($_SERVER["HTTPS"]) ? "http://" : "https://")
            . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]
            . PHP_EOL
            . '[request]' . $this->getRequest()
            . PHP_EOL
            . '[trace]'
            . PHP_EOL
            . $this->getTraceAsString()
            . PHP_EOL
            . '  thrown in ' . $this->getFile() . ' on line ' . $this->getLine()
            . PHP_EOL
            . $message
            . PHP_EOL
            , 3
            , '/Applications/MAMP/logs/php_exception.log');
    }

    /**
     * request情報を文字列で返却する。
     * 書式 "key":"value", ……
     *
     * @return string
     */
    private function getRequest(): string
    {
        $str = '';
        foreach ($_REQUEST as $key => $val) {
            $str .= '"' . $key . '":' . '"' . $val . '",';
        }
        return $str = rtrim($str, ",");
    }
}