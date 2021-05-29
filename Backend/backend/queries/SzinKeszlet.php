<?php
//?query=SzinKeszlet

namespace queries;

class SzinKeszlet extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Szín készlet";
        $this->sql = "select sz.Szin,COUNT(c.SzinId) as 'Db' from cipo c
        inner join szinek sz on sz.SzinId = c.SzinId
        GROUP by sz.SzinId
        ;";
        $this->columns = [
            "SzinId" => "id",
            "Szin"=>"Név"
        ];

    }

}