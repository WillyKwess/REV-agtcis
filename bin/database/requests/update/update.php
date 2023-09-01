<?php

namespace bin\database\requests\update;

use bin\database\query\Builders;

class update extends Builders
{

    private $GetId;
    protected $AuthSQL;
    protected $Hashed;
    private $desconnect;
    protected $GenerateClass;


    /**
     * Get class
     * @return void
     */
    function __construct()
    {
        $this->AuthSQL = new \bin\database\requests\select\auth;
        $this->GetId = new \bin\database\requests\select\get_id;
        $this->Hashed = new \bin\epaphrodite\danho\GuardPassword;
        $this->GenerateClass = new \bin\epaphrodite\yedidiah\UpdateRights;
    }

    /** **********************************************************************************************
     * Request to update users rights
     * 
     * @param int|null $IdTypeUsers
     * @param int|null $etat
     * @return bool
     */
    public function users_rights(?string $IdTypeUsers = null, ?int $etat = null)
    {

        return  $this->GenerateClass->UpdateUsersRights ($IdTypeUsers , $etat )===true ? true : false;
    }

    
    /**
     * Changer mot de passe de l'utilisateur
     *
     * @param string $ancienmdp
     * @param string $newmdp
     * @param string $confirmdp
     * @return bool
     */
    public function ChangeUsersPassword(string $OldPassword, string $NewPassword, string $confirmdp)
    {
    
        if ($this->Hashed->GostCrypt($NewPassword) === $this->Hashed->GostCrypt($confirmdp)) {

            $result = $this->AuthSQL->SqlToCheckUsers($this->GenerateClass::auth()->login());

            if (!empty($result)) {

                if ($this->Hashed->AuthenticatedPassword( $result[0]["mdpuser_bd"] , $OldPassword) === true) {

                    $sql = $this->QueryBuilder()
                        ->table('user_bd')
                        ->set(['mdpuser_bd'])
                        ->where('iduser_bd')
                        ->UQuery();

                    static::process()->update($sql, [$this->Hashed->CryptPassword($NewPassword), $this->GenerateClass::auth()->id()], true);

                    $actions = "Changement de mot de passe : " . $this->GenerateClass::auth()->login();
                    $this->ActionsRecente($actions);

                    $this->desconnect = $this->GenerateClass::path()->logout();

                    header("Location: $this->desconnect ");
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            return 1;
        }
    }

    /**
     * Changer les informations de l'utilisateur
     *
     * @param string $nomprenoms
     * @param string $email
     * @param int $number
     * @return bool
     */
    public function infos_perso(string $nomprenoms, string $email, string $number)
    {

        if ($this->GenerateClass::checker()->only_number($number, 11) === false) {

            $sql = $this->QueryBuilder()
                ->table('user_bd')
                ->set(['contact_user', 'email_user', 'nomprenoms_user'])
                ->where('iduser_bd')
                ->UQuery();

            static::process()->update($sql, [$number, $email, $nomprenoms, $this->GenerateClass::auth()->id()], true);

            $_SESSION["nom_prenoms"] = $nomprenoms;

            $_SESSION["contact"] = $number;

            $_SESSION["email"] = $email;

            $actions = "Modification des informations personnelles : " . $this->GenerateClass::auth()->login();
            $this->ActionsRecente($actions);

            $this->desconnect = $this->GenerateClass::path()->dashboard();

            header("Location: $this->desconnect ");
        } else {
            return false;
        }
    }

    /**
     * Modifier l'etat d'un utilisateur
     *
     * @param integer $type_user
     * @param integer $id_user
     * @return bool
     */
    public function ModifierEtatsUsers(string $login)
    {

        $get_user_datas = $this->GetId->get_infos_users_by_login($login);

        if (!empty($get_user_datas)) {

            $state = !empty($get_user_datas[0]['etat_userbd']) ? 0 : 1;

            $etat_exact = "Fermeture";

            if ($state == 1) {
                $etat_exact = "Ouverture";
            }

            $sql = $this->QueryBuilder()
                ->table('user_bd')
                ->set(['etat_userbd'])
                ->where('loginuser_bd')
                ->UQuery();

            static::process()->update($sql, [$state, $get_user_datas[0]['loginuser_bd']] , true, true);

            $actions = $etat_exact . " du compte de l'utilisateur : " . $get_user_datas[0]['loginuser_bd'];
            $this->ActionsRecente($actions);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Reinitialiser le mot de passe d'un utilisateur
     *
     * @param integer $type_user
     * @param integer $id_user
     * @return bool
     */
    public function ReinitialiserMdpUsers(string $CodeUsers)
    {

        $sql = $this->QueryBuilder()
            ->table('user_bd')
            ->set(['mdpuser_bd'])
            ->like('loginuser_bd')
            ->UQuery();

        static::process()->update($sql, [ $this->Hashed->CryptPassword($CodeUsers), "$CodeUsers"], true);

        $actions = "Réinitialisation de mot de passe de l'utilisateur : " . $CodeUsers;
        $this->ActionsRecente($actions);

        return true;
    }

    /**
     * Update user password and user group
     *
     * @param integer $login
     * @param string|NULL $password
     * @param int|NULL $UserGroup
     * @return bool
    */    
    public function ConsoleUpdateUsers( ?string $login = null , ?string $password = NULL , ?int $UserGroup =NULL )
    {
        $GetDatas = $this->GetId->get_infos_users_by_login($login);

        if(!empty($GetDatas)){

            $password = $password!==NULL ? $password : $login;          
            $UserGroup = $UserGroup!==NULL ? $UserGroup : $GetDatas[0]['type_user_bd'];          

            $sql = $this->QueryBuilder()
                ->table('user_bd')
                ->set(['mdpuser_bd' , 'type_user_bd'])
                ->like('loginuser_bd')
                ->UQuery();

            static::process()->update($sql, [ $this->Hashed->CryptPassword($password) , $UserGroup , "$login"], true);

            return true;

        }else{
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

        static::process()->select($sql, [$this->GenerateClass::auth()->login(), date("Y-m-d H:i:s"), $action], true);

        return true;
    }
}
