<?php
//POST
/*
    query=CipoInsert
    Nev=Newfeel
    TipusId=1
    SzinId=1
    MarkaId=1
    Leiras=Leírás
    Netto=3000
    AfaKulcs=0.27
    Kep=kep.png
*/
namespace queries;

class CipoInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipő hozzáfűzés";
        $this->sql = "INSERT into cipo
        (Nev,TipusId,SzinId,MarkaId,Leiras,Netto,AfaKulcs,Kep)
        VALUES
        (?,?,?,?,?,?,?,?);";
        $this->typesString = "siiisiis";
        $this->paramVariables = [
            $params["Nev"],
            $params["TipusId"],
            $params["SzinId"],
            $params["MarkaId"],
            $params["Leiras"],
            $params["Netto"],
            $params["AfaKulcs"],
            $params["Kep"],
        ];
    }
}