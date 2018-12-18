<?php

namespace classes;

use mysqli_result;

/**
 * ViewのPHPファイルを読み込み出力するためのクラス
 */
class view
{
    /**
     * 渡されたBeanの情報を基にviewをechoで出力できる状態に成形する。
     *
     * @param viewOutput $bean
     *
     * @return false|string
     */
    public function outPutView(viewOutput $bean)
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
    public function printTableHeader(array $arrColumn)
    {
        foreach ($arrColumn as $v) {
            echo '<th>' . $v . '</th>';
        }
    }

    /**
     * DBの取得結果と連想配列を基に一覧を画面に出力する。
     * DBの取得結果のカラム名と連想配列の要素名は一致している必要がある。
     *
     * @param mysqli_result $result
     * @param array         $arrColumn
     */
    public function printHumanTable(mysqli_result $result, array $arrColumn)
    {
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            echo '<tr>';
            foreach ($arrColumn as $k => $val) {
                // key名が'id'の場合のみ人編集画面へのリンクを付与する。
                if ($k == 'id') {
                    echo '<td><a href="/controller/human/edit.php?id=' . $row[$k] . '">' . $row[$k] . '</a></td>';
                } else {
                    echo '<td>' . $row[$k] . '</td>';
                }
            }
            echo '</tr>';

        }
    }
}
