<?php

namespace classes;

use classes\beans\ViewOutput;
use classes\cache\InMemoryDB;
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
     * @param mysqli_result $result
     * @param array         $arrColumn
     */
    public function printHumanTable(mysqli_result $result, array $arrColumn) :void
    {
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            echo '<tr>';
            foreach ($arrColumn as $k => $val) {
                // key名が'id'の場合のみ人編集画面へのリンクを付与する。
                if ($k == 'id') {
                    echo '<td><a href="/public/index.php?c=human/edit&id=' . $row[$k] . ' ">' . $row[$k] . '</a></td>';
                } else {
                    echo '<td>' . $row[$k] . '</td>';
                }
            }
            echo '</tr>';
        }
    }

    /**
     * 順位付きのランキングを一覧として画面に出力する。
     * ___________________
     * ||順位|key名|value||
     * ………………………………………………
     * ………………………………………………
     *
     * @param string $cacheKey
     * @param array  $array
     */
    public function printRankingTable(string $cacheKey, array $array) {

        $cache = new InMemoryDB();

        foreach ($array as $key => $val) {
            echo '<tr><td>' . $cache->getRank($cacheKey, $val) . '</td><td>'
                . $key .'</td><td>'
                . $val . '</td></tr>';
        }
    }

}