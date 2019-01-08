<?php

namespace classes\beans;

/**
 * view表示用のデータを格納するBeanクラス
 *
 * Class viewOutput
 * @package classes
 */
class ViewOutput
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
     * view名を返却する。
     *
     * @return string
     */
    public function getViewName(): string
    {
        return $this->viewName;
    }

    /**
     * view名をセットする。
     *
     * @param string $viewName
     */
    public function setViewName(string $viewName): void
    {
        $this->viewName = $viewName;
    }

    /**
     * 遷移先のview名を返却する。
     *
     * @return array
     */
    public function getNextViewName(): array
    {
        return $this->nextViewName;
    }

    /**
     * 遷移先のview名をセットする。
     *
     * @param array $nextViewName
     */
    public function setNextViewName(array $nextViewName): void
    {
        $this->nextViewName = $nextViewName;
    }

    /**
     * メッセージを返却する。
     *
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * メッセージをセットする。
     *
     * @param array $message
     */
    public function setMessage(array $message): void
    {
        $this->message = $message;
    }

    /**
     * 画面表示に使用する配列を返却する。
     *
     * @return array
     */
    public function getOutputArray(): array
    {
        return $this->outputArray;
    }

    /**
     * 画面表示に使用する配列をセットする。
     *
     * @param array $outputArray
     */
    public function setOutputArray(array $outputArray): void
    {
        $this->outputArray = $outputArray;
    }

    /**
     * DB取得結果を返却する。
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * DB取得結果をセットする。
     *
     * @param $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * 表示するviewのパスを返却する。
     *
     * @return string
     */
    public function getViewPath(): string
    {
        return $this->viewPath;
    }

    /**
     * 表示するviewのパスをセットする。
     *
     * @param string $viewPath
     */
    public function setViewPath(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }

}