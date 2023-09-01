<?php

namespace bin\database\config\process;

use bin\database\config\SqlConnexion\SqlConnect;

class GetSqlDatabase extends SqlConnect
{
    
    protected function SqlConnect($db)
    {
        
        switch ( $db ) 
        {

            case static::DB_DRIVER($db) === 'mysql':
                
                return $this->Mysql($db);
                break;

            case static::DB_DRIVER($db) === 'sqlLite':

                return $this->SqlLite($db);
                break; 
                
            case static::DB_DRIVER($db) === 'sqlserver':

                return $this->SqlServer($db);
                break;
    
            case static::DB_DRIVER($db) === 'pgsql':

                return $this->PostgreSQL($db);  
                break;                
        }
    }

}

