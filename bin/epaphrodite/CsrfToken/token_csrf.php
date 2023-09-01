<?php

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\CsrfToken\GeneratedValues;
use bin\epaphrodite\CsrfToken\validate_token;

class token_csrf extends GeneratedValues{

    protected $csrf;
    protected $token_value;

    function __construct()
    {
        $this->csrf = new validate_token;
    }

    /**
     * Token csrf input
     * 
     *  @return mixed 
     * */    
    public function input_field(){

        echo "<input type='hidden' name='token_csrf' value='".$this->getvalue()."' required \>";
    }  

    /**
     * csrf verification process...
     * 
     * @return bool
     */
    private function process(){

        return $this->csrf->token_verify();
    }

    /**
     * If csrf exist
     */
    public function tocsrf(){

        if(isset($_POST['token_csrf'])){ if($this->process()===true){ return true; }else{ return false;} }else{ return true; }
    }

}