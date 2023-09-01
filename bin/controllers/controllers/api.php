<?php

namespace bin\controllers\controllers;

use bin\epaphrodite\heredia\HerediaApiSwitcher;
use bin\epaphrodite\env\config\ResponseSequence;


class api extends HerediaApiSwitcher
{

    protected $Response;

    function __construct()
    {
        $this->Response = new ResponseSequence;
    }

    /**
     * @param mixed $Methods
     * @param mixed $paths
     * @param mixed $autorisation
     * @return bool
    */
    protected function SendToEpaphroditeControllers($html)
    {
    
        /**
         * @param mixed $Methods
         * @param mixed $autorisation
         * @param mixed $inipaths
         * @param mixed $FromUrl
         * @return bool
        */
       if( static::GetApiRoot( 'GET' , 'list_users' , $html , true ) === true ){

            return $this->Response->JsonResponse( 'StatutCode' , [] );
       }
    }
}
