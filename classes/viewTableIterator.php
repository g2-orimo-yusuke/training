<?php
/**
 * Created by PhpStorm.
 * User: orimo.yusuke
 * Date: 2019-01-17
 * Time: 20:02
 */

namespace classes;

/**
 * 一覧出力用のイテレータクラス
 *
 * Class ViewTableIterator
 * @package classes
 */
class ViewTableIterator implements \IteratorAggregate
{
    protected $attributes;
    protected $add;

    public function __construct(array $result, array $row)
    {
        $this->attributes = $result;
        $this->add = $row;
    }

    /**
     * イテレータを返却する。
     *
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        foreach ($this->attributes as $k => $val) {
            $this->printColumn($k, $this->add[$k], '/public/index.php?c=human/edit&id=');
        }
        return new \ArrayIterator();
    }

    /**
     * テーブルのカラム部分を画面に出力する。
     * colNameがidの場合のみidのリンクを付与する
     *
     * @param string $colName
     * @param string $param
     * @param string $link
     */
    private function printColumn(string $colName, string $param, string $link = '')
    {
        if ($colName == 'id') {
            echo '<td><a href="' . $link . $param . ' ">' . $param . '</a></td>';
        } else {
            echo '<td>' . $param . '</td>';
        }
    }

}