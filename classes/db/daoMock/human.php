<?php

namespace classes\db\dao;


use mysqli;

class HumanMock implements ihuman
{
    public function getTable(mysqli $mysqli): \mysqli_result
    {
        // TODO: Implement getTable() method.
    }

    public function register(mysqli $mysqli, string $name, int $age, string $email): void
    {
        // TODO: Implement register() method.
    }

    public function getInfoById(mysqli $mysqli, int $id): array
    {
        // TODO: Implement getInfoById() method.
    }

    public function change(mysqli $mysqli, int $id, string $name, int $age, string $email): void
    {
        // TODO: Implement change() method.
    }

    public function delete(mysqli $mysqli, int $id): void
    {
        // TODO: Implement delete() method.
    }

}