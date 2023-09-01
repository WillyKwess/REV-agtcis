<?php

namespace bin\database\config\NoSqlConnexion;

use bin\database\config\ini\GetConfig;
use Exception;

class NoSqlConnect extends GetConfig
{

    protected function MangoDB($db){
/*
        $dsn = "mongodb:host=".static::DB_HOST($db)."=localhost;port=".static::DB_PORT($db);
        $options = [
            "username" => static::DB_USER($db),
            "password" => static::DB_PASSWORD($db),
            "authSource" => static::DB_DATABASE($db),
            "authMechanism" => "SCRAM-SHA-256"
        ];

        try {

            return new \MongoDB\Driver\Manager($dsn, $options);

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    
    }
*/
}
}