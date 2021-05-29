<?php
//?query=CipoMeretTabla

namespace queries;

class CipoMeretTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipo méretek";
        $this->sql = "select cp.Id,c.Nev,m.MeretId,m.Meret from meretek m
        inner join cipomeretek cp on cp.MeretId = m.MeretId
        inner join cipo c on cp.Id = c.Id";
        $this->columns = [
            "Id" => "id",
            "Nev" => "Név",
            "MeretId" => "MéretId",
            "Meret" => "Méret",
        ];

    }

}