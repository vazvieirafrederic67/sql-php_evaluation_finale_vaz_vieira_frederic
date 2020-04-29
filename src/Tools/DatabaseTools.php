<?php


namespace App\Tools;
use PDO;

class DatabaseTools
{
    private $host;
    private $dbName;
    private $user;
    private $password;
    private $dsn;
    private $pdo;

    public function __construct($host, $dbName, $user, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;

        $this->dsn = "mysql:host=$host;dbname=$dbName";
        $this->initDatabase();
    }
    public function initDatabase(){
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
    }
    public function executeQuery($SQL){
        $result = $this->pdo->query($SQL);
        return $result->fetchAll();
    }


    //introduction a la base de donnees des vehicules
    public function insertQueryVehicule($vehicules) {

 
        foreach ($vehicules as $vehicule) {
            
          $marque = $vehicule->getMarque();
          $modele = $vehicule->getModele();
          $couleur = $vehicule->getCouleur();
          $immatriculation = $vehicule->getImmatriculation();  
        }

        $stm = $this->pdo->prepare('INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES (:a, :b, :ca, :d );');
        $stm->bindParam(':a', $marque);
        $stm->bindParam(':b', $modele);
        $stm->bindParam(':ca', $couleur);
        $stm->bindParam(':d', $immatriculation);
      
        $stm->execute();


        //$stmt = $this->pdo->prepare($sql);
        //$stmt->execute($params);

    }

     //introduction a la base de donnees d'un conducteur
     public function insertQueryConducteur($conducteurs) {

 
        foreach ($conducteurs as $conducteur) {
            
          $prenom = $conducteur->getPrenom();
          $nom = $conducteur->getNom();
        }

        $stm = $this->pdo->prepare('INSERT INTO conducteur (prenom, nom) VALUES (:a, :b );');
        $stm->bindParam(':a', $prenom);
        $stm->bindParam(':b', $nom);
       
      
        $stm->execute();


    
    }

    //introduction a la base de donnees d'une association
    public function insertQueryAssociation($associations) {

 
        foreach ($associations as $association) {
            
          $idVehicule = $association->getIdVehicule();
          $idConducteur = $association->getIdConducteur();
        }

        $stm = $this->pdo->prepare('INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES (:a, :b );');
        $stm->bindParam(':a', $idVehicule);
        $stm->bindParam(':b', $idConducteur);
       
      
        $stm->execute();


    
    }



}