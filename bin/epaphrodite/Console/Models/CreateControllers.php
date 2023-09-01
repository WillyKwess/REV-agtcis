<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Stubs\ControllerStub;
use Symfony\Component\Console\Input\InputInterface;
use bin\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use bin\epaphrodite\Console\Setting\ControllersConfig;


class CreateControllers extends ControllersConfig
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $filename = OutputDirectory::Files('controlleur') . '/' . $name . '.php';
        ControllerStub::GenerateControlleurs($filename, $name);
        $output->writeln("<info>Le contrôleur {$name} a été créé avec succès!!!</info>");

        return self::SUCCESS;
    }

}