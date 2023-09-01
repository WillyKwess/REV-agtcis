<?php

namespace bin\epaphrodite\env;

class MatchCharactere{

    /** 
     * Don't content number
     * @param mixed $InputCharacteres
     * @return bool
    */      
    protected function WithoutNumber( $InputCharacteres ):bool
    {
        if(preg_match("/[<>_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ±˜`#*-+§£∞§•¶ªº‘“æ«…™πå∑´®†˜ç¬¥¨ˆøπ¬˚¬∆˙©ƒßå∂≈√∫µ÷≥≤˜∆˙∂=;!^&?,.()%:'|{µ@!}$]/", $InputCharacteres))
        {
            return true;
        }else{
            return false;
        }
    }

    /** 
     * Don't content character
     * @param mixed $InputCharacteres
     * @return bool
    */      
    protected function WithoutCharacters( $InputCharacteres ):bool
    {
        if(preg_match("/[<>_1234567890±˜`#*-+§£∞§•¶ªº‘“æ«…™πå∑´®†˜ç¬¥¨ˆøπ¬˚¬∆˙©ƒßå∂≈√∫µ÷≥≤˜∆˙∂=;!^&?,.()%:'|{µ@!}$]/", $InputCharacteres))
        {
            return true;
        }else{
            return false;
        }
    }    

    /** 
     * Don't content character and number
     * @param mixed $InputCharacteres
     * @return bool 
    */     
    protected function WithoutNumberAndCharacters( $InputCharacteres ):bool
    {
        if(preg_match("/[<>±˜`#*+§£∞§•¶ªºæ«…™πå∑´®†˜ç¬¥¨ˆøπ¬˚¬∆˙©ƒßå∂≈√∫µ÷≥≤˜∆˙∂=;!^&?,.%:|{µ@!}$]/", $InputCharacteres))
        {
            return true;
        }else{
            return false;
        }
    }

    /** 
     * Count character number
     * @param mixed $InputCharacteres
     * @return int
    */      
    protected function CountCharacterNumber( $InputCharacteres ):int
    {

        return strlen($InputCharacteres);
    }    
}