<?php

namespace classes\db\daoIf;

interface ihuman
{
    /**
     * 人一覧情報をDBから取得し返却する。
     *
     * @return mixed
     */
    public function getTable(): array;

    /**
     * 人情報をDBに登録する。
     *
     * @param string $name
     * @param int    $age
     * @param string $email
     *
     * @return mixed
     */
    public function register(string $name, int $age, string $email): void;

    /**
     * 指定idの人情報をDBから取得し、連想配列で返却する。
     *
     * @param int $id
     *
     * @return array
     */
    public function getInfoById(int $id): array;

    /**
     * DBの人情報を引数の情報で更新する。
     *
     * @param int    $id
     * @param string $name
     * @param int    $age
     * @param string $email
     */
    public function change(int $id, string $name, int $age, string $email): void;

    /**
     * DBから引数のidの人情報を削除する。
     *
     * @param int $id
     */
    public function delete(int $id): void;
}