<?php

namespace bin\epaphrodite\CsrfToken;

use bin\database\query\Builders;

class csrf_secure extends Builders
{

    private $session;
    /**
     * Get class
     * @return void
     */
    function __construct()
    {
        $this->session = new static::$MainNameSpace['session'];
    }

    /**
     * Update token into database
     *
     * @param string $cookies
     * @return void
     */
    private function update_bd_token($cookies)
    {

        $sql = $this->QueryBuilder()
            ->table('auth_secure')
            ->set(['auth_key'])
            ->where('auth')
            ->UQuery();

        static::process()->update($sql , [$cookies, md5($this->session->login())], true);
    }

    /**
     * Insert token into database
     *
     * @param string $cookies
     * @return void
     */
    private function insert_bd_token($cookies)
    {

        $sql = $this->QueryBuilder()
            ->table('auth_secure')
            ->insert('auth , auth_key')
            ->values(' ? , ? ')
            ->IQuery();

        static::process()->insert($sql,[md5($this->session->login()), $cookies] , true);
    }

    /**
     * Get csrf value
     *
     * @return string
     */
    public function secure()
    {

        $sql = $this->QueryBuilder()
            ->table('auth_secure')
            ->where('auth')
            ->SQuery(NULL);

        $result = static::process()->select($sql, [md5($this->session->login())] , true);

        if (!empty($result)) {
            return $result[0]['auth_key'];
        } else {
            return 0;
        }
    }

    /**
     * Get rooting csrf
     *
     * @param string $cookies
     * @return void
     */
    public function get_csrf($key)
    {

        if ($this->secure() == 0) {

            $this->insert_bd_token($key);

            return false;
        } else {

            return $this->update_bd_token($key);
        }
    }
}
