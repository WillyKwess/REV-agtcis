<?php

namespace bin\epaphrodite\Console\Stubs;

class RequestFilesStub extends SqlStub{

public static function generate($FilesNames, $name , $type)
{
    $content = static::SwicthRequestContent($type,$name);
    
$stub = 
"<?php
    namespace bin\\database\\requests\\$type;

    use bin\\database\\query\\Builders;

    class {$name} extends Builders
    {

        $content

    }";
    
    file_put_contents($FilesNames, $stub);
    }
}