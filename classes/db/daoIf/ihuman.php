<?php

namespace classes\db\dao;

use mysqli;

interface ihuman
{
    /**
     * 人一覧情報をDBから取得し返却する。
     *
     * @param mysqli $mysqli
     *
     * @return mixed
     */
    public function getTable(mysqli $mysqli): \mysqli_result;

    /**
     * 人情報をDBに登録する。
     *
     * @param mysqli $mysqli
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @return mixed
     */
    public function register(mysqli $mysqli, string $name, int $age, string $email): void;

    /**
     * 指定idの人情報をDBから取得し、連想配列で返却する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     *
     * @return array
     */
    public function getInfoById(mysqli $mysqli, int $id): array;

    /**
     * DBの人情報を引数の情報で更新する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     * @param string $name
     * @param int    $age
     * @param string $email
     */
    public function change(mysqli $mysqli, int $id, string $name, int $age, string $email): void;

    /**
     * DBから引数のidの人情報を削除する。
     *
     * @param mysqli $mysqli
     * @param int    $id
     */
    public function delete(mysqli $mysqli, int $id): void;
}