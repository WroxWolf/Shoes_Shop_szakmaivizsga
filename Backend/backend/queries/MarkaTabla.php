<?php
//?query=MarkaTabla

namespace queries;

class MarkaTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márkák";
        $this->sql = "SELECT * FROM marka";
        $this->columns = [
            "MarkaId" => "id",
            "Marka" => "Márka"
        ];

    }

}
