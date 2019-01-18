<?php

namespace classes\db;

use classes\cache\InMemoryDB;
use classes\exception\appException;
use Exception;
use mysqli;

/**
 * human機能のDB操作に関する処理を記述するクラス
 *
 * Class human
 * @package classes\db
 */
class Human extends Base
{
    /**
     * 人一覧情報をDBから取得し返却する。
     *
     * @param mysqli $mysqli
     *
     * @return bool|\mysqli_result
     */
    public function getTable(mysqli $mysqli)
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
    public function register(mysqli $mysqli, string $name, int $age, string $email): void
    {
        $query = 'INSERT INTO human (name, age, email) VALUES (?, ?, ?)';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sis', $name, $age, $email);
            $stmt->execute();
            $stmt->close();

        } catch (Exception $e) {
            throw new appException('dbError');
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
    public function getInfoById(mysqli $mysqli, int $id): array
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
            throw new appException('dbError');
        }
    }

    /**
     * DBの人情報を引数の情報で更新する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @throws appException
     * @throws Exception
     */
    public function change(mysqli $mysqli, int $id, string $name, int $age, string $email): void
    {
        $query = 'UPDATE human SET name=?, age=?, email=? WHERE id=?';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sisi', $name, $age, $email, $id);
            $stmt->execute();
            $stmt->close();

            $cache = new InMemoryDB();
            $cache->zIncrBy('changeCount', 1, $id);

        } catch (Exception $e) {
            throw new appException('dbError');
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
    public function delete(mysqli $mysqli, int $id): void
    {
        $query = 'DELETE FROM human WHERE id=?';
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();

            $cache = new InMemoryDB();
            $cache->zRem('changeCount', $id);

        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

}
