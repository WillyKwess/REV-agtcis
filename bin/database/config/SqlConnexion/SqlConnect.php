<?php

namespace bin\database\config\SqlConnexion;

use PDO;
use PDOException;
use bin\database\config\ini\GetConfig;

class SqlConnect extends GetConfig
{

    /**
     * Connexion Sql Serveur
    */
    protected function SqlServer($db){

        // Try to connect to database to etablish connexion
        try { 
            return new PDO(
                    "sqlsrv:Server=".static::DB_HOST($db).",".static::DB_PORT($db).";Database=".static::DB_DATABASE($db), 
                    static::DB_USER($db) , 
                    static::DB_PASSWORD($db) , 
                    self::SqlserverOPTION
                );

        // If impossible send error message        
        }catch (PDOException $e) {
            
            $this->getError($e->getMessage());
        }
    }

    /**
     * Connexion Mysql
    */    
    protected function Mysql($db){

        // Try to connect to database to etablish connexion
        try { 
            return new PDO(
                    "mysql:".static::DB_HOST($db).";".static::DB_MysqlPORT($db).";dbname=".static::DB_DATABASE($db), 
                    static::DB_USER($db) , 
                    static::DB_PASSWORD($db) , 
                    self::MysqlOPTION
                );

        // If impossible send error message        
        }catch (PDOException $e) {
            
            $this->getError($e->getMessage());
        }        
    }

    /**
     * Connexion PostgreSQL
    */    
    protected function PostgreSQL($db){
       
        // Try to connect to database to etablish connexion
        try { 
            return new PDO(
                    "pgsql:".static::DB_HOST($db).";".static::DB_MysqlPORT($db).";dbname=".static::DB_DATABASE($db), 
                    static::DB_USER($db) , 
                    static::DB_PASSWORD($db) , 
                    self::MysqlOPTION
                );

        // If impossible send error message        
        }catch (PDOException $e) {
            
            $this->getError($e->getMessage());
        }        
    }  
    
    /**
     * Connexion PostgreSQL
    */      
    protected function SqlLite($db)
    {

        // Try to connect to database to etablish connexion
        try {
            return new PDO('sqlite:'.static::DB_SQLITE($db),
            static::DB_USER($db) , 
            static::DB_PASSWORD($db) , 
            static::SqliteOPTION );

        // If impossible send error message    
        } catch (PDOException $e) {

            static::getError($e->getMessage());
        }         
    }


}
