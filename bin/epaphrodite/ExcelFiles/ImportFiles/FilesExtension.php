<?php

namespace bin\epaphrodite\ExcelFiles\ImportFiles;

use bin\epaphrodite\constant\StaticArray;
use bin\epaphrodite\env\config\GeneralConfig;


class FilesExtension extends StaticArray
{

    private $Xlsx;
    private $Xls;
    private $Csv;
    private $Ods;

    function __construct()
    {
        $this->Ods = new $this->ExcelSetting['Ods'];
        $this->Csv = new $this->ExcelSetting['csv'];
        $this->Xls = new $this->ExcelSetting['xls'];
        $this->Xlsx = new $this->ExcelSetting['xlsx'];
    }

    /**
     * @param mixed $ExcelFiles
     * @return \PhpOffice\PhpSpreadsheet\Reader\Csv|\PhpOffice\PhpSpreadsheet\Reader\Xls|\PhpOffice\PhpSpreadsheet\Reader\Xlsx\PhpOffice\PhpSpreadsheet\Reader\Ods
    */
    protected function ExtenstionFiles( $ExcelFiles ){

        $Extension = (new GeneralConfig)->EndFiles($ExcelFiles , '.');

        if(in_array( $Extension, static::$AllExtensions)){

            switch ( $Extension ) 
            {
                case $Extension === 'csv':
                    return $this->Csv;
                    break;

                case $Extension === 'ods':
                    return $this->Ods;
                    break;

                case $Extension === 'xls':
                    return $this->Xls;
                    break;
                  
                default:
                return $this->Xlsx;
            }
        }else{return false;}
    }
}