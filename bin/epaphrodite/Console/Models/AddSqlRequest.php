<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Stubs\AddSqlRequestStub;
use Symfony\Component\Console\Input\InputInterface;
use bin\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\AddSqlConfig;

class AddSqlRequest extends AddSqlConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
    */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        # Get console arguments
        $type = $input->getArgument('type');
        $file = $input->getArgument('file');
        $name = $input->getArgument('name');

        if(is_dir(OutputDirectory::Files($type))!==false){

            $FileName = OutputDirectory::Files($type) . '/' . $file . '.php';

            if(file_exists($FileName)===true){
                AddSqlRequestStub::generate($FileName, $name , $type);
                $output->writeln("<info>Le Fichier de requete {$file} a été créé avec succès!!!</info>");
                return self::SUCCESS;
            }else{
                $output->writeln("<error>Désolé le fichier {$file} n'existe pas dans le {$type}</error>");
                return self::FAILURE;  
            }
        }else{
            $output->writeln("<error>Désolé ce repretoire {$type} n'existe pas</error>");
            return self::FAILURE;
        }
    }
}