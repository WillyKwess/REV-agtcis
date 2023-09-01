<?php

namespace bin\epaphrodite\auth\Contracts;

interface StartSession
{

    public function StartUsersSession($AuthId , $AuthLogin , $AuthNomprenoms , $AuthContact , $AuthEmail , $AuthTypes);
    public function StartEtsSession($idEts, $codeEts, $nomEts, $emailEts);
}