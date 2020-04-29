<?php


namespace App\Models;


class Association
{
    private $id;
    private $idVehicule;
    private $idConducteur;
 

 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;
    }

    public function getIdConducteur()
    {
        return $this->idConducteur;
    }

    public function setIdConducteur($idConducteur)
    {
        $this->idConducteur = $idConducteur;
    }


}