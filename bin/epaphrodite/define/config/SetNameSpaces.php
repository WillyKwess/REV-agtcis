<?php

namespace bin\epaphrodite\define\config;

class SetNameSpaces extends SetGuardSecure
{

    /**
     * @var string[] $ExcelSetting
    */
    protected $ExcelSetting = 
    [
        'Ods' => '\PhpOffice\PhpSpreadsheet\Reader\Ods',
        'xlsx' => '\PhpOffice\PhpSpreadsheet\Reader\Xlsx',
        'xls' => '\PhpOffice\PhpSpreadsheet\Reader\Xls',
        'csv' => '\PhpOffice\PhpSpreadsheet\Reader\Csv',
    ];

    /**
     * @var string[] $MessageCode
    */    
    protected $MessageCode = 
    [
        'eng' => '\bin\epaphrodite\define\lang\eng\SetEnglishTextMessages',
        'french' => '\bin\epaphrodite\define\lang\fr\SetFrenchTextMessages',
    ];

    /**
     * @var string[] $MainNameSpace
    */     
    protected static $MainNameSpace =
    [
        'env' => '\bin\epaphrodite\env\env',
        'paths' => '\bin\epaphrodite\path\paths',
        'errors' => '\bin\controllers\render\errors',
        'datas' => '\bin\database\datas\arrays\datas',
        'mail' => '\bin\epaphrodite\api\email\SendMail',
        'global' => '\bin\epaphrodite\auth\HardSession',
        'crsf' => '\bin\epaphrodite\CsrfToken\token_csrf',
        'session' => '\bin\epaphrodite\auth\session_auth',
        'msg' => '\bin\epaphrodite\define\SetTextMessages',
        'secure' => '\bin\epaphrodite\CsrfToken\csrf_secure',
        'cookies' => '\bin\epaphrodite\auth\SetUsersCookies',
        'qrcode' => '\bin\epaphrodite\QRCodes\GenerateQRCode',
        'verify' => '\bin\epaphrodite\env\VerifyInputCharacteres',
        'layout' => '\bin\epaphrodite\EpaphMozart\Templates\LayoutsConfig',
        'mozart' => '\bin\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList',
    ];  

    /**
     * @var string[] $Query
    */     
    protected static $Query =
    [
        'process' => '\bin\database\config\process\process',
        'builders' => '\bin\database\query\Builders',
    ];

    /**
     * @var string[] $Guards
    */     
    protected $Guards =
    [
        'sql' => '\bin\database\requests\select\auth',
        'guard' => '\bin\epaphrodite\danho\GuardPassword',
        'session' => '\bin\epaphrodite\env\config\GeneralConfig',
    ];

    /**
     * @var string[] $Rights
    */     
    protected $Rights =
    [
        'update' => '\bin\epaphrodite\yedidiah\UpdateRights',
        'delete' => '\bin\epaphrodite\yedidiah\YedidiaDeleted',
    ];    

    /**
     * @var string[] $Guards
    */     
    protected $QrCodes =
    [
        'qrcode' => 'chillerlan\QRCode\QRCode',
        'qroptions' => 'chillerlan\QRCode\QROptions',
    ]; 
    
    /**
     * @var string[] $Guards
    */     
    protected $SqlRequest =
    [
        'count' => '\bin\database\requests\select\count',
        'delete' => '\bin\database\requests\delete\delete',
        'update' => '\bin\database\requests\update\update',
        'insert' => '\bin\database\requests\insert\insert',
        'select' => '\bin\database\requests\select\select',
        'getid' => '\bin\database\requests\select\get_id',
    ]; 
    
    /**
     * @var string[] $Auth
    */      
    protected $Auth =
    [
        'setting' => '\bin\epaphrodite\auth\SetSessionSetting',
    ];

    /**
     * @var string[] $Twig
    */      
    protected $Twig =
    [
        'extension' => '\bin\epaphrodite\Extension\EpaphroditeExtension',
    ];
        
}