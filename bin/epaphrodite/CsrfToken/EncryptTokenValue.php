<?php

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\constant\EpaphClass;

class EncryptTokenValue extends EpaphClass
{

    private $token;

    /**
     * @return mixed
     */
    private function TokenConnected()
    {
        return isset($_COOKIE[static::messages()->answers('token_name')]) ? $_COOKIE[static::messages()->answers('token_name')] : NULL;
    }

    /**
     * @param int|10 $length
     * @return mixed
    */   
    protected function GenerateurTokenValues( ?int $length = 10 )
    {
        
        $this->token = '';

        if ($this->TokenConnected() === NULL) 
        {
            $chars = static::$Guardlatters;

            for ($i = 0; $i < $length; $i++) 
            {
                $this->token .= $chars
                [
                    rand(0, strlen($chars) - 1)
                ];
            }
        } else {
            $this->token = $this->TokenConnected();
        }

        return $this->token;
    }    

}