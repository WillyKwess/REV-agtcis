<?php

namespace bin\database\requests\select;

use bin\database\query\Builders;
use bin\database\requests\insert\AutoMigrations\MysqlInitGenerated;
use bin\database\requests\insert\AutoMigrations\SqliteInitGenerate;

class auth extends Builders
{

  private $RunMysqlSeeder;
  private $RunSqliteSeeder;

  /**
   * @var \bin\database\requests\insert\AutoMigrations\MysqlInitGenerated $RunMysqlSeeder
   * @var \bin\database\requests\insert\AutoMigrations\SqliteInitGenerate $RunSqliteSeeder
   * @return void
  */
  function __construct()
  {
    $this->RunMysqlSeeder = new MysqlInitGenerated;
    //$this->RunSqliteSeeder = new SqliteInitGenerate;
  }

  /**
   * Verify if user_bd table exist in database
   * @return bool
   */
  public function if_table_exist(): bool
  {

    try {

      $sql = $this->QueryBuilder()
        ->table('user_bd')
        ->SQuery();

      static::process()->select($sql, NULL, false);

      return true;
    } catch (\Exception $e) {

      return false;
    }
  }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return void
   */
  public function SqlToCheckUsers(string $loginuser)
  {

    if ($this->if_table_exist() === true) {

      $sql = $this->QueryBuilder()
        ->table('user_bd')
        ->like('loginuser_bd')
        ->limit(0,1)
        ->SQuery();

      $result = static::process()->select($sql, ["$loginuser"], true);

      return $result;
    } else {

      $this->RunMysqlSeeder->CreateTableMysql();

      //static::DRIVER === 'mysql' ? $this->RunMysqlSeeder->CreateTableMysql() : $this->RunSqliteSeeder->CreatedTableSqlite() ;

      return NULL;
    }
  }

  /**
   * Verify if établissements exist in database
   *
   * @param string $emailEts
   * @return void
   */
  public function SqlToCheckEts(string $emailEts)
  {

    if ($this->if_table_exist() === true) {

      $sql = $this->QueryBuilder()
        ->table('etablissements')
        ->like('emailEts')
        ->limit(0,1)
        ->SQuery();

      $result = static::process()->select($sql, ["$emailEts"], true);

      return $result;
    } else {

      $this->RunMysqlSeeder->CreateTableMysql();

      //static::DRIVER === 'mysql' ? $this->RunMysqlSeeder->CreateTableMysql() : $this->RunSqliteSeeder->CreatedTableSqlite() ;

      return NULL;
    }
  }

}
