<?php

namespace bin\epaphrodite\define;

use bin\epaphrodite\constant\StaticArray;

class SetTextMessages extends StaticArray
{

    private $FrenchMessages;
    private $EnglishMessages;

    function __construct()
    {
        $this->EnglishMessages = new $this->MessageCode['eng'];
        $this->FrenchMessages = new $this->MessageCode['french'];
    }


    /**
     * @param mixed $MessageCode
     * @param string $lang
     * @return mixed
    */
    public function answers($MessageCode , $lang = _LANG_)
    {

        switch ( $lang ) 
        {
            case $lang === 'eng':
                return $this->EnglishMessages->SwithAnswers($MessageCode);
                break;
              
            default:
            return $this->FrenchMessages->SwithAnswers($MessageCode);
        }

    }
}
