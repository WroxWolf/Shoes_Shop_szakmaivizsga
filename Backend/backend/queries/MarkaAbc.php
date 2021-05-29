<?php
//?query=MarkaAbc

namespace queries;

class MarkaAbc extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márka Abc";
        $this->sql = "select MarkaId,Marka from marka
        order by Marka;";
        $this->columns = [
        "MarkaId" => "id",
        "Marka" => "Márka"
    ];
              
    }


}
