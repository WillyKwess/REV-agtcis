<?php

namespace bin\epaphrodite\yedidiah;

use bin\epaphrodite\constant\EpaphClass;

class YedidiaGetRights extends EpaphClass{

     /** **********************************************************************************************
     * Request to select user right by module and 
     * 
     * @param string|null $module
     */
    public function modules(?string $module = null)
    {
        $result = false;
        $index = $module . ',' . static::auth()->type();

        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IndexModule'] == $index) {
                $result = true;
            }
        }

        return $result;
    }

    /************************************************************************************************
     * Request to select user right by user type
     */
    public function users_rights($idtype_user)
    {

        $result = [];
        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IdtypeUserRights'] == $idtype_user) {
                $result[] = $json_arr[$key];
            }
        }

        return $result;
    }

    /** ********************************************************************************************** 
     * Request to select user right by user type
     * @param string|null $key
     * @return array
     */
    public function liste_menu(?string $key = null)
    {

        $result = [];
        $index = $key . ',' . static::auth()->type();

        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IndexModule'] === $index) {
                $result[] = $json_arr[$key];
            }
        }

        return $result;
    }


}