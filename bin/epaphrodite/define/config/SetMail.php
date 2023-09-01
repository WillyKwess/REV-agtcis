<?php

namespace bin\epaphrodite\define\config;

class SetMail
{

    /**
     * SMTP default configuration
    */
    protected $MailSetting = 
    [

        // Set Host SMTP
        'host' => 'smtp-fr.securemail.pro',

        // Set mail Email address
        'from' => 'adresse_mail',

        // Set password
        'password' => 'Mot_de_passe',

        // set port number
        'port' => '587',

        // Fake mail after send
        'fakemail' => 'ne-pas-repondre@epaphrodite.com',

        // Mail title
        'title' => 'ADMINISTRATEUR EPAPHRODITE',
    ];
}