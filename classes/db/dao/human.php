<?php

namespace classes\db\dao;

use classes\cache\InMemoryDB;
use classes\db\daoIf\ihuman;
use classes\exception\appException;
use Exception;

/**
 * human機能のDB操作に関する処理を記述するクラス
 *
 * Class human
 * @package classes\db
 */
class Human implements ihuman
{
    private static $dbObject;

    /**
     * Human constructor.
     *
     * @param Base $dbObject
     *
     * @throws appException
     */
    public function __construct($dbObject)
    {
        self::$dbObject = $dbObject;
        try {
            self::$dbObject->dbConnect();
        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

    /**
     * 人一覧情報をDBから取得し返却する。
     *
     * @return bool|array
     * @throws Exception
     */
    public function getTable(): array
    {
        try {
            $query = 'SELECT id, name, age, email FROM human ORDER BY id ASC LIMIT 100';

            return self::$dbObject->query($query);
        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

    /**
     * 人情報をDBに登録する。
     *
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @throws Exception
     */
    public function register(string $name, int $age, string $email): void
    {
        $query = 'INSERT INTO human (name, age, email) VALUES (?, ?, ?)';
        try {
            self::$dbObject->prepare($query, 'sis', $name, $age, $email);
            self::$dbObject->execute();
            self::$dbObject->close();

        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

    /**
     * 指定idの人情報をDBから取得し、連想配列で返却する。
     *
     * @param int $id
     *
     * @return array
     * @throws Exception
     */
    public function getInfoById(int $id): array
    {
        $query = 'SELECT id, name, age, email FROM human WHERE id=?';
        try {
            self::$dbObject->prepare($query, 'i', $id);
            self::$dbObject->execute();
            $result = self::$dbObject->getResult();
            self::$dbObject->close();

            return array_shift($result);
        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

    /**
     * DBの人情報を引数の情報で更新する。
     *
     * @param int    $id
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @throws appException
     * @throws Exception
     */
    public function change(int $id, string $name, int $age, string $email): void
    {
        $query = 'UPDATE human SET name=?, age=?, email=? WHERE id=?';
        try {
            self::$dbObject->prepare($query, 'sisi', $name, $age, $email, $id);
            self::$dbObject->execute();
            self::$dbObject->close();

            $cache = new InMemoryDB();
            $cache->zIncrBy('changeCount', 1, $id);

        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

    /**
     * DBから引数のidの人情報を削除する。
     *
     * @param int $id
     *
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $query = 'DELETE FROM human WHERE id=?';
        try {
            self::$dbObject->prepare($query, 'i', $id);
            self::$dbObject->execute();
            self::$dbObject->close();

            $cache = new InMemoryDB();
            $cache->zRem('changeCount', $id);

        } catch (Exception $e) {
            throw new appException('dbError');
        }
    }

}