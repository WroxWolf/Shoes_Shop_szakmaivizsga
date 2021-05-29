<?php
//POST
/*
    query=MeretInsert
    Meret=45
*/
namespace queries;

class MeretInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méret hozzáfűzés";
        $this->sql = "INSERT into meretek
        (Meret) VALUE (?);";
        $this->typesString = "i";
        $this->paramVariables = [
            $params["Meret"]
        ];
    }
}