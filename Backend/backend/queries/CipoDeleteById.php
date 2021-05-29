<?php
//POST
/*
    query=CipoDeleteById
    Id=56
*/

namespace queries;

class CipoDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipő törlés";
        $this->sql = "delete from cipo
        where Id = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["Id"]];

    }

}