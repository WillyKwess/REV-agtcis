<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

class setting extends MainSwitchers
{

    private $env;
    private $reponses;
    private $msg;
    private $datas;
    private $count;
    private $GetId;
    private $update;
    private $result;
    private $insert;
    private $delete;
    private $configUsersRights;

    function __construct()
    {
        $this->env = new static::$MainNameSpace['env'];
        $this->msg = new static::$MainNameSpace['msg'];
        $this->count = new $this->SqlRequest['count'];
        $this->GetId = new $this->SqlRequest['getid'];
        $this->update = new $this->SqlRequest['update'];
        $this->insert = new $this->SqlRequest['insert'];
        $this->delete = new $this->SqlRequest['delete'];
        $this->datas = new static::$MainNameSpace['datas'];
        $this->configUsersRights = new \bin\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList;
    }

    public function SendToEpaphroditeControllers($html)
    {

            /**
             * @param string $alert
             */
            $alert = '';
            $reponses='';

            /**
             * Ajouter des droits d'acces aux utilisateurs de la plateforme
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'setting/ajouter_droits_acces_utilisateur' , $html , true ) === true ) {

                $alert = '';
                $idtype = 0;

                if (isset($_GET['_see'])) {
                    $idtype = $_GET['_see'];
                }

                if (isset($_POST['submit']) && $idtype !== 0) {

                    $this->result = $this->insert->AddUsersRights($idtype, $_POST['__droits__'], $_POST['__actions__']);

                    if ($this->result === true) {
                        $alert = 'alert-success';
                        $reponses = $this->msg->answers('succes');
                    }
                    if ($this->result === false) {
                        $alert = 'alert-danger';
                        $reponses = $this->msg->answers('rightexist');
                    }
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'type' => $idtype , 'reponse' => $reponses, 'alert' => $alert, 'env' => $this->env, 'datas' => $this->datas, 'select'=> $this->configUsersRights ],true)->get();
            }

            /**
             * Liste des droits d'utilisateurs par type d'utilisateur
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'setting/liste_gest_droits_users' , $html , true ) === true ) {

                $select = [];
                $idtype = 0;

                if (isset($_GET['_see'])) {
                    $idtype = $_GET['_see'];
                }

                if (isset($_POST['__autorisation__'])) {

                    $this->result = $this->update->users_rights($_POST['__autorisation__'], 1, $idtype);

                    if ($this->result === true) {
                        $alert = 'alert-success';
                        $reponses = $this->msg->answers('succes');
                    }
                    if ($this->result === false) {
                        $alert = 'alert-danger';
                        $reponses = $this->msg->answers('error');
                    }
                }

                if (isset($_POST['__refuser__'])) {

                    $this->result = $this->update->users_rights($_POST['__refuser__'], 0);

                    if ($this->result === true) {
                        $alert = 'alert-success';
                        $reponses = $this->msg->answers('succes');
                    }
                    if ($this->result === false) {
                        $alert = 'alert-danger';
                        $reponses = $this->msg->answers('error');
                    }
                }

                if (isset($_POST['__deleted__'])) {

                    $this->result = $this->delete->DeletedUsersRights($_POST['__deleted__']);

                    if ($this->result === true) {
                        $alert = 'alert-success';
                        $reponses = $this->msg->answers('succes');
                    }
                    if ($this->result === false) {
                        $alert = 'alert-danger';
                        $reponses = $this->msg->answers('error');
                    }
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'select' => $this->GetId->users_rights($idtype) , 'reponse' => $reponses , 'alert' => $alert , 'env' => $this->env , 'datas' => $this->datas , 'list'=> $this->configUsersRights ],true)->get();
            }

            /**
             * Liste des types d'utilisateur avec attribution de droits
             * 
             * @param string $html
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'setting/gest_droits_acces_users' , $html , true ) === true ) {

                if (isset($_POST['__deleted__'])) {

                        $this->result = $this->delete->EmptyAllUsersRights($_POST['__deleted__']);

                        if ($this->result === true) {
                            $alert = 'alert-success';
                            $reponses = $this->msg->answers('succes');
                        }
                        if ($this->result === false) {
                            $alert = 'alert-danger';
                            $reponses = $this->msg->answers('error');
                        }
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'select' => $this->datas->user() , 'auth' => static::auth() , 'reponse' => $reponses , 'alert' => $alert , 'env' => $this->env , 'datas' => $this->datas ],true)->get();
            } 
    }
}