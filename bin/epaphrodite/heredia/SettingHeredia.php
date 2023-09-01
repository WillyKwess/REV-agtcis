<?php

namespace bin\epaphrodite\heredia;

use bin\epaphrodite\constant\StaticArray;

class SettingHeredia extends StaticArray{

    private $msg;
    private $datas;
    private $paths;
    private $session;
    private $layouts;

    /**
     * @return void
    */
    function __construct()
    {
        $this->msg = new SELF::$MainNameSpace['msg'];
        $this->paths = new SELF::$MainNameSpace['paths'];
        $this->datas = new SELF::$MainNameSpace['datas'];
        $this->layouts = new SELF::$MainNameSpace['layout'];
        $this->session = new SELF::$MainNameSpace['session'];
    }

    /**
     * Set main_init layouts params
     * 
     * @return array
     */
    public function MainUserInitLayouts():array
    {
        return 
        [
            /*
            |--------------------------------------------------------------------------
            | Set path to front in default
            |--------------------------------------------------------------------------
            */
            'path' => $this->paths,

            /*
            |--------------------------------------------------------------------------
            | Set datas to front in default
            |--------------------------------------------------------------------------
            */            
            'data' => $this->datas,              

            /*
            |--------------------------------------------------------------------------
            | Set messages text to front in default
            |--------------------------------------------------------------------------
            */            
            'messages' => $this->msg,

            /*
            |--------------------------------------------------------------------------
            | Set form to front in default
            |--------------------------------------------------------------------------
            */            
            'forms' => $this->layouts->forms(),

            /*
            |--------------------------------------------------------------------------
            | Set message layout to front in default
            |--------------------------------------------------------------------------
            */               
            'message' => $this->layouts->msg(),

            /*
            |--------------------------------------------------------------------------
            | Set login (Choose Name and surname default) to front in default
            |--------------------------------------------------------------------------
            */            
            'login' => $this->session->nomprenoms(),

            /*
            |--------------------------------------------------------------------------
            | Set pagination layout to front in default
            |--------------------------------------------------------------------------
            */            
            'pagination' => $this->layouts->pagination(),

            /*
            |--------------------------------------------------------------------------
            | Set breadcrumb layout to front in default
            |--------------------------------------------------------------------------
            */            
            'breadcrumb' => $this->layouts->breadcrumbs(),
        ];
    } 

    /**
     * Set admin_init layouts params
     * 
     * @return array
     */
    public function AdminInitMainLayouts():array 
    {
        return 
        [

            /*
            |--------------------------------------------------------------------------
            | Set path to front in default
            |--------------------------------------------------------------------------
            */            
            'path' => $this->paths,

            /*
            |--------------------------------------------------------------------------
            | Set datas to front in default
            |--------------------------------------------------------------------------
            */            
            'data' => $this->datas,              

            /*
            |--------------------------------------------------------------------------
            | Set messages text to front in default
            |--------------------------------------------------------------------------
            */              
            'messages' => $this->msg,

            /*
            |--------------------------------------------------------------------------
            | Set message layout to front in default
            |--------------------------------------------------------------------------
            */               
            'message' => $this->layouts->msg(),

            /*
            |--------------------------------------------------------------------------
            | Set form to front in default
            |--------------------------------------------------------------------------
            */              
            'forms' => $this->layouts->forms(),

            /*
            |--------------------------------------------------------------------------
            | Set login (Choose Name and surname) to front in default
            |--------------------------------------------------------------------------
            */               
            'login' => $this->session->nomprenoms(),

            /*
            |--------------------------------------------------------------------------
            | Set pagination layout to front in default
            |--------------------------------------------------------------------------
            */             
            'pagination' => $this->layouts->pagination(),

            /*
            |--------------------------------------------------------------------------
            | Set breadcrumb layout to front in default
            |--------------------------------------------------------------------------
            */               
            'breadcrumb' => $this->layouts->breadcrumbs(),
        ];   
    } 

    /**
     * Set admin layouts params
     * 
     * @return array
     */    
    public function AdminLayout(){

        return[
            /*
            |--------------------------------------------------------------------------
            | Set admin layout to front in default
            |--------------------------------------------------------------------------
            */               
            'layouts' => $this->layouts->admin($this->session->type()),
        ];
    }

    /**
     * Set Main layouts params
     * 
     * @return array
     */     
    public function MainLayout(){

        return [
                        /*
            |--------------------------------------------------------------------------
            | Set main layout to front in default
            |--------------------------------------------------------------------------
            */            
            'layouts' => $this->layouts->main(),
        ];
    }      

    /**
     * Set main params
     * 
     * @return array
     */    
    public function coookies():array
    {
        return 
        [

            /*
            |--------------------------------------------------------------------------
            | Session lifetime
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */            
            'expires' => time() + 86400,

            /*
            |--------------------------------------------------------------------------
            | Session Cookie Path
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */
            'path' => '/',


            'domain' => '',

            /*
            |--------------------------------------------------------------------------
            | Secure Cookies
            |--------------------------------------------------------------------------
            |
            | Supported: "false", "true"
            |
            */
            'secure' => true,

            /*
            |--------------------------------------------------------------------------
            | httponly Cookies
            |--------------------------------------------------------------------------
            |
            | Supported: "false", "true"
            |
            */
            'httponly' => true,

            /*
            |--------------------------------------------------------------------------
            | Same-Site Cookies
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */
            'samesite' => 'strict'
        ];   
    } 

    /**
     * Set main params
     * 
     * @return array
     */
    public function session_params ():array
    {
        return 
        [

            /*
            |--------------------------------------------------------------------------
            | Session lifetime
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */
            'lifetime' => 86400,

            /*
            |--------------------------------------------------------------------------
            | Session Cookie Path
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */
            'path' => '/',

            /*
            |--------------------------------------------------------------------------
            | httponly Cookies
            |--------------------------------------------------------------------------
            |
            | Supported: "false", "true"
            |
            */
            'httponly' => true,

            /*
            |--------------------------------------------------------------------------
            | Same-Site Cookies
            |--------------------------------------------------------------------------
            |
            | Supported: "lax", "strict", "none", null
            |
            */
            'samesite' => 'Strict',
        ];
    }

    /**
     * Set others options
     * @return array
    */
    public function others_options ():array
    {
       return 
       [

            /*
            |--------------------------------------------------------------------------
            | Secure session
            |--------------------------------------------------------------------------
            |
            | Supported: "true", "false"
            |
            */
            'secure' => true
       ];
    }   

}
