<?php

namespace bin\epaphrodite\ExcelFiles\ImportFiles;

class ImportFiles extends FilesExtension
{

    /**
     * @param mixed $ExcelFiles
     * @return array|false
    */
    public function ImportExcelFiles( $ExcelFiles ){

        if(isset($ExcelFiles) && in_array($_FILES['file']['type'], SELF::$FilesMimes)) 
        {
            
            $GetReader = $this->ExtenstionFiles($ExcelFiles);

            if($GetReader!==false){

                $SpreadSheet = $GetReader->load($_FILES['file']['tmp_name']);

                return $SpreadSheet->getActiveSheet()->toArray();

            }else{return false; }
            
        }else{return false; }
    }
}