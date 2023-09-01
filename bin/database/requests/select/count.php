<?php

namespace bin\database\requests\select;

use bin\database\query\Builders;

class count extends Builders
{

    /* 
      Get total number of user bd
    */
    public function count_all_users()
    {
        $sql = $this->QueryBuilder()
            ->table('user_bd')
            ->SQuery("COUNT(*) AS nbre");
        $result = static::process()->select($sql, NULL, false);

        return $result[0]['nbre'];
    }
}
