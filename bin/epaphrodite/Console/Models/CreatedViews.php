<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Setting\CreateViewsConfig;
use Symfony\Component\Console\Input\InputInterface;
use bin\epaphrodite\Console\Setting\OutputDirectory;
use bin\epaphrodite\Console\Stubs\AllViewsStub;
use Symfony\Component\Console\Output\OutputInterface;

class CreatedViews extends CreateViewsConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
    */    
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');
        $locate = $input->getArgument('locate');
        $locate = $locate == NULL ? '': '/'.$locate;
        $name = $input->getArgument('name');

        if(is_dir(OutputDirectory::Files($type).$locate)!==false){

            $filename = OutputDirectory::Files($type) .$locate. '/' . $name . _MAIN_EXTENSION_ . _FRONT_;
            AllViewsStub::generate($filename, $name , $type);
            $output->writeln("<info>Le Fichier de requete {$name} a été créé avec succès!!!</info>");
    
            return self::SUCCESS;
        }else{
            $output->writeln("<error>Désolé ce repretoire de vu {$type}{$locate} n'existe pas</error>");
            return self::FAILURE;
        }
    }
}