<?php
//POST
/*
    query=CipoUpdateById
    Nev=Newfeel
    TipusId=1
    SzinId=1
    MarkaId=1
    Leiras=Leírás
    Netto=3000
    AfaKulcs=0.27
    Kep=kep.png
    Id=1
*/

namespace queries;

class CipoUpdateById extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Cipő update";
        $this->sql = "UPDATE cipo
        SET Nev=?, TipusId=?, SzinId=?, MarkaId=?,Leiras=?,Netto=?,AfaKulcs=?,Kep=?
      where Id = ?";
        $this->typesString = "siiisddsi";
        $this->paramVariables = [
            $params["Nev"],
            $params["TipusId"],
            $params["SzinId"],
            $params["MarkaId"],
            $params["Leiras"],
            $params["Netto"],
            $params["AfaKulcs"],
            $params["Kep"],
            $params["Id"]
        ];
        $this->columns = [];
    }
}