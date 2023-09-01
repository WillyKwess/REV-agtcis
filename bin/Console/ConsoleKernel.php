<?php

namespace bin\Console;

class ConsoleKernel
{

    /**
     * Console commades list
     * @return array
    */
    public function GetConsolesCommands():array
    {
       
        return [
            new \bin\epaphrodite\Console\commands\CommandsUsers,
            new \bin\epaphrodite\Console\commands\CommandAddRights,
            new \bin\epaphrodite\Console\commands\CommandAddModules,
            new \bin\epaphrodite\Console\commands\CommandCreatViews,
            new \bin\epaphrodite\Console\commands\CommandAddRequest,
            new \bin\epaphrodite\Console\commands\CommandController,
            new \bin\epaphrodite\Console\commands\CommandUpdateUser,
            new \bin\epaphrodite\Console\commands\CommandRequestFiles,
        ];
    }    
}