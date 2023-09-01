<?php

namespace bin\epaphrodite\CsrfToken;

use bin\controllers\render\errors;

class token_error extends errors{
    
    public function send()
    {

        $this->error_419(); 
    }

}