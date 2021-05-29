<?php
//POST
/*
    query=MarkaInsert
    Marka=Nike
*/
namespace queries;

class MarkaInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márka hozzáfűzés";
        $this->sql = "INSERT into marka
        (Marka) VALUE (?);";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["Marka"]
        ];
    }
}