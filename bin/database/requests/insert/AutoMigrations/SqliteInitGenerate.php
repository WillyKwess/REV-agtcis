<?php

namespace bin\database\requests\insert\AutoMigrations;

use bin\database\query\Builders;
use bin\epaphrodite\danho\GuardPassword;

class SqliteInitGenerate extends Builders
{

  protected $Guard;

  public function __construct()
  {
      $this->Guard = new GuardPassword;
  }


  /**
   * **********************************************************************************************
   * Create recently users actions if not exist
   */
  private function create_recently_actions_if_not_exist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS recente_actions (idrecenteactions INTEGER PRIMARY KEY AUTOINCREMENT , usersactions varchar(20)NOT NULL , dateactions datetime , libactions varchar(300)NOT NULL)";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * **********************************************************************************************
   * Create auth_secure if not exist
   */
  private function create_auth_secure_if_not_exist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS auth_secure (idtoken_secure INTEGER PRIMARY KEY AUTOINCREMENT , auth varchar(300)NOT NULL , auth_key varchar(200) NOT NULL )";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * ********************************************************************************************** 
   * Create user if not exist
   */
  private function create_user_if_not_exist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS user_bd (iduser_bd INTEGER PRIMARY KEY , loginuser_bd varchar(20)NOT NULL , mdpuser_bd varchar(100) NOT NULL , nomprenoms_user varchar(150) DEFAULT NULL , contact_user varchar(10) DEFAULT NULL , email_user varchar(50) DEFAULT NULL , type_user_bd int(1) NOT NULL DEFAULT '1' , etat_userbd int(1) NOT NULL DEFAULT '1' )";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * ********************************************************************************************** 
   * Create user if not exist
   */
  private function create_first_user_if_not_exist()
  {

    $sql = "INSERT INTO user_bd ( iduser_bd , loginuser_bd , mdpuser_bd) VALUE ( ? , ? , ?)";

    static::process()->insert($sql, [ 1 , 'admin', $this->Guard->CryptPassword('admin') ] , true, false);
  }

  /**
   * ********************************************************************************************** 
   * Create user right if not exist
   */
  private function create_user_right_if_not_exist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS user_rights (iduser_rights INTEGER PRIMARY KEY AUTOINCREMENT , modules varchar(200)NOT NULL  , idpages varchar(200)NOT NULL , idtype_user_rights int(11)NOT NULL  , menus varchar(200)NOT NULL , autorisations int(1)NOT NULL )";

    static::process()->insert($sql, NULL, false);
  }


  /** 
   * **********************************************************************************************
   * Create user and auth_secure if not exist
   */
  public function CreatedTableSqlite()
  {

    $this->create_user_right_if_not_exist();

    $this->create_user_if_not_exist();

    $this->create_auth_secure_if_not_exist();

    $this->create_recently_actions_if_not_exist();

    $this->create_first_user_if_not_exist();
  }  

}