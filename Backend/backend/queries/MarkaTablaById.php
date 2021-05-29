<?php
//?query=MarkaTablaById&MarkaId=1

namespace queries;

class MarkaTablaById extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márka";
        $this->sql = "select * from marka
        where MarkaId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["MarkaId"]];
        $this->columns = [
            "MarkaId"=>"MárkaId",
            "Marka"=>"Márka",
        ];

    }

}