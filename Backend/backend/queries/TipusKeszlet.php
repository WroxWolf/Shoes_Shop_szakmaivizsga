<?php
//?query=TipusKeszlet

namespace queries;

class TipusKeszlet extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Tipus készlet";
        $this->sql = "select t.Tipus,COUNT(c.TipusId) as 'Db' from cipo c
        inner join tipus t on t.TipusId = c.TipusId
        GROUP by t.TipusId
        ;";
        $this->columns = [
            "TipusId" => "id",
            "Tipus"=>"Név"
        ];

    }

}