<?php

use App\Models\VehiculeTools;
use App\Models\ConducteurTools;
use App\Models\Conducteur;
use App\Models\Vehicule;

use App\Tools\DevTools;
use App\Tools\LibsLoader;
use App\Tools\DatabaseTools;


$loader = require '../../vendor/autoload.php';

//instancier et appeller les librairies externes
$libsLoader = new LibsLoader();
$libsLoader->loadLibraries();

//instancier un devTool
$tools = new DevTools();

//instancier un tool pour pouvoir utiliser la BDD
$dbTools = new DatabaseTools("127.0.0.1", "vtc", "root", "");

//instancier un tool qui fera référence à un model User
$conducteurTools = new ConducteurTools($dbTools);
$vehiculeTools = new VehiculeTools($dbTools);


$conducteurs = $conducteurTools->getAllConducteurs();


//$tools->prettyVarDump($conducteurs);


//creation d'un objet utilisateur saisi
if(!empty($_POST['prenom'])){

    $newConducteur = $conducteurTools->setConducteur(
        $_POST['prenom'],
        $_POST['nom']
      
    );

    $_POST['prenom'] = "";
    $_POST['nom'] = "";
   
}




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css" >
    <title>VTC</title>
</head>
<body>

<input type="button" onclick="window.location.href='/public/pages/homepage.php'" value="retour">


<h4>Conducteurs</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nom conducteur</th>
        <th scope="col">Prenom conducteur</th>
        
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($conducteurs as $conducteur) {
       ?>
        <tr>
            <td><?= $conducteur->getId() ?></td>
            <td><?= $conducteur->getNom() ?></td>
            <td><?= $conducteur->getPrenom() ?></td>
            
        </tr>
    <?php } ?>
    </tbody>
</table>

<h1 class="m-5">Insertion conducteur</h1>
<form action="conducteurs.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prenom">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom">
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
