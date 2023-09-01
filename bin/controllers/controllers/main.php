<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

class main extends MainSwitchers
{

    private $msg;
    private $env;
    private $UsersAuth;

    /**
     * *****************************************************************************************************************************
     * Get class
     */
    function __construct()
    {
        $this->msg = new static::$MainNameSpace['msg'];
        $this->env = new static::$MainNameSpace['env'];
        $this->UsersAuth = new \bin\epaphrodite\danho\DanhoAuth;
    }

    public function SendToEpaphroditeControllers($html)
    {
        $reponses='';
            /**
             * main index
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
           
             if(static::SwitcherPages( 'index' , $html )===true){

                static::rooter()->target( _DIR_MAIN_TEMP_ . $html )->content([ NULL ])->get();  
             }

            /**
             * Authentification page ( login )
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if (static::SwitcherPages('login' , $html )===true) {

                $class = null;

                if (isset($_POST['submit'])) {

                    $result = $this->UsersAuth->UsersAuthManagers($_POST['login'], $_POST['password']);
                    if ($result === false) {
                        $reponses = $this->msg->answers('login-wrong');
                        $class = "error";
                    }
                }

                static::rooter()->target(_DIR_MAIN_TEMP_. $html)->content(['class' => $class,'reponse' => $reponses])->get(); 
            } 

            /**
             * Authentification de la page etablissement  ( loginets )
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if (static::SwitcherPages('loginets' , $html )===true) {

                $class = null;

                if (isset($_POST['submit'])) {

                    $result = $this->UsersAuth->EtsAuthManagers($_POST['login'], $_POST['password']);
                    if ($result === false) {
                        $reponses = $this->msg->answers('login-wrong');
                        $class = "error";
                    }
                }

                static::rooter()->target(_DIR_MAIN_TEMP_. $html)->content(['class' => $class,'reponse' => $reponses])->get(); 
            } 

    }
}