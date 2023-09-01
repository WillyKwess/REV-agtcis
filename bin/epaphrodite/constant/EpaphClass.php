<?php

namespace bin\epaphrodite\constant;

class EpaphClass extends StaticArray{

    /**
     * @return env
     */
    public static function env(){ return new static::$MainNameSpace['env']; } 

    /**
     * @return paths
     */
    public static function path(){ return new static::$MainNameSpace['paths']; } 
    
    /**
     * @return SwitchersList
     */
    public static function Mozart(){ return new static::$MainNameSpace['mozart']; }

    /**
     * @return datas
     */
    public static function datas(){ return new static::$MainNameSpace['datas']; }    
    
    /**
     * @return errors
     */
    public static function errors(){ return new static::$MainNameSpace['errors']; }

    /**
     * @return session_auth
     */
    public static function auth(){ return new static::$MainNameSpace['session']; }  
    
    /**
     * @return token_csrf
     */
    public static function crsf(){ return new static::$MainNameSpace['crsf']; }

    /**
     * @return csrf_secure
     */
    public static function CrsfSecure(){ return new static::$MainNameSpace['secure']; } 

    /**
     * @return SetUsersCookies
     */
    public static function UsersCookies(){ return new static::$MainNameSpace['cookies']; }  

    /**
     * @return HardSession
     */
    public static function HardSession(){ return new static::$MainNameSpace['global']; }     

    /**
     * @return SetTextMessages
     */
    public static function messages(){ return new static::$MainNameSpace['msg']; } 

    /**
     * @return VerifyInputCharacteres
     */
    public static function checker(){ return new static::$MainNameSpace['verify']; }     

    /**
     * @return GenerateQRCode
     */
    public static function QRCodes(){ return new static::$MainNameSpace['qrcode']; }     

    /**
     * @return string
     */
    public static function JsonDatas(){ return _DIR_JSON_DATAS_ . '/JsonDatas.json'; }
}