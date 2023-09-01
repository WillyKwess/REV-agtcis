<?php

namespace bin\controllers\render\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use bin\epaphrodite\env\config\ResponseSequence;

class TwigConfig extends ResponseSequence{

    /**
     * Twig path FilesystemLoader
     * @var string
     * @return mixed
    */    
    private function TwigFilseystem(){

        return new FilesystemLoader ( _DIR_VIEWS_ );
    }

    /**
     * Twig path Environment
     * @var \Twig\Environment $TwigEnvironment
     * @return mixed
    */    
    protected function TwigEnvironment()
    {

        $TwigEnvironment = new Environment ( $this->TwigFilseystem() , [ 'cache' =>false ]);
        
        $TwigEnvironment->addExtension(new $this->Twig['extension']);

        return $TwigEnvironment;
    }

}