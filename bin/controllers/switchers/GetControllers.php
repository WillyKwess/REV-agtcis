<?php

namespace bin\controllers\switchers;

use bin\controllers\switchers\ControllersSwitchers;

class GetControllers extends ControllersSwitchers
{
    private $api;
    private $main;
    private $users;
    private $setting;
    private $dashboard;

    /**
     * Get class
     * @return void
    */
    public function __construct()
    {
        $this->api = new \bin\controllers\controllers\api;
        $this->main = new \bin\controllers\controllers\main;
        $this->setting = new \bin\controllers\controllers\setting;
        $this->users = new \bin\controllers\controllers\utilisateur;
        $this->dashboard = new \bin\controllers\controllers\dashboard;
    }

    /**
      * Return true controller
      *
      * @param null|array $provider
      * @param null|string $paths
      * @return void
    */
    public function SwitchMainControllers( ?array $provider = [] , ?string $paths = NULL ):void
    {

        /**
         * @param mixed $controller
         * @param mixed $provider
         * @param null|bool $switch
         * @return bool
        */
        switch ( $provider ) 
        {
            // Connect to Dashboard controller
            case static::GetController( "dashboard" , $provider , true ) === true:

                $this->SwitchControllers( $this->dashboard , $paths , true );
                break;

            // Connect to Users controller
            case static::GetController( "users" , $provider , true ) === true:

                $this->SwitchControllers( $this->users , $paths , true );
                break;

            // Connect to Setting controller    
            case static::GetController( "setting" , $provider , true ) === true:
                
                $this->SwitchControllers( $this->setting , $paths , true );
                break;

            // Connect to API controller    
            case static::GetController( "api" , $provider ) === true:
                
                $this->SwitchControllers( $this->api , $paths , true );
                break;                

            // Connect to Main controller (Default)   
            default:
            $this->SwitchControllers( $this->main ,  str_replace( '/' , '', $paths) );
        }
    }
}