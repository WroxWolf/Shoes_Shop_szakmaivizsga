<?php
return [
    "paramsError" => function ($params){
        (new \core\ParamsError($params))->render();
    },
    "loginUser" => function ($params){
        (new \queries\LoginUser($params))->login();
    },
    "logoutUser" => function ($params){
        (new \queries\LogoutUser($params))->logout();
    },
    "getUser" => function ($params){
        (new \queries\GetUser($params))->getUser();
    },
    "CipoTabla" => function ($params){
        (new \queries\CipoTabla($params))->render();
    },
    "TipusTabla" => function ($params){
        (new \queries\TipusTabla($params))->render();
    },
    "MeretTabla" => function ($params){
        (new \queries\MeretTabla($params))->render();
    },
    "MarkaTabla" => function ($params){
        (new \queries\MarkaTabla($params))->render();
    },
    "SzinekTabla" => function ($params){
        (new \queries\SzinekTabla($params))->render();
    },
    "MeretAbc" => function ($params){
        (new \queries\MeretAbc($params))->render();
    },
    "TipusAbc" => function ($params){
        (new \queries\TipusAbc($params))->render();
    },
    "SzinAbc" => function ($params){
        (new \queries\SzinAbc($params))->render();
    },
    "MarkaAbc" => function ($params){
        (new \queries\MarkaAbc($params))->render();
    },
    "CipoTablaById" => function ($params){
        (new \queries\CipoTablaById($params))->render();
    },
    "MarkaTablaById" => function ($params){
        (new \queries\MarkaTablaById($params))->render();
    },
    "SzinekTablaById" => function ($params){
        (new \queries\SzinekTablaById($params))->render();
    },
    "MeretTablaById" => function ($params){
        (new \queries\MeretTablaById($params))->render();
    },
    "TipusTablaById" => function ($params){
        (new \queries\TipusTablaById($params))->render();
    },
    "TipusKeszlet" => function ($params){
        (new \queries\TipusKeszlet($params))->render();
    },
    "SzinKeszlet" => function ($params){
        (new \queries\SzinKeszlet($params))->render();
    },
    "MarkaKeszlet" => function ($params){
        (new \queries\MarkaKeszlet($params))->render();
    },
    "CipoInsert" => function ($params){
        (new \queries\CipoInsert($params))->render();
    },
    "MeretInsert" => function ($params){
        (new \queries\MeretInsert($params))->render();
    },
    "TipusInsert" => function ($params){
        (new \queries\TipusInsert($params))->render();
    },
    "MarkaInsert" => function ($params){
        (new \queries\MarkaInsert($params))->render();
    },
    "SzinInsert" => function ($params){
        (new \queries\SzinInsert($params))->render();
    },
    "CipoDeleteById" => function ($params){
        (new \queries\CipoDeleteById($params))->render();
    },
    "MeretDeleteById" => function ($params){
        (new \queries\MeretDeleteById($params))->render();
    },
    "MarkaDeleteById" => function ($params){
        (new \queries\MarkaDeleteById($params))->render();
    },
    "TipusDeleteById" => function ($params){
        (new \queries\TipusDeleteById($params))->render();
    },
    "SzinekDeleteById" => function ($params){
        (new \queries\SzinekDeleteById($params))->render();
    },
    "CipoUpdateById" => function ($params){
        (new \queries\CipoUpdateById($params))->render();
    },
    "SzinUpdateById" => function ($params){
        (new \queries\SzinUpdateById($params))->render();
    },
    "MarkaUpdateById" => function ($params){
        (new \queries\MarkaUpdateById($params))->render();
    },
    "TipusUpdateById" => function ($params){
        (new \queries\TipusUpdateById($params))->render();
    },
    "CipoMeretTabla" => function ($params){
        (new \queries\CipoMeretTabla($params))->render();
    },
    "CipoMeretDeleteById" => function($params){
        (new \queries\CipoMeretDeleteById($params))->render();
    },
    "CipoMeretUpdateById" => function($params){
        (new \queries\CipoMeretUpdateById($params))->render();
    },
    "CipoMeretInsertById" => function($params){
        (new \queries\CipoMeretInsertById($params))->render();
    },
];