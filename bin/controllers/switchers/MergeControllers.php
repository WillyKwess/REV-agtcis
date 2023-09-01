<?php

namespace bin\controllers\switchers;

use bin\epaphrodite\constant\EpaphClass;

class MergeControllers extends EpaphClass
{

    /**
     * @param mixed $class
     * @param mixed $pages
     * @return mixed
     */
    public function SwitchControllers( $class , $pages , ?bool $switch = false)
    {
        
        return static::directory( $pages , $switch ) === false ? static::errors()->error_404() : $class->SendToEpaphroditeControllers($pages);
    }

    /**
     * @param string|null $html
     * @param bool|false $switch
     * @return bool
    */
    private static function directory( ?string $html = null , ?bool $switch = false ){
        
        return $switch === false ? file_exists( _DIR_VIEWS_ . _DIR_MAIN_TEMP_ . $html ._FRONT_ ) : file_exists( _DIR_VIEWS_ . _DIR_ADMIN_TEMP_ . $html . _FRONT_ );
    }

}