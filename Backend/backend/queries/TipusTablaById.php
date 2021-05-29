<?php
//?query=TipusTablaById&TipusId=1

namespace queries;

class TipusTablaById extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Típus";
        $this->sql = "select * from tipus
        where TipusId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["TipusId"]];
        $this->columns = [
            "TipusId"=>"TipusId",
            "Tipus"=>"Típus",
        ];

    }

}