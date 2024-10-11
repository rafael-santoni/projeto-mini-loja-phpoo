<?php

namespace App\Database;

use PDO;

class Connection
{
    private static ?PDO $connection = null;

    public static function connect()
    {
        $host = $_ENV['DATABASE_HOST'];
        $user = $_ENV['DATABASE_USER'];
        $pass = $_ENV['DATABASE_PASS'];
        $name = $_ENV['DATABASE_NAME'];

        if(!self::$connection) {
            self::$connection = new PDO(
                'mysql:host='.$host.';dbname='.$name,
                $user,
                $pass,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
            );
        }

        return self::$connection;
    }
}
