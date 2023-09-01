<?php

namespace bin\epaphrodite\heredia;

use bin\epaphrodite\yedidiah\Authorize;

class SwitchersHeredia extends Authorize{
    
    /**
     * @param string|null $target
     * @param string|null $url
     * @param null|string $autorize
     * @param bool $runner
     * @return bool|null
     */
    public static function SwitcherPages( ?string $target = null , ?string $url = null , ?bool $autorize = null , $Run=NULL ){

        if( SELF::target( $target , $url )===true ){

            $Run = $autorize === true ? SELF::Authorize($target) : true;
        }

        return $Run;
    }

    /**
     * @param mixed $target
     * @param mixed $url
     * @return bool
    */
    private static function target( $target , $url ){

        return $target . _MAIN_EXTENSION_ === $url ? true : false;
    }
}

