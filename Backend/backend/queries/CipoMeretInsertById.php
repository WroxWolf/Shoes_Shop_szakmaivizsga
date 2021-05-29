<?php
//POST
/*
    query=CipoMeretInsertById
    Szin=lila
*/
namespace queries;

class CipoMeretInsertById extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szin hozzáfűzés";
        $this->sql = "INSERT into cipomeretek
        (Id,MeretId) VALUE (?,?)";
        $this->typesString = "ii";
        $this->paramVariables = [
            $params["Id"],
            $params["MeretId"]
        ];
    }
}