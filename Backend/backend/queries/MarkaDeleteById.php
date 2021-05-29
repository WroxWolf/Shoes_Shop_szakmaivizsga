<?php
//POST
/*
    query=MarkaDeleteById
    MarkaId=56
*/

namespace queries;

class MarkaDeleteById extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Marka törlés";
        $this->sql = "delete from marka
        where MarkaId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["MarkaId"]];

    }

}