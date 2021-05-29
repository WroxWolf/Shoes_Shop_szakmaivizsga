<?php
//POST
/*
    query=TipusUpdateById
    tipus=cipő
    TipusId = 1
*/

namespace queries;

class TipusUpdateById extends ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Típus update";
        $this->sql = "Update tipus
        set tipus=?
        WHERE TipusId = ?;";
        $this->typesString = "si";
        $this->paramVariables = [
            $params["Tipus"],
            $params["TipusId"]
        ];
        $this->columns = [];
    }
}