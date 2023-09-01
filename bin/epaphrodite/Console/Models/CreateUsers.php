<?php

namespace bin\epaphrodite\Console\Models;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\UsersConfig;
use bin\database\requests\insert\insert as Insert;

class CreateUsers extends UsersConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */    
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $UserGroup = $input->getArgument('group');
        $result = (new Insert)->ConsoleAddUsers( $username , $password , $UserGroup );

        if($result===true){
            $output->writeln("<info>L'utilisateur {$username} été créé avec succès!!!</info>");
            return self::SUCCESS;
        }else{
            $output->writeln("<error>L'utilisateur {$username} existe déjà</error>");
            return self::FAILURE;
        }
    }
}