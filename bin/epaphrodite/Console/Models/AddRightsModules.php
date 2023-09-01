<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Stubs\AddRightsModulesStub;
use Symfony\Component\Console\Input\InputInterface;
use bin\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\AddModulesConfig;
use bin\epaphrodite\EpaphMozart\ModulesConfig\Lists\GetModulesList;

class AddRightsModules extends AddModulesConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        # Get console arguments
        $key = $input->getArgument('key');
        $libelle = str_replace( '_' , ' ' , $input->getArgument('libelle'));
        
        # Get module list and verify key
        $list = GetModulesList::GetModuleList();
        $IfKeyExist = array_key_exists($key,$list);

        # Select oupout file
        $GetFilesNames = OutputDirectory::Files('modulelist') . '.php';

        if (file_exists($GetFilesNames)===true&&$IfKeyExist===false){

            AddRightsModulesStub::generate($GetFilesNames, $key , strtoupper($libelle));
            $output->writeln("<info>Le Module a été créé avec succès!!!</info>");

            return self::SUCCESS;
        }else{

            $output->writeln("<error>Désolé la clé '{$key}' du Module '{$libelle}' existe déja</error>");
            return self::FAILURE;
        }
    }
}