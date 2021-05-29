<?php
//?query=SzinekTablaById&SzinId=1

namespace queries;

class SzinekTablaById extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szín";
        $this->sql = "select * from szinek
        where SzinId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["SzinId"]];
        $this->columns = [
            "SzinId"=>"SzinId",
            "Szin"=>"Szín",
        ];

    }

}