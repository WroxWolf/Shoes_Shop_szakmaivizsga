<?php
//POST
/*
    query=MeretDeleteById
    Id=1;
*/

namespace queries;

class MeretDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méret törlés";
        $this->sql = "delete from meretek
        where MeretId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["MeretId"]];

    }

}