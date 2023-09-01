<?php

namespace bin\database\query;

class Builders extends QueryChaines
{
    
   /**
    * @return Builders
    */
    public function QueryBuilder():self
    {
      
      return new static::$Query['builders'];
    }  

    /**
     * @return process
    */
    public static function process()
    {
     
      return new static::$Query['process'];
    }
}