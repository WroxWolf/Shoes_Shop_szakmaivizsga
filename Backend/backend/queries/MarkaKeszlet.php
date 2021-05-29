<?php
//?query=MarkaKeszlet

namespace queries;

class MarkaKeszlet extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márka készlet";
        $this->sql = "select m.Marka,COUNT(c.MarkaId) as 'Db' from cipo c
        inner join marka m on m.MarkaId = c.MarkaId
        GROUP by m.MarkaId
        ;";
        $this->columns = [
            "MarkaId" => "id",
            "Marka"=>"Név"
        ];

    }

}