<?php

namespace App\Database;

use PDO;

class Connection
{
    private static ?PDO $connection = null;

    public static function connect()
    {
        if(!self::$connection) {
            self::$connection = new PDO(
                'mysql:host=localhost;dbname=miniloja_phpoo',
                'conn',
                'ADMonly',
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
            );
        }

        return self::$connection;
    }
}
