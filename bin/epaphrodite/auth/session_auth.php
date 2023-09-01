<?php

namespace bin\epaphrodite\auth;

use bin\epaphrodite\constant\EpaphClass;
use bin\epaphrodite\auth\Contracts\AuthSession;

class session_auth extends EpaphClass implements AuthSession
{

    protected $config;

    public function __construct()
    {
        $this->config = new $this->Guards['session'];
    }

    /**
     * 
     * User session login data
     * @return string
     */
    public function login():string|null
    {
           
        return !empty($this->config->GetSessions(_AUTH_LOGIN_)) ? $this->config->GetSessions(_AUTH_LOGIN_) : NULL;
    }

    /**
     * 
     * User session loginets data
     * @return string
     */
    public function loginets():string|null
    {
           
        return !empty($this->config->GetSessions(_AUTH_LOGINETS_)) ? $this->config->GetSessions(_AUTH_LOGINETS_) : NULL;
    }

    /**
     * 
     * User session iduser data
     * @return int
     */
    public function id():int|null
    {
        return !empty($this->config->GetSessions(_AUTH_ID_)) ? $this->config->GetSessions(_AUTH_ID_)  : NULL;
    }

    /**
     * 
     * User session type user
     * @return int
     */
    public function type():int|null
    {
        return !empty($this->config->GetSessions(_AUTH_TYPE_)) ? $this->config->GetSessions(_AUTH_TYPE_)  : NULL;
    }

    /**
     * 
     * User session nom et prenoms
     * @return string
     */
    public function nomprenoms():string|null
    {
        return !empty($this->config->GetSessions(_AUTH_NAME_)) ? $this->config->GetSessions(_AUTH_NAME_)  : NULL;
    }

    /**
     * 
     * User session email
     * @return string
     */
    public function email():string|null
    {
        return !empty($this->config->GetSessions(_AUTH_EMAIL_)) ? $this->config->GetSessions(_AUTH_EMAIL_)  : NULL;
    }

    /**
     * 
     * User session contact
     * @return string
     */
    public function contact():string|null
    {
        return !empty($this->config->GetSessions(_AUTH_CONTACT_)) ? $this->config->GetSessions(_AUTH_CONTACT_)  : NULL;
    }

    /**
     * ***************************************************************************************************
     * User cookies token_csrf data
     * @return mixed
     */
    public function token_csrf():mixed
    {
        return !empty($_COOKIE[static::messages()->answers('token_name')]) ? $_COOKIE[static::messages()->answers('token_name')] : NULL;
    }

    /**
     * ***************************************************************************************************
     * Destroy user session
     * @return mixed
     */
    public function deconnexion()
    {

        if ($this->login() !== NULL && $this->id() !== NULL) {

            session_unset();
            session_destroy();
        } elseif ($this->loginets() !== NULL && $this->id() !== NULL) {

            session_unset();
            session_destroy();
        }
    }
}
