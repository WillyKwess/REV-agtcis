<?php

namespace bin\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class CreateViewsConfig extends Command
{

    protected function configure()
    {
        $this->setDescription('Create a front views')
             ->setHelp('This command allows you to create a new Request file.')
             ->addArgument('type', InputArgument::REQUIRED, 'Request type (insert/select/update/delete/count)')
             ->addArgument('name', InputArgument::REQUIRED, 'Name of function')
             ->addArgument('locate', InputArgument::OPTIONAL, 'Locate folder target');
    }
}