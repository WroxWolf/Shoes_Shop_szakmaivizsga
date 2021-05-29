<?php
//POST
/*
    query=CipoMeretUpdateById
    Szin=barna
    SzinId = 1
*/

namespace queries;

class CipoMeretUpdateById extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipo méret update";
        $this->sql = " Update cipomeretek
        set MeretId= ?
        WHERE Id = ?";
        $this->typesString = "ii";
        $this->paramVariables = [
            $params["MeretId"],
            $params["Id"]
        ];
        $this->columns = [];
    }
}