<?php

namespace bin\database\requests\select;

use bin\database\query\Builders;
use bin\epaphrodite\yedidiah\YedidiaGetRights;

class get_id extends Builders
{

    protected $GenerateClass;

    /**
     * Get class
     * @return void
     */
    function __construct()
    {

        $this->GenerateClass = new YedidiaGetRights;
    }
    
    /** **********************************************************************************************
     * Request to select user right by module and 
     * 
     * @param string|null $module
     */
    public function GetModules(?string $module = null)
    {

        return $this->GenerateClass->modules($module);
    }

    /************************************************************************************************
     * Request to select user right by user type
     */
    public function users_rights($idtype_user)
    {

        return $this->GenerateClass->users_rights($idtype_user);
    }

    /** ********************************************************************************************** 
     * Request to select user right by user type
     * @param string|null $key
     * @return array
     */
    public function liste_menu(?string $key = null)
    {

        return $this->GenerateClass->liste_menu($key);
    }

    /** **********************************************************************************************
     * Request to select users by login
     *
     * @param string|null $kecodey
     * @return array
     */
    public function get_infos_users_by_login(?string $login = null)
    {

        $sql = $this->QueryBuilder()
            ->table('user_bd')
            ->where('loginuser_bd')
            ->limit(0, 1)
            ->SQuery(NULL);

        $result = static::process()->select($sql, [$login], true);

        return $result;
    }

    /************************************************************************************************
     * Request to select all recent users actions of database
     * 
     */
    public function recents_actions()
    {

        $sql = $this->QueryBuilder()
            ->table('recente_actions')
            ->where('usersactions')
            ->orderBy('idrecenteactions', 'DESC')
            ->limit(0, 7)
            ->SQuery(NULL);

        $result = static::process()->select($sql, [$this->GenerateClass::auth()->login()], true);

        return $result;
    }
}
