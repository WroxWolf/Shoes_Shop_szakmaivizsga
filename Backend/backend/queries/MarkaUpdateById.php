<?php
//POST
/*
    query=MarkaUpdateById
    Marka=Adidas
    MarkaId = 1
*/

namespace queries;

class MarkaUpdateById extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márka update";
        $this->sql = "Update marka
        set Marka=?
        WHERE MarkaId=?";
        $this->typesString = "si";
        $this->paramVariables = [
            $params["Marka"],
            $params["MarkaId"]
        ];
        $this->columns = [];
    }
}