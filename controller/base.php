<?php

namespace controller;

/**
 * Controllerのベースクラス。
 *
 * Class base
 * @package controller
 */
abstract class base
{
    /**
     * controllerの実行処理
     *
     * @return mixed
     */
    abstract function action();
}