<?php

namespace bin\database\requests\delete;

use bin\database\query\Builders;

class delete extends Builders
{

    private $datas;
    private $process;
    private $session;
    private $rights;
    /**
     * Get class
     * @return void
     */
    function __construct()
    {
        
        $this->rights = new $this->Rights['delete'];
        $this->datas = new SELF::$MainNameSpace['datas'];
        $this->session = new SELF::$MainNameSpace['session'];
    }

    /************************************************************************************************
     * Request to delete users right by @id
     */
    public function DeletedUsersRights($IdRights)
    {

        return  $this->rights->DeletedUsersRights($IdRights)===true ? true : false;
    }

    /************************************************************************************************
     * Request to delete users right by @id
     */
    public function EmptyAllUsersRights($TypeUsers)
    {

        return  $this->rights->EmptyAllUsersRight($TypeUsers)===true ? true : false;
    }

    /************************************************************************************************
     * Request to delete all users of database
     */
    public function users()
    {

        $sql = $this->QueryBuilder()
            ->table('user_bd')
            ->DQuery(NULL);

        $result =  SELF::process()->delete($sql, null, false, true);

        return $result;
    }

    /**
     * Enregistrer les actions recentes
     * 
     * @param string|null $action
     * @return bool
     */
    public function ActionsRecente(?string $action = null)
    {

        $sql = $this->QueryBuilder()
            ->table('recente_actions ')
            ->insert('usersactions , dateactions , libactions')
            ->values(' ? , ? , ? ')
            ->IQuery();

        SELF::process()->select($sql, [$this->session->login(), date("Y-m-d H:i:s"), $action], true);

        return true;
    }    
}
