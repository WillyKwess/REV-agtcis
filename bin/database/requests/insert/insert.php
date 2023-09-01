<?php

namespace bin\database\requests\insert;

use \bin\epaphrodite\env\env;
use bin\database\query\Builders;


class insert extends Builders
{

    private $GetId;
    private $Hashed;
    private $GenerateClass;

    /**
     * Get class
     * @return void
     */
    function __construct()
    {
        $this->GetId = new \bin\database\requests\select\get_id;
        $this->Hashed = new \bin\epaphrodite\danho\GuardPassword;
        $this->GenerateClass = new \bin\epaphrodite\yedidiah\AddRights;
    }

    
    /**
     * Ajouter des droits utilisateurs
     * index ( module , type_user , idpage , action)
     * @param int|null $idtype_users
     * @param string|null $pages
     * @param string|null $actions
     * @return bool
     */
    public function AddUsersRights(?int $idtype_users = null, ?string $pages = null,  ?string  $actions = null)
    {

        if ($this->GenerateClass->AddUsersRights($idtype_users, $pages , $actions ) === true) {

            $actions = "Attribuer un droit au groupe d'utilisateur : " . $this->GenerateClass::datas()->user($idtype_users);
            $this->ActionsRecente($actions);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Ajouter des droits utilisateurs dans le systeme
     *
     * @param string|null $login
     * @param int|null $idtype
     * @return bool
     */
    public function add_users(?string $login = null, ?int $idtype = null)
    {

        if (!empty($login) && !empty($idtype) && $this->GenerateClass::checker()->only_number($idtype, 1) === false && count($this->GetId->get_infos_users_by_login($login)) < 1) {

            $sql = $this->QueryBuilder()
                ->table('user_bd')
                ->insert(' loginuser_bd , mdpuser_bd , type_user_bd ')
                ->values(' ? , ? , ? ')
                ->IQuery();

            static::process()->insert($sql, [$this->GenerateClass::env()->no_space($login), $this->Hashed->CryptPassword( $login ), $idtype] , true );

            $actions = "Ajout d'un utilisateur : " . $login;
            $this->ActionsRecente($actions);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Ajouter des utilisateurs dans le systeme a partir de la console
     *
     * @param string|null $login
     * @param int|null $idtype
     * @return bool
     */
    public function ConsoleAddUsers(?string $login = null , ?string $password = null , ?int $UserGroup = null)
    {

        $UserGroup = $UserGroup!==NULL ? $UserGroup : 1;  

        if (!empty($login) && count($this->GetId->get_infos_users_by_login($login)) < 1) {

            $sql = $this->QueryBuilder()
                ->table('user_bd')
                ->insert(' loginuser_bd , mdpuser_bd , type_user_bd ')
                ->values(' ? , ? , ? ')
                ->IQuery();

            static::process()->insert($sql, [$this->GenerateClass::env()->no_space($login), $this->Hashed->CryptPassword( $password ), $UserGroup] , true );

            return true;
        } else {
            return false;
        }
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

        static::process()->insert($sql,[$this->GenerateClass::auth()->login(), date("Y-m-d H:i:s"), $action], true);

        return true;
    }
 
 }