<?php
//?query=TipusAbc

namespace queries;

class TipusAbc extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Tipus Abc";
        $this->sql = "select TipusId,Tipus from tipus
        order by Tipus;";
        $this->columns = [
        "TipusId" => "id",
        "Tipus" => "Tipus"
    ];
              
    }


}
