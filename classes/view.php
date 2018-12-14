<?php

namespace classes;

use mysqli_result;

/**
 * ViewのPHPファイルを読み込み出力するためのクラス
 */
class view
{
    /**
     * PHPファイルを外部読み込みし、人情報登録の画面表示用文字列を返却する。
     *
     * @param  String $message
     *
     * @return String
     */
    public function outPutViewRegist($message)
    {
        //　画面に表示する画面名を取得
        $registViewName = config::getViewName('registHuman');
        $tableViewName = config::getViewName('humanTable');

        ob_start();
        include(ROOT_DIR_PATH . 'view/human/regist.php');
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }


    public function outPutViewTable(\mysqli_result $result, string $message)
    {
        // 画面に表示する画面名を取得
        $registViewName = config::getViewName('registHuman');
        $tableViewName = config::getViewName('humanTable');
        $arrColumn = config::getColumnArr();

        ob_start();
        include(ROOT_DIR_PATH . 'view/human/table.php');
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function outPutViewEdit(array $result, string $message) {

        // 画面に表示する画面名を取得
        $editViewName = config::getViewName('editHuman');
        $tableViewName = config::getViewName('humanTable');

        ob_start();
        include(ROOT_DIR_PATH . 'view/human/edit.php');
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    /**
     * 連想配列のvalueを一覧のヘッターとして出力する。
     *
     * @param array $arrColumn
     */
    public function printHumanTableHeader(array $arrColumn)
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
     * @param               $arrColumn
     */
    public function printHumanTable(mysqli_result $result, $arrColumn)
    {
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            echo '<tr>';
            foreach ($arrColumn as $k => $val) {
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
