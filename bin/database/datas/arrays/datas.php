<?php

namespace bin\database\datas\arrays;

class datas
{

    private $list;

    /**
     * Liste des types utilisateurs
     * @param int $key
     * @return array
     */
    public function user(?int $key = null)
    {

        $this->list =
            [
                1 => 'SUPER ADMINISTRATEUR',
                2 => 'ADMINISTRATEUR',
                3 => 'UTILISATEUR',
            ];

        if ($key === null) {
            return $this->list;
        } else {
            return $this->list[$key];
        }
    }

    /**
     * Liste des autorisations
     * @param int $key
     * @return array
     */
    public function autorisation(?string $key = null)
    {

        $this->list =
            [
                1 => 'REFUSER',
                2 => 'AUTORISER',
            ];

        if ($key === null) {
            return $this->list;
        } else {
            return $this->list[$key];
        }
    }

    /**
     * Afficher les qualites du personnel
     *
     * @param int $key
     * @return mixed
     */
    public function ActionsUsers(?int $key = null)
    {

       return
            [
                1 => "ACTIVER/DESACTIVER UN COMPTE",
                2 => "REINITIALISER MOT DE PASSE",
            ];
    }     
}
