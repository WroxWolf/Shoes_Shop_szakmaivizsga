<?php
//?query=TipusTabla

namespace queries;

class TipusTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Tipusok";
        $this->sql = "SELECT * FROM tipus";
        $this->columns = [
            "TipusId" => "id",
            "Tipus" => "Típus"
        ];

    }

}
