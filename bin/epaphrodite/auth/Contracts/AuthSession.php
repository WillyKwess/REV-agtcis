<?php

namespace bin\epaphrodite\auth\Contracts;

interface AuthSession
{

    /**
     * @return string|null
     */
    public function login():string|null;

    /** Ets --------- @@@@@@@@@@ ---------
     * @return string|null
     */
    public function loginets():string|null;

    /**
     * @return int|null
    */    
    public function id():int|null;

    /**
     * @return int|null
    */    
    public function type():int|null;

    /**
     * @return string|null
     */    
    public function nomprenoms():string|null;

    /**
     * @return string|null
     */    
    public function email():string|null;

    /**
     * @return string|null
     */    
    public function contact():string|null;

    /**
     * @return mixed
     */    
    public function token_csrf():mixed;

}