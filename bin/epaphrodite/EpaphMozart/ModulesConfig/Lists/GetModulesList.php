<?php

namespace bin\epaphrodite\EpaphMozart\ModulesConfig\Lists;

use bin\epaphrodite\EpaphMozart\ModulesConfig\RighstList;

class GetModulesList extends RighstList
{

    public static function GetModuleList(){

        return [
            'profil' => 'MON PROFIL',
            'import' => 'GEST. IMPORTATION',
            'right' => 'GEST. DROITS ACCESS',
            'users' => 'GEST. UTILISATEURS',
        ];

     } 
 }