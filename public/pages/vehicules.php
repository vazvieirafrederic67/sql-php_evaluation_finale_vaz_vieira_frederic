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

//instancier un tool qui fera référence à un vehicule
$vehiculeTools = new VehiculeTools($dbTools);



$vehicules = $vehiculeTools->getAllVehicules();

//$tools->prettyVarDump($vehicules);


//creation d'un objet vehicule saisi
if(!empty($_POST['marque'])){


    $newVehicule = $vehiculeTools->setVehicule(
        $_POST['marque'],
        $_POST['modele'],
        $_POST['couleur'],
       $_POST['immatriculation']
    );

    $_POST['marque'] = "";
        $_POST['modele'] = "";
        $_POST['couleur'] = "";
       $_POST['immatriculation'] = "";
   
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

<h4>Voitures</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id vehicule</th>
        <th scope="col">Marque</th>
        <th scope="col">Modele</th>
        <th scope="col">Couleur</th>
        <th scope="col">Immatriculation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($vehicules as $vehicule) {
        ?>
            <tr>
                <td><?= $vehicule->getId() ?></td>
                <td><?= $vehicule->getMarque() ?></td>
                <td><?= $vehicule->getModele() ?></td>
                <td><?= $vehicule->getcouleur() ?></td>
                <td><?= $vehicule->getImmatriculation() ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h1 class="m-5">Insertion voiture</h1>
<form action="vehicules.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Marque</label>
    <input type="text" name="marque" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="marque">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Modele</label>
    <input type="text" name="modele" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="marque">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Couleur</label>
    <input type="text" name="couleur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="marque">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Immatriculation</label>
    <input type="text" name="immatriculation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="marque">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>