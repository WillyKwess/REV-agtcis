<?php

namespace bin\epaphrodite\Console\Setting;

class OutputDirectory
{

    public static function Files($Key)
    {
        $result=false;

        $list =[
            'modulelist' => 'bin/epaphrodite/EpaphMozart/ModulesConfig/Lists/GetModulesList',
            'rightlist' => 'bin/epaphrodite/EpaphMozart/ModulesConfig/Lists/GetRightList',
            'controlleur' => 'bin/controllers/controllers',
            'insert' => 'bin/database/requests/insert',
            'update' => 'bin/database/requests/update',
            'delete' => 'bin/database/requests/delete',
            'select' => 'bin/database/requests/select',
            'count' => 'bin/database/requests/count',
            'admin' => 'bin/views/admin',
            'main' => 'bin/views/main',
        ];

        foreach($list as $ListKey => $value){
            if ( $ListKey == $Key) {
                $result = $value;
            }
        }
        return $result;
    }
}