<?php


namespace App\Models;

class AssociationTools
{

    private $databaseTools;

    public function __construct($databaseTools)
    {
        $this->databaseTools = $databaseTools;
    }

 

    public function getAllAssociations(){
        $results = $this->databaseTools->executeQuery('SELECT * FROM association_vehicule_conducteur');
        $associations = [];
        foreach ($results as $result) {
            $association = new Association();
            $association->setId($result['id_association']);
            $association->setIdVehicule($result['id_vehicule']);
            $association->setIdConducteur($result['id_conducteur']);

            array_push($associations, $association);
        }
        return $associations;
    }


    public function setAssociation($idVehicule,$idConducteur){
      
         
        $newAssociation = [];
       
            $association = new Association();
            $association->setIdVehicule($idVehicule);
            $association->setIdConducteur($idConducteur);
           
    
        array_push($newAssociation, $association);

        $results = $this->databaseTools->insertQueryAssociation($newAssociation);
    }


}