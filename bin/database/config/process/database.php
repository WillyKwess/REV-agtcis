<?php

namespace bin\database\config\process;

use PDO;
use bin\database\config\SwitchDatabase;
use bin\database\config\Contracts\DatabaseRequest;

class database extends SwitchDatabase implements DatabaseRequest
{


    /**
     * Construct database connection 
     * @param int $db
    */
    private function GetConnexion(int $db)
    {

        return $this->SqlConnect($db);
    }

    /* 
    * Disconnexion 
    */
    private function closeConnection($bd)
    {
        return  NULL;
    }

    /**
     * SQL request to select  
     * 
     * @param string|null $SqlChaine
     * @param string|null $param
     * @param array|null $datas
     * @param bool|null $etat
     * @param int|1 $bd
     * @return array
     * 
     */
    public function select($SqlChaine, $datas = [], ?bool $param=false , ?bool $etat = false , ?int $bd=1 ):array|NULL
    {
      
        $request = $this->GetConnexion($bd)->prepare($SqlChaine);

        if ($param === true) {
            
            foreach ($datas as $k => &$v) {
    
                $request->bindParam($k + 1, $datas[$k], PDO::PARAM_STR);
            }
        }

        $etat === false ? : $this->closeConnection($bd);

        $request->execute();

        return $request->fetchAll();
    }

    /**
     * SQL request to insert  
     * @param string|null $SqlChaine
     * @param string|null $param
     * @param array|null $datas
     * @param bool|null $etat
     * @param int|1 $bd
     * @return bool
     * 
     */
    public function insert($SqlChaine, $datas=[], ?bool $param=false , ?bool $etat = false , ?int $db=1):bool|NULL
    {

        $request = $this->GetConnexion($db)->prepare($SqlChaine);

        if ($param === true) {

            foreach ($datas as $k => &$v) {
                $request->bindParam($k + 1, $datas[$k], PDO::PARAM_STR);
            }
        }

        $etat === false ? : $this->closeConnection($db);

        return $request->execute();
    }

    /**
     * SQL request to delete  
     * @param string|null $SqlChaine
     * @param string|null $param
     * @param array|null $datas
     * @param bool|null $etat
     * @param int|1 $bd
     * 
     * @return bool
     */
    public function delete($SqlChaine, $datas=[], ?bool $param=false , ?bool $etat = false , ?int $db=1):bool|NULL
    {
        $request = $this->GetConnexion($db)->prepare($SqlChaine);

        if ($param === true) {

            foreach ($datas as $k => &$v) {
                $request->bindParam($k + 1, $datas[$k], PDO::PARAM_STR);
            }
        }

        $etat === false ? : $this->closeConnection($db);

        return $request->execute();
    }

    /**
     * SQL request to update 
     * 
     * @param string|null $SqlChaine
     * @param string|null $param
     * @param array|null $datas
     * @param bool|null $etat
     * @param int|1 $bd
     * @return bool
     * 
     */
    public function update($SqlChaine, $datas=[], ?bool $param=false , ?bool $etat = false , ?int $db=1):bool|NULL
    {
        $request = $this->GetConnexion($db)->prepare($SqlChaine);

        if ($param === true) {

            foreach ($datas as $k => &$v) {
                $request->bindParam($k + 1, $datas[$k], PDO::PARAM_STR);
            }
        }

        $etat === false ? : $this->closeConnection($db);

        return $request->execute();
    }
}
