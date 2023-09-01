<?php

namespace bin\epaphrodite\yedidiah;

use bin\epaphrodite\constant\EpaphClass;

class Authorize extends EpaphClass
{

    /**
     * @return bool
     */
    private static function SearchAutorisatize($pages){

        $JsonDatas = file_get_contents(static::JsonDatas());
        
        $actions = false;
        $index = md5(static::auth()->type() . ',' . $pages);
        $json_arr = json_decode($JsonDatas, true);
       
        foreach ($json_arr as $key => $value) {

            if ($value['IndexRight'] == $index) {
                $actions = $value['Autorisations'] == 1 ? true : false;
            }
        }

        return $actions;        
    }

    /**
     * @return bool
    */
    public static function Authorize($pages){

        $action = true;

        if(static::auth()->type()!==1){ 
            $action = static::SearchAutorisatize($pages) === true ? true : static::errors()->error_403(); 
        }
        
        return $action;
    }
}