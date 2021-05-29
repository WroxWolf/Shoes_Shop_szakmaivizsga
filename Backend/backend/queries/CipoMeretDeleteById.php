<?php
//POST
/*
    query=CipoMeretDeleteById
    Id=1;
*/

namespace queries;

class CipoMeretDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méret törlés";
        $this->sql = "Delete From cipomeretek
        where Id = ? and MeretId = ?";
        $this->typesString = "ii";
        $this->paramVariables = [$params["Id"],$params["MeretId"]];

    }

}