<?php

namespace bin\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddModulesConfig extends Command
{

    protected function configure()
    {
        $this->setDescription('Add a new user right')
             ->setHelp('This command allows you to Add a new user right.')
             ->addArgument('key', InputArgument::REQUIRED, 'App Module')
             ->addArgument('libelle', InputArgument::REQUIRED, 'Libelle of right');
    }
}