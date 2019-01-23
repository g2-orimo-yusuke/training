<?php

namespace classes\db\daoMock;


use classes\db\daoIf\ihuman;

class Human implements ihuman
{
    public function __construct($dbObject)
    {
        // 何もしない
    }

    public function getTable(): array
    {
        return [
            0 => ['id' => '1', 'name' => 'mockName', 'age' => '20', 'email' => 'aa@aaa'],
            1 => ['id' => '2', 'name' => 'mockmock', 'age' => '30', 'email' => 'ccc@dafeaa'],
            2 => ['id' => '3', 'name' => 'mockdata', 'age' => '44', 'email' => '2222222222333@affefeafeafa'],
        ];
    }

    public function register(string $name, int $age, string $email): void
    {
        // 何もしない
    }

    public function getInfoById(int $id): array
    {
        return ['id' => '1', 'name' => 'mockName', 'age' => '20', 'email' => 'aa@aaa'];
    }

    public function change(int $id, string $name, int $age, string $email): void
    {
        // 何もしない
    }

    public function delete(int $id): void
    {
        // 何もしない
    }

}