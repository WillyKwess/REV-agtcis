<?php

namespace bin\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddRightsConfig extends Command
{

    protected function configure()
    {
        $this->setDescription('Add a new user right')
             ->setHelp('This command allows you to Add a new user right.')
             ->addArgument('module', InputArgument::REQUIRED, 'App Module')
             ->addArgument('path', InputArgument::REQUIRED, 'The path')
             ->addArgument('libelle', InputArgument::REQUIRED, 'Libelle of right');
    }
}