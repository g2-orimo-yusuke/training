<?php

namespace classes;

use classes\beans\ViewOutput;
use mysqli_result;

/**
 * Viewの出力処理を記述するクラス
 */
class View
{
    /**
     * 渡されたBeanの情報を基にviewをechoで出力できる状態に成形する。
     *
     * @param ViewOutput $bean
     *
     * @return false|string
     */
    public function outPutView(ViewOutput $bean): string
    {
        ob_start();
        include(ROOT_PATH . $bean->getViewPath());
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    /**
     * 連想配列のvalueを一覧のヘッターとして出力する。
     *
     * @param array $arrColumn
     */
    public function printTableHeader(array $arrColumn): void
    {
        foreach ($arrColumn as $v) {
            echo '<th>' . $v . '</th>';
        }
    }

    /**
     * DBの取得結果と連想配列を基に一覧を画面に出力する。
     * DBの取得結果のカラム名と連想配列の要素名は一致している必要がある。
     *
     * @param array $result
     * @param array $arrColumn
     */
    public function printHumanTable(array $result, array $arrColumn): void
    {

        foreach ($result as $row) {
            echo '<tr>';
            $iterator = new ViewTableIterator($arrColumn, $row);
            foreach ($iterator as $k) {

            }
            echo '</tr>';
        }
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

    /**
     * 配列を一覧として画面に出力する。
     * 引数の形式 array: [[0]=>{要素1,要素2 ……}, [1]=>{要素1,要素2 ……} ……]
     *
     * @param array $array
     */
    public function printTableByArr(array $array): void
    {
        foreach ($array as $row) {
            echo '<tr>';
            foreach ($row as $val) {
                echo '<td>' . $val . '</td>';
            }
            echo '</tr>';
        }
    }

}