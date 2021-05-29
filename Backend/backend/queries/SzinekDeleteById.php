<?php
//POST
/*
    query=SzinekDeleteById
    Id=1;
*/

namespace queries;

class SzinekDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szín törlés";
        $this->sql = "delete from szinek
        where SzinId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["SzinId"]];

    }

}