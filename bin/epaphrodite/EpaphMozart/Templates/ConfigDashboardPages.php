<?php

namespace bin\epaphrodite\EpaphMozart\Templates;


class ConfigDashboardPages extends ConfigUsersMainPages
{

    private $interface;

    /** ************************************************************************************
     *Admin interface manager
     * @param string $key|null
     * @return string
     */
    public function admin(?int $key = null, ?string $url = null)
    {

        if ($key !== null) {

            $this->interface =
                [
                    1 => 'super_admin/',
                    2 => 'administrateur/',
                    3 => 'utilisateur/',
                ];

            return $url . $this->interface[$key];
        } else {

            return $this->login() . $url;
            // return $this->login() . $url ? $key !== $this->interface : $this->loginets(); //----@@@@----
        }
    }
}
