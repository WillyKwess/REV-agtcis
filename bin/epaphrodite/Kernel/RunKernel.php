<?php

namespace bin\epaphrodite\Kernel;

use bin\controllers\render\Http\ConfigHttp;

class RunKernel extends ConfigHttp
{

  private $GetUrl;
  private $Switchers;
  private $InterfaceManager;

    public function __construct()
    {
        $this->Switchers = new \bin\controllers\switchers\GetControllers;
        $this->InterfaceManager = new \bin\epaphrodite\EpaphMozart\Templates\ConfigDashboardPages;
    }

    /* 
      * Lancer l'application 
    */
    public function Run()
    {

        /**
         * @return mixed
        */
        $this->GetUrl = $this->HttpResponses();

        /**
         * Get user authentification page or destroy session ---- @@@@@@@@@ ----
         * @var mixed $GetUrl
        */
        if ($this->GetUrl === _LOGIN_ || $this->GetUrl === _LOGOUT_ ) {

            static::auth()->deconnexion();

            $this->GetUrl = $this->InterfaceManager->login();
        } elseif ($this->GetUrl === _LOGINETS_ || $this->GetUrl === _LOGOUT_) {

            static::auth()->deconnexion();

            $this->GetUrl = $this->InterfaceManager->loginets();
        }

        /**
         * Get user authentification page or destroy session
        */
        if ($this->GetUrl === _DASHBOARD_ && static::auth()->id() === NULL) {

            static::auth()->deconnexion();

            $this->GetUrl = $this->InterfaceManager->main();
        }

        /**
         * Get user dashbord page
         * @return mixed
        */
        if ($this->GetUrl === _DASHBOARD_ && static::auth()->token_csrf() !== NULL && static::auth()->id() !== NULL && static::auth()->login() !== NULL) {

            $this->GetUrl = $this->InterfaceManager->admin(static::auth()->type(), $this->GetUrl);
            
        } elseif($this->GetUrl === _DASHBOARD_ && static::auth()->token_csrf() !== NULL && static::auth()->id() !== NULL && static::auth()->loginets() !== NULL) {

            $this->GetUrl = $this->InterfaceManager->admin(static::auth()->type(), $this->GetUrl);
        }

        /**
         * Force users to users to save his informations
        */
        if ($this->GetUrl === _DASHBOARD_ && static::auth()->id() !== NULL && empty(static::auth()->nomprenoms()) && empty(static::auth()->email()) && empty(static::auth()->contact())) {

            $this->GetUrl = $this->InterfaceManager->profil();
        }        

        /**
         * Return true user page
         * @param null|array $provider
         * @param null|string $paths
         * @return void
        */
        $this->Switchers->SwitchMainControllers( explode('/', $this->GetUrl) , $this->provider(explode('/', $this->GetUrl)) );
    }

}
