<?php
//?query=SzinAbc

namespace queries;

class SzinAbc extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szín Abc";
        $this->sql = "select SzinId,Szin from szinek
        order by Szin;";
        $this->columns = [
        "SzinId" => "id",
        "Szin" => "Szín"
    ];
              
    }


}
