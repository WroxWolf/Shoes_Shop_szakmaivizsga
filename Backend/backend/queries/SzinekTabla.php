<?php
//?query=SzinekTabla

namespace queries;

class SzinekTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Színek";
        $this->sql = "SELECT * FROM szinek";
        $this->columns = [
            "SzinId" => "id",
            "Szin" => "Szín"
        ];

    }

}
