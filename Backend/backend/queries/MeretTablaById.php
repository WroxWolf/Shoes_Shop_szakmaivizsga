<?php
//?query=MeretTablaById&MeretId=1

namespace queries;

class MeretTablaById extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méret";
        $this->sql = "select * from meretek
        where MeretId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["MeretId"]];
        $this->columns = [
            "MeretId"=>"MeretId",
            "Meret"=>"Méret",
        ];

    }

}