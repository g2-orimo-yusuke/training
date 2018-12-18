<?php

namespace classes;

use config\Base;
use Exception;
use mysqli;

/**
 * DB操作に関する処理を記述するクラス
 */
class db
{
    /**
     * 渡された要素名を基にDB接続のための情報を返却する。
     *
     * @param  String  要素名
     *
     * @return String  DB接続情報
     */
    public static function getInfo($infoElements)
    {
        return Base::$arrDb[$infoElements] ?? null;
    }

    /**
     * @return mysqli DB接続オブジェクト
     */
    function dbConnect()
    {
        $host = db::getInfo('dbHost');
        $username = db::getInfo('dbUsername');
        $password = db::getInfo('dbPassword');
        $dbname = db::getInfo('dbName');

        $mysqli = new mysqli($host, $username, $password, $dbname);
        if ($mysqli->connect_error) {
            error_log($mysqli->connect_error);
            exit;
        }
        return $mysqli;
    }

    /**
     * 人一覧情報をDBから取得し返却する。
     *
     * @param mysqli $mysqli
     *
     * @return bool|\mysqli_result
     */
    function getHumanTable(mysqli $mysqli)
    {
        $query = 'SELECT id, name, age, email FROM human ORDER BY id ASC';
        return $mysqli->query($query);
    }

    /**
     * 人情報をDBに登録する。
     *
     * @param mysqli $mysqli
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @throws Exception
     */
    function registerHuman(mysqli $mysqli, string $name, int $age, string $email)
    {
        $query = 'INSERT INTO human (name, age, email) VALUES (?, ?, ?)';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sis', $name, $age, $email);
            $stmt->execute();
            $stmt->close();

        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * 指定idの人情報をDBから取得し、連想配列で返却する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     *
     * @return array
     * @throws Exception
     */
    function getHumanInfo(mysqli $mysqli, int $id)
    {
        $query = 'SELECT id, name, age, email FROM human WHERE id=?';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($id, $name, $age, $email);
            $stmt->fetch();
            $stmt->close();

            $result = ['id' => $id, 'name' => $name, 'age' => $age, 'email' => $email];

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * DBの人情報を引き数の情報で更新する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @throws Exception
     */
    function changeHuman(mysqli $mysqli, int $id, string $name, int $age, string $email)
    {

        $query = 'UPDATE human SET name=?, age=?, email=? WHERE id=?';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sisi', $name, $age, $email, $id);
            $stmt->execute();
            $stmt->close();

        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * DBから引数のidの人情報を削除する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     *
     * @throws Exception
     */
    function deleteHuman(mysqli $mysqli, int $id)
    {
        $query = 'DELETE FROM human WHERE id=?';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
