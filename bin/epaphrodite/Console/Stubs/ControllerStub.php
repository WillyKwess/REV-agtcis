<?php

namespace bin\epaphrodite\Console\Stubs;

class ControllerStub{

    public static function GenerateControlleurs($FilesNames, $name , $html='$html')
    {
$stub = 
"<?php
    namespace bin\\controllers\\controllers;

    use bin\\controllers\\switchers\\MainSwitchers;

    class $name extends MainSwitchers
    {

        public function SendToEpaphroditeControllers($html)
        {
            //
        }
    }";
    file_put_contents($FilesNames, $stub);
    }
}