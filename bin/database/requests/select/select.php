<?php

namespace bin\database\requests\select;

use bin\database\query\Builders;
use bin\epaphrodite\constant\EpaphClass;

class select extends Builders
{

    /**
     * Afficher la liste des utilisateurs
     *
     * @param integer $page
     * @param integer $Nbreligne
     * @return array
    */
    public function liste_users(int $page, int $Nbreligne)
    {

        $sql = $this->QueryBuilder()
            ->table('user_bd')
            ->limit((($page - 1) * $Nbreligne), $Nbreligne)
            ->orderby('type_user_bd', 'ASC')
            ->SQuery(NULL);

        $result = static::process()->select($sql, NULL, false, true);

        return $result;
    }
 }