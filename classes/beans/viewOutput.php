<?php
/**
 * Created by PhpStorm.
 * User: orimo.yusuke
 * Date: 2018-12-17
 * Time: 18:23
 */

namespace classes;

/**
 * view表示用のデータを格納するBeanクラス
 *
 * Class viewOutput
 * @package classes
 */
class viewOutput
{
    /* 画面名 */
    private $viewName = '';
    /* 遷移先の画面名 */
    private $nextViewName = [];
    /* メッセージ */
    private $message = [];
    /* 画面表示に利用する配列 */
    private $outputArray = [];
    /* 画面表示に利用するDB取得結果 */
    private $result = null;
    /* 表示するviewのpath */
    private $viewPath = '';

    /**
     * @return string
     */
    public function getViewName(): string
    {
        return $this->viewName;
    }

    /**
     * @param string $viewName
     */
    public function setViewName(string $viewName): void
    {
        $this->viewName = $viewName;
    }

    /**
     * @return array
     */
    public function getNextViewName(): array
    {
        return $this->nextViewName;
    }

    /**
     * @param array $nextViewName
     */
    public function setNextViewName(array $nextViewName): void
    {
        $this->nextViewName = $nextViewName;
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * @param array $message
     */
    public function setMessage(array $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getOutputArray(): array
    {
        return $this->outputArray;
    }

    /**
     * @param array $outputArray
     */
    public function setOutputArray(array $outputArray): void
    {
        $this->outputArray = $outputArray;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getViewPath(): string
    {
        return $this->viewPath;
    }

    /**
     * @param string $viewPath
     */
    public function setViewPath(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }

}