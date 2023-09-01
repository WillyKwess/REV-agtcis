<?php

namespace bin\epaphrodite\auth;

use bin\epaphrodite\env\config\GeneralConfig;

class HardSession extends GeneralConfig{

    /**
     * @param int|null $id
     * @param string|null $login
     * @param string|null $nomprenoms
     * @param string|null $contact
     * @param string|null $email
     * @param int|null $type
     * @return void
    */
    public function StartSession( ?int $id = NULL , ?string $login = NULL , ?string $nomprenoms = NULL , ?string $contact = NULL , ?string $email = NULL , int $type = NULL)
    {

        // Set id session value
        $this->SetSession(_AUTH_ID_ , $id);

        // Set login session value
        $this->SetSession(_AUTH_LOGIN_ , $login);

        // Set name and surname session value
        $this->SetSession(_AUTH_NAME_ , $nomprenoms);

        // Set contact session value
        $this->SetSession(_AUTH_CONTACT_ , $contact);

        // Set email session value
        $this->SetSession(_AUTH_EMAIL_ , $email);

        // Set type user session value
        $this->SetSession(_AUTH_TYPE_ , $type);
    }

}