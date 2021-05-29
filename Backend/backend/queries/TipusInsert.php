<?php
//POST
/*
    query=TipusInsert
    Tipus=Vizicipo
*/
namespace queries;

class TipusInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Típus hozzáfűzés";
        $this->sql = "INSERT into tipus
        (Tipus) VALUE (?);";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["Tipus"]
        ];
    }
}