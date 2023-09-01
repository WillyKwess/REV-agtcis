<?php

namespace bin\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddSqlConfig extends Command
{

    protected function configure()
    {
        $this->setDescription('Add SQL request')
             ->setHelp('This command allows you to Add SQL request.')
             ->addArgument('type', InputArgument::REQUIRED, 'Request type (insert/select/update/delete/count)')
             ->addArgument('file', InputArgument::REQUIRED, 'Locate request file')
             ->addArgument('name', InputArgument::REQUIRED, 'Name of function');
    }
}