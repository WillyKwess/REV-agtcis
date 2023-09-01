<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Stubs\RequestFilesStub;
use Symfony\Component\Console\Input\InputInterface;
use bin\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\RequestFileConfig;

class CreateRequestFiles extends RequestFileConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
    */    
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');
        $name = $input->getArgument('name');
        if(is_dir(OutputDirectory::Files($type))!==false){
            $FileName = OutputDirectory::Files($type) . '/' . $name . '.php';
            RequestFilesStub::generate($FileName, $name , $type);
            $output->writeln("<info>Le Fichier de requete {$name} a été créé avec succès!!!</info>");
    
            return self::SUCCESS;
        }else{
            $output->writeln("<error>Désolé ce type de requete {$type} n'existe pas</error>");
            return self::FAILURE;
        }
    }

}