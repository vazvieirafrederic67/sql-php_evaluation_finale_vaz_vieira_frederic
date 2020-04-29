<?php


namespace App\Models;

class VehiculeTools
{


    private $databaseTools;

    public function __construct($databaseTools)
    {
        $this->databaseTools = $databaseTools;
    }

    public function getAllVehicules(){
        $results = $this->databaseTools->executeQuery('SELECT * FROM vehicule');
        
        $vehicules = [];
        foreach ($results as $result) {
            $vehicule = new Vehicule();
            $vehicule->setId($result['id_vehicule']);
            $vehicule->setMarque($result['marque']);
            $vehicule->setModele($result['modele']);
            $vehicule->setCouleur($result['couleur']);
            $vehicule->setImmatriculation($result['immatriculation']);
    
            array_push($vehicules, $vehicule);
        }
        return $vehicules;
        
    }


    public function setVehicule($marque,$modele,$couleur,$immatriculation){
       // $results = $this->databaseTools->executeQuery('SELECT * FROM vehicule');
        
    
        $vehicules = [];
       
            $vehicule = new Vehicule();
            $vehicule->setMarque($marque);
            $vehicule->setModele($modele);
            $vehicule->setCouleur($couleur);
            $vehicule->setImmatriculation($immatriculation);
    
        array_push($vehicules, $vehicule);

        
     
        
      
        $results = $this->databaseTools->insertQueryVehicule($vehicules);
    }








}