<?php
//POST
/*
    query=SzinInsert
    Szin=lila
*/
namespace queries;

class SzinInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szin hozzáfűzés";
        $this->sql = "INSERT into szinek
        (Szin) VALUE (?);";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["Szin"]
        ];
    }
}