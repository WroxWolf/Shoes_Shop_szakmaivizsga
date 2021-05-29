<?php
//?query=MeretTabla

namespace queries;

class MeretTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méretek";
        $this->sql = "SELECT * FROM meretek";
        $this->columns = [
            "MeretId" => "id",
            "Meret" => "Méret"
        ];

    }

}
