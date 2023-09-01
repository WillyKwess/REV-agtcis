<?php

namespace bin\epaphrodite\danho;

use bin\epaphrodite\auth\StartUsersSession;

class DanhoAuth extends StartUsersSession{

  private $Guard;
  private $AuthSQL;
  
    /**
     * Get class 
     * @return void
     */
    function __construct()
    {
      $this->Guard = new $this->Guards['guard'];
      $this->AuthSQL = new $this->Guards['sql'];
    }    

    /**
   * **********************************************************************************************
   * Verify authentification of user
   *
   * @param string $login
   * @param string $motpasse
   * @return bool
   */
  public function UsersAuthManagers(string $login, string $motpasse)
  {

    if ((static::checker()->only_number_and_character($login, 12)) === false) {

      $result = $this->AuthSQL->SqlToCheckUsers($login);

      if (!empty($result)) {

        if ($this->Guard->AuthenticatedPassword( $result[0]["mdpuser_bd"] , $motpasse) === true) {
          
            $this->StartUsersSession($result[0]["iduser_bd"] , $result[0]["loginuser_bd"] , $result[0]["nomprenoms_user"] , $result[0]["contact_user"] , $result[0]["email_user"] , $result[0]["type_user_bd"]);

        } else { return false; }

      } else { return false; }
      
    } else { return false;}
  }


  /**
   * **********************************************************************************************
   * Verify authentification of établissement
   *
   * @param string $login
   * @param string $motpasse
   * @return bool
   */
  public function EtsAuthManagers(string $login, string $motpasse)
  {

    if ((static::checker()->only_number_and_character($login, 12)) === false) {

      $result = $this->AuthSQL->SqlToCheckEts($login);

      if (!empty($result)) {

        if ($this->Guard->AuthenticatedPassword( $result[0]["passwordEts"] , $motpasse) === true) {
          
            $this->StartEtsSession($result[0]["idEts"] , $result[0]["codeEts"] , $result[0]["nomEts"] , $result[0]["emailEts"]);

        } else { return false; }

      } else { return false; }
      
    } else { return false;}
  }

}