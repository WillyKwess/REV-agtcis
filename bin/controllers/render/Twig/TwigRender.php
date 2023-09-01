<?php

namespace bin\controllers\render\Twig;

class TwigRender extends TwigConfig {

    /**
     * Twig render
     *
     * @param string $view
     * @param array $array
     * 
     * @return mixed
     */ 
    public function render( string $view , array $array ){
        
      echo $this->TwigEnvironment()->render($view . _FRONT_ , $array );
    }   
}