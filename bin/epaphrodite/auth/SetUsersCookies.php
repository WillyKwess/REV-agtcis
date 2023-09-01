<?php

namespace bin\epaphrodite\auth;

use bin\epaphrodite\constant\EpaphClass;
use bin\epaphrodite\heredia\SettingHeredia;

class SetUsersCookies extends EpaphClass{
    
    /**
     * Set cookies
     *
     * @param string $CookeValue
     * @return void
     */
    public function set_user_cookies($CookeValue):void
    {
        setcookie(static::messages()->answers('token_name'), $CookeValue, (new SettingHeredia)->coookies());

        $_COOKIE[static::messages()->answers('token_name')] = $CookeValue;
    }

}