<?php

namespace bin\controllers\render\Http;

use bin\epaphrodite\constant\EpaphClass;

class GetHttpMethod extends EpaphClass
{

    /**
     * @return string
     */
    protected function SwitchUrlHttp(){

        /**
         * Set cookies and start user session
         * @return void
        */
        (new $this->Auth['setting'])->session_if_not_exist();

        /**
         * @var string $UrlProviders
         */
        $UrlProviders = urldecode( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) );
        
        /**
         * @var string $HardUrl
         */
        $HardUrl = substr('/'._DOMAINE_, 1 , -1);

        /**
         * @var string $HttpResponses
         */
        $HttpResponses = str_replace( $HardUrl , '', $UrlProviders );

        return empty(_DOMAINE_) ? $UrlProviders : substr($HttpResponses,1);
    }

}