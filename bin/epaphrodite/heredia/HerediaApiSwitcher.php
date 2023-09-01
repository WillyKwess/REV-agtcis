<?php

namespace bin\epaphrodite\heredia;

use bin\epaphrodite\env\config\GeneralConfig;
use bin\epaphrodite\env\config\ResponseSequence;

class HerediaApiSwitcher extends GeneralConfig
{

    /**
     * @param mixed $Methods
     * @param mixed $autorisation
     * @param mixed $inipaths
     * @param mixed $FromUrl
     * @return bool
    */    
    protected static function GetApiRoot( $Methods , $inipaths , $FromUrl , $autorisation )
    {

      return SELF::GetMethodsAutorisation( $Methods , $autorisation , $inipaths , $FromUrl ) === true && SELF::VerifyKeyGen() === true ? true : ResponseSequence::DefaultResponses(403);
    }

    /**
     * @param mixed $Methods
     * @param mixed $autorisation
     * @param mixed $inipaths
     * @param mixed $FromUrl
     * @return bool
    */
    private static function GetMethodsAutorisation( $Methods , $autorisation , $inipaths , $FromUrl )
    {

        return $Methods === SELF::methods()&&$autorisation===true&&$inipaths._MAIN_EXTENSION_ === $FromUrl ? true : false;
    }

    /**
     * @return bool
    */
    private static function VerifyKeyGen(){

        $MethodValues [] = '$_'.SELF::methods();

       return isset($MethodValues[_KEYGEN_]) && in_array( $MethodValues[_KEYGEN_] , SELF::$StaticKeygenList) ? true : false;
    }

}