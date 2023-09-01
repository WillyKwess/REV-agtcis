<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

class dashboard extends MainSwitchers
{

    private $msg;
    private $env;
    private $count;
    private $email;
    private $GetId;

    function __construct()
    {
        $this->count = new $this->SqlRequest['count'];
        $this->GetId = new $this->SqlRequest['getid'];
        $this->email = new static::$MainNameSpace['mail'];
    }

    public function SendToEpaphroditeControllers($html)
    {
            
            /**
             * Dashboard for super admin
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'dashboard/super_admin' , $html ) === true ) {
                
                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content(['count' => $this->count,'select' => $this->GetId,],true)->get(); 
            }

            /**
             * Dashboard for administrateur users
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'dashboard/admin' , $html ) === true ) {

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content(['count' => $this->count,'select' => $this->GetId],true)->get(); 
            }

            /**
             * Dashboard for simple users
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if (static::SwitcherPages( 'dashboard/user' , $html ) === true) {

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content(['count' => $this->count,'select' => $this->GetId,],true)->get(); 
            } 

            /**
             * Dashboard for établissement
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if (static::SwitcherPages( 'dashboard/etablissement' , $html ) === true) {

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content(['count' => $this->count,'select' => $this->GetId,],true)->get(); 
            } 
    }
}
