<?php
//POST
/*
    query=SzinUpdateById
    Szin=barna
    SzinId = 1
*/

namespace queries;

class SzinUpdateById extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szín update";
        $this->sql = "Update szinek
        set Szin=?
        WHERE SzinId = ?";
        $this->typesString = "si";
        $this->paramVariables = [
            $params["Szin"],
            $params["SzinId"]
        ];
        $this->columns = [];
    }
}