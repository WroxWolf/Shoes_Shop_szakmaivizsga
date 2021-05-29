<?php
//?query=CipoTabla

namespace queries;

class CipoTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipők";
        $this->sql = "select c.Id,c.Nev,t.TipusId,t.Tipus,sz.SzinId,sz.Szin,ma.MarkaId,ma.Marka,c.Leiras,c.Netto,c.AfaKulcs,c.Kep from cipo c
                    inner join tipus t on c.TipusId = t.TipusId
                    inner join szinek sz on sz.SzinId = c.SzinId
                    inner join marka ma on ma.MarkaId = c.MarkaId
                    ";
        $this->columns = [
            "Id" => "id",
            "Nev"=>"Név",
            "TipusId"=>"TipusId",
            "Tipus"=>"Tipus",
            "SzinId"=>"SzínId",
            "Szin"=>"Szín",
            "MarkaId"=>"MárkaId",
            "Marka"=>"Márka",
            "Leiras"=>"Leírás",
            "Netto"=>"NettóÁr",
            "AfaKulcs"=>"ÁfaKulcs",
            "Kep"=>"kép"
        ];

    }

}
