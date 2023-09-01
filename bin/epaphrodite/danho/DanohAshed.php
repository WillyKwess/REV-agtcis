<?php

namespace bin\epaphrodite\danho;

use bin\epaphrodite\constant\StaticArray;

class DanohAshed extends StaticArray
{

    protected function Hashed( $Password ){

       return password_hash( $Password , static::$Algorithm);        
    }

    protected function HashGost($Password){
        
        return hash( static::$Gost , $Password);
        
    }

}