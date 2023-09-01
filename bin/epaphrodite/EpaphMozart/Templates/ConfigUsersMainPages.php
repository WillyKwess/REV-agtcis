<?php

namespace bin\epaphrodite\EpaphMozart\Templates;


class ConfigUsersMainPages
{

    /** 
     * Login interface manager
     */
    public function login():string
    {
        return _LOGIN_;
    }

    /** 
     * Loginets interface manager ----------- @@@@@@@@@@ -----------
     */
    public function loginets():string
    {
        return _LOGINETS_;
    }

    /** 
     * Main interface manager
     */
    public function main():string
    {
        return _HOME_;
    }

    /** 
     * Profil interface manager
     */
    public function profil():string
    {
        return _PROFIL_;
    }    
}