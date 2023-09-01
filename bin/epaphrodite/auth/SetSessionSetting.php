<?php

namespace bin\epaphrodite\auth;

use bin\epaphrodite\auth\SetUsersCookies;
use bin\epaphrodite\CsrfToken\GeneratedValues;

class SetSessionSetting extends SetUsersCookies
{

    protected $setting;
    protected $init = "";
    private static bool $_SSL;

    /**
     * construct class
     * @return void
     */
    function __construct()
    {
        $this->setting = new \bin\epaphrodite\heredia\SettingHeredia;
    }

    /**
     * Started
     * @return bool
     * @access private
     */
    private static function hasStarted(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     * set session et cookies
     * 
     * @return void
     */
    public function session_if_not_exist():void
    {
        $name = static::messages()->answers('session_name');

        if (!static::hasStarted()) {

            static::$_SSL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';

            if (!empty($name)) {
                session_name($name);
            } elseif (static::$_SSL) {
                session_name('__Secure-PHPSESSID');
            }

            $this->setting->session_params()['domain'] = $_SERVER['SERVER_NAME'];
            $this->setting->session_params()['secure'] = static::$_SSL;

            session_set_cookie_params(array_merge( $this->setting->session_params(), $this->setting->others_options()));
            session_start();

            if (static::auth()->login() === NULL && empty(static::auth()->token_csrf())) {
                $this->set_user_cookies((new GeneratedValues)->getvalue($this->init));
            }
        }
    }

}
