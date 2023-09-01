<?php

namespace bin\epaphrodite\Console\Models;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\UsersConfig;
use bin\database\requests\update\update as Update;

class UpdateUsers extends UsersConfig
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
        $result = (new Update)->ConsoleUpdateUsers( $username , $password , $UserGroup );

        if($result===true){
            $output->writeln("<info>Les modifications sur l'utilisateur {$username} ont été effectué avec succès!!!</info>");
            return self::SUCCESS;
        }else{
            $output->writeln("<error>Erreur lors du traitement. Vérifiez que l'utilisateur {$username} existe</error>");
            return self::FAILURE;
        }
    }
}