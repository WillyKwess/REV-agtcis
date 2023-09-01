<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;
use bin\epaphrodite\ExcelFiles\ImportFiles\ImportFiles;

class utilisateur extends MainSwitchers
{

    private $env;
    private $msg;
    private $GetId;
    private $datas;
    private $count;
    private $update;
    private $insert;
    private $select;
    private $delete;
    private $result;
    private $ImportFiles;

    function __construct()
    {
        $this->ImportFiles = new ImportFiles;
        $this->env = new static::$MainNameSpace['env'];
        $this->msg = new static::$MainNameSpace['msg'];
        $this->count = new $this->SqlRequest['count'];
        $this->select = new $this->SqlRequest['select'];
        $this->GetId = new $this->SqlRequest['getid'];
        $this->update = new $this->SqlRequest['update'];
        $this->insert = new $this->SqlRequest['insert'];
        $this->delete = new $this->SqlRequest['delete'];
        $this->datas = new static::$MainNameSpace['datas'];
    }

    public function SendToEpaphroditeControllers($html)
    {

            /**
             * @param string $alert
             */
            $alert = '';
            $reponses = '';

            /**
             * Modifier infos personnel des utilisateurs
             * 
             * @param string $view
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'users/modifier_infos_users' , $html , true ) === true ) {

                if (isset($_POST['submit'])) {

                    $this->result = $this->update->infos_perso($_POST['nomprenom'], $_POST['email'], $_POST['contact']);
                    if ($this->result === true) {
                        $reponses = $this->msg->answers('succes');
                        $alert = 'alert-success';
                    }
                    if ($this->result === false) {
                        $reponses = $this->msg->answers('error');
                        $alert = 'alert-danger';
                    }
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'reponse' => $reponses, 'alert' => $alert, 'env' => $this->env, 'data' => $this->datas, 'select' => $this->GetId->get_infos_users_by_login(static::auth()->login()) ],true)->get();
            }

            /**
             * Modifier mot de passe d'un utilisateur
             * 
             * @param string $view
             * @param array $array
             * @return mixed
             */
            if (  static::SwitcherPages( 'users/modifier_mot_de_passe' , $html , true ) === true ) {

                if (isset($_POST['submit'])) {

                    $this->result = $this->update->ChangeUsersPassword($_POST['ancienmdp'], $_POST['newmdp'], $_POST['confirmmdp']);
                    if ($this->result === 1) {
                        $reponses = $this->msg->answers('no-identic');
                        $alert = 'alert-danger';
                    }
                    if ($this->result === 2) {
                        $reponses = $this->msg->answers('no-identic');
                        $alert = 'alert-danger';
                    }
                    if ($this->result === 3) {
                        $reponses = $this->msg->answers('mdpwrong');
                        $alert = 'alert-danger';
                    }
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'reponse' => $reponses, 'alert' => $alert, 'env' => $this->env, 'data' => $this->datas, ],true)->get();
            }

            /**
             * Importation de tous les utilisateurs
             * 
             * @param string $view
             * @param array $array
             * @return mixed
             */
            if ( static::SwitcherPages( 'users/import_des_utilisateurs' , $html , true ) === true ) {

                $state = static::auth()->type() === 1 ? true : false;

                if (isset($_POST['submit'])) {
                    
                    $SheetData = $this->ImportFiles->ImportExcelFiles($_FILES['file']['name']);

                    if(!empty($SheetData)){
                        for ($i=1; $i<count($SheetData); $i++) {

                            $CodeUtilisateur = $SheetData[$i][0];

                            $this->result = $this->insert->add_users($CodeUtilisateur, $_POST['type_utilisateur']);

                            if ($this->result === true) {
                                $reponses = $this->msg->answers('succes');
                                $alert = 'alert-success';
                            }

                            if ($this->result === false) {
                                $reponses = $this->msg->answers('error');
                                $alert = 'alert-danger';
                            }
                        }
                    }else{                         
                        $reponses = $this->msg->answers('fileempty');
                        $alert = 'alert-danger'; 
                    }


                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'state' => $state, 'reponse' => $reponses, 'alert' => $alert, 'env' => $this->env ],true)->get();
            }

            /**
             * Afficher la liste de tous les utilisateurs
             * 
             * @param string $view
             * @param array $array
             * @return mixed
             */
            if (  static::SwitcherPages( 'users/liste_des_utilisateurs' , $html , true ) === true ) {

                $page = isset($_GET['_p']) ? $_GET['_p'] : 1;
                $Nbreligne = 100;


                if(isset($_POST['_sendselected_'])&&!empty($_POST['users'])&&!empty($_POST['_sendselected_'])){
                   
                    foreach ($_POST['users'] as $login) 
                    {

                        $this->result = $_POST['_sendselected_'] == 1 ? $this->update->ModifierEtatsUsers($login) : $this->update->ReinitialiserMdpUsers($login);
                    }

                    if ($this->result === true) {
                        $reponses = $this->msg->answers('succes');
                        $alert = 'alert-success';
                    }
                    if ($this->result === false) {
                        $reponses = $this->msg->answers('error');
                        $alert = 'alert-danger';
                    }

                }

                if (isset($_GET['submitsearch']) && !empty($_GET['datasearch']) && static::auth()->type() === 1) {

                    $total = 0;
                    $list = $this->GetId->get_infos_users_by_login($_GET['datasearch']);
                    if (!empty($list)) {
                        $total = 1;
                    }
                } elseif (empty($_GET['datasearch'])) {

                    $total = $this->count->count_all_users();
                    $list = $this->select->liste_users($page, $Nbreligne);
                }

                static::rooter()->target( _DIR_ADMIN_TEMP_ . $html )->content( [ 'reponse' => $reponses, 'alert' => $alert, 'env' => $this->env,'pagecourante' => $page, 'effectif_total' => $total,'pages_total' => ceil(($total) / $Nbreligne),'liste_users' => $list,],true)->get();

            } 
    }
}
