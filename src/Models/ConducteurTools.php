<?php


namespace App\Models;

class ConducteurTools
{

    private $databaseTools;

    public function __construct($databaseTools)
    {
        $this->databaseTools = $databaseTools;
    }

 

    public function getAllConducteurs(){
        $results = $this->databaseTools->executeQuery('SELECT * FROM conducteur');
        $conducteurs = [];
        foreach ($results as $result) {
            $conducteur = new Conducteur();
            $conducteur->setId($result['id_conducteur']);
            $conducteur->setNom($result['nom']);
            $conducteur->setPrenom($result['prenom']);

            array_push($conducteurs, $conducteur);
        }
        return $conducteurs;
    }

    public function setConducteur($prenom,$nom){
      
         
         $newConducteur = [];
        
             $conducteur = new Conducteur();
             $conducteur->setPrenom($prenom);
             $conducteur->setNom($nom);
            
     
         array_push($newConducteur, $conducteur);
 
         $results = $this->databaseTools->insertQueryConducteur($newConducteur);
     }


}