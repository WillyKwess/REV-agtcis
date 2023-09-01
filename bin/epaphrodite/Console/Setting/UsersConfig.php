<?php

namespace bin\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class UsersConfig extends Command
{

    protected function configure()
    {
        $this
            ->setDescription('Create or update a user (new/old)')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user')
            ->addArgument('group', InputArgument::OPTIONAL, 'User group');
    }
}