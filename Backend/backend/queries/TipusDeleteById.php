<?php
//POST
/*
    query=TipusDeleteById
    TipusId=1;
*/

namespace queries;

class TipusDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Tipus törlés";
        $this->sql = "delete from tipus
        where TipusId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["TipusId"]];

    }

}