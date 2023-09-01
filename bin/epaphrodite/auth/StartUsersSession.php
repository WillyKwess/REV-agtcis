<?php

namespace bin\epaphrodite\auth;

use bin\epaphrodite\auth\Contracts\StartSession;
use bin\epaphrodite\constant\EpaphClass;

class StartUsersSession extends EpaphClass implements StartSession{

    private $locate;

    public function StartUsersSession( $AuthId , $AuthLogin , $AuthNomprenoms , $AuthContact , $AuthEmail , $AuthTypes ){

        session_status() === PHP_SESSION_ACTIVE ?: session_start();

        static::HardSession()->StartSession( $AuthId , $AuthLogin , $AuthNomprenoms , $AuthContact , $AuthEmail , $AuthTypes );

        if (static::CrsfSecure()->get_csrf($this->key()) !== 0) {
            
            static::UsersCookies()->set_user_cookies($this->key());
          }

          $this->locate = static::path()->dashboard();

          header("Location: $this->locate ");
    }


    /**
     * Ouverture de session de l’établissement par StartEtsSession
     * @param mixed $idEts
     * @param mixed $codeEts
     * @param mixed $nomEts
     * @param mixed $emailEts
     * @return void
     */
    public function StartEtsSession( $idEts , $codeEts , $nomEts , $emailEts ){

      session_status() === PHP_SESSION_ACTIVE ?: session_start();

      static::HardSession()->StartSession( $idEts , $codeEts , $nomEts , $emailEts );

      if (static::CrsfSecure()->get_csrf($this->key()) !== 0) {
          
          static::UsersCookies()->set_user_cookies($this->key());
        }

        $this->locate = static::path()->dashboard();

        header("Location: /dashboard/etablissement/");
  }


  /**
   * Current cookies value
   */
  private function key():string
  {
    return $_COOKIE[ static::messages()->answers('token_name') ];
  }   

}