<?php

namespace classes\db\daoMock;

/**
 * Mockの共通的な処理を記述するクラス
 *
 * Class base
 * @package classes\db\daoMock
 */
class Base
{
    /**
     * Mockのため何もしない
     */
    public function dbConnect()
    {
        return null;
    }
}