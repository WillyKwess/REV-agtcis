<?php

namespace bin\epaphrodite\define\config;

class SetGuardSecure
{

    /**
     * First Hash method
     */
    protected static $Algorithm = PASSWORD_DEFAULT;

    /**
     * Second Hash method
     */    
    protected static $Gost = 'gost';

    /**
     * Latter for security crypt
     */    
    protected static $Guardlatters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

}