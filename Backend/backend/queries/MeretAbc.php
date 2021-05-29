<?php
//?query=MeretAbc

namespace queries;

class MeretAbc extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Méret Abc";
        $this->sql = "select MeretId,Meret from meretek
        order by Meret;";
        $this->columns = [
        "MeretId" => "id",
        "Meret" => "Méret"
    ];
              
    }


}
