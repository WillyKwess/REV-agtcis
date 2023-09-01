<?php

namespace bin\epaphrodite\ErrorsExceptions;

use bin\controllers\render\Twig\TwigRender;

class SwitchErrorsPages extends TwigRender
{

    private $msg;
    private $paths;
    private $layouts;
    private $session;

    /**
     * Get class
     * @return void
     */
    function __construct()
    {
        $this->paths = new SELF::$MainNameSpace['paths'];
        $this->session = new SELF::$MainNameSpace['session'];
        $this->msg = new SELF::$MainNameSpace['msg'];
        $this->layouts = new SELF::$MainNameSpace['layout'];
    }

    /**
     * Page erreur 404
     *
     * @return exit
     */
    public function error_404()
    {
        
        SELF::DefaultResponses(404 , true);
        $this->render( 'errors/404', [ 'back' => $this->GoBack(),'layouts' => $this->layouts->errors() ] );
        exit;
    }

    /**
     * Page erreur 403
     *
     * @return exit
     */
    public function error_403()
    {
        SELF::DefaultResponses(403 , true);
        $this->render('errors/403', [ 'back' => $this->GoBack(), 'layouts' => $this->layouts->errors() ] );
        exit;
    }

    /**
     * Page erreur 419 
     *
     * @return exit
     */
    public function error_419()
    {
        SELF::DefaultResponses(419 , true);
        $this->render( 'errors/419',[ 'back' => $this->GoBack(), 'layouts' => $this->layouts->errors(),]);
        $this->session->deconnexion();
        exit;
    }

    /**
     * Page erreur 500
     * 
     * @return exit
     */
    public function error_500($errorType)
    {
        SELF::DefaultResponses(500 , true);
        $this->render( 'errors/500', [ 'back' => $this->GoBack(),'type' => $errorType, 'layouts' => $this->layouts->errors() ]);
        exit;
    }

    /**
     * back manager
     * 
     * @return exit
     */
    private function GoBack()
    {

        return is_null($this->session->login()) ? $this->paths->gethost() : $this->paths->dashboard();
    }
}
