<?php

namespace bin\epaphrodite\Console\Stubs;

class SqlStub{

/**
 * @return string
*/    
public static function insert($name){

    $stub = 
    '
    /**
     * @param string $value1
     * @param string $value2
     * @param string $value3
    */
    '."public function $name".'($value1 , $value2 , $value3){
        
        $sql = $this->QueryBuilder()
                    ->table("table")
                    ->insert(" value1 , value2 , value3 ")
                    ->values(" ? , ? , ? ")
                    ->IQuery();
    
    static::process()->insert($sql, [$value1 , $value2 , $value3] , true );                
    
    $actions = "Titre action recente :"  . $designation;
    $this->ActionsRecente($actions);

    return true;

    }'; 
        
    return $stub;    

}

/**
 * @return string
 */
public static function update($name){

    $stub = 
    '
      /**
         * @param string $value1
         * @param string $value2
         * @param string $value3
         * @return bool
       */
    '."public function $name".'($value1 , $value2 , $Id){
        
        $sql = $this->QueryBuilder()
                    ->table("table")
                    ->set(["value1" , "value2"])
                    ->where("id")
                    ->UQuery();
    
        static::process()->update($sql, [$value1 , $value2 ,  $Id] , true );   
        
        $actions = "Titre action recente :"  . $designation;
        $this->ActionsRecente($actions);

        return true;
    }'; 
        
    return $stub;    
}

/**
 * @return string
 */
public static function delete($name){

    $stub = 
    '/**
     * @param string $value1
     * @return bool
     */
    '."public function $name".'($value1){
        
        $sql = $this->QueryBuilder()
                    ->table("table")
                    ->where("id")
                    ->DQuery();
    
        static::process()->delete($sql, [$value1] , true ); 
        
        $actions = "Titre action recente :"  . $designation;
        $this->ActionsRecente($actions);        

        return true;
    }'; 
        
    return $stub;    
}


/**
 * @return string
 */
public static function select($name){

$stub = 
'
  /**
    * @param string $value1
    * @return bool
   */
'."public function $name".'($value1){
        
        $sql = $this->QueryBuilder()
                    ->table("table")
                    ->where("id")
                    ->SQuery();
    
        $Result = static::process()->select($sql, [$value1] , true );    
        
        return $Result;
    }'; 
        
    return $stub;    
}

public static function count($name){

$stub = 
    "
    public function $name".'(){
        
        $sql = $this->QueryBuilder()
                    ->table("table")
                    ->SQuery("count(id) as nbre");
    
        $result = static::process()->select($sql, NULL , false );   
                
        return $result[0]["nbre"];
    }'; 
        
return $stub;    

}

protected static function SwicthRequestContent($type,$name){

    switch ($type) {

        case 'insert':
                return self::insert($name);
                break;

            case 'update':
                return self::update($name);
                break;

            case 'delete':
                return self::delete($name);
                break; 
            
            case 'count':
                return self::count($name);
                break;                   
            
            default:
                return self::select($name);
                break;
        }
    }


}