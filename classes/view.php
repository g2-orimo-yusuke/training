<?php

namespace classes;

use mysqli_result;

/**
 * ViewのPHPファイルを読み込み出力するためのクラス
 */
class view
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
//        include_once(dirname(__FILE__) . '/../config/base.php');
//        include_once(ROOT_DIR_PATH . 'classes/config.php');
    }

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

    /**
     * 人一覧のヘッター部分を出力する。
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
     * 引数のDB取得結果を基に人一覧を画面に出力する。
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
                    echo '<td><a href="edit.php?id=' . $row[$k] . '">' . $row[$k] . '</a></td>';
                } else {
                    echo '<td>' . $row[$k] . '</td>';
                }
            }
            echo '</tr>';

        }
    }
}
