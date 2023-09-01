<?php

namespace bin\epaphrodite\EpaphMozart\ModulesConfig\Lists;

use bin\epaphrodite\constant\EpaphClass;

class GetRightList extends EpaphClass
{

    public static function RightList(){
        
        return [
            [
                'apps' => 'profil', 
                'libelle' => "Modifier mot de passe", 
                'path' => 'users/modifier_mot_de_passe', 
            ],
            [
                'apps' => 'profil', 
                'libelle' => "Modifier mes infos", 
                'path' => 'users/modifier_infos_users', 
            ],
            [
                'apps' => 'import', 
                'libelle' => "Importation des utilisateurs", 
                'path' => 'users/import_des_utilisateurs', 
            ],
            [
                'apps' => 'users', 
                'libelle' => "Liste des utilisateurs", 
                'path' => 'users/liste_des_utilisateurs', 
            ],
        ];
        
    }
 }