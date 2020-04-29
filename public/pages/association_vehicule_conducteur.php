<?php

use App\Models\VehiculeTools;
use App\Models\ConducteurTools;
use App\Models\Conducteur;
use App\Models\Vehicule;
use App\Models\AssociationTools;
use App\Models\Association;

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
$associationTools = new AssociationTools($dbTools);


$conducteurs = $conducteurTools->getAllConducteurs();
$vehicules = $vehiculeTools->getAllVehicules();
$associations = $associationTools->getAllAssociations();

//$tools->prettyVarDump($associations);

//creation d'un objet utilisateur saisi
if(!empty($_POST['idVehicule'])){

    $newAssociation = $associationTools->setAssociation(
        $_POST['idVehicule'],
        $_POST['idConducteur']
      
    );

    $_POST['idVehicule'] = "";
    $_POST['idConducteur'] = "";
   
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
<h4>Associations</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id association</th>
        <th scope="col">id vehicule</th>
        <th scope="col">id conducteur</th>
    </thead>
    <tbody>
    <?php
    foreach ($associations as $association) {
        ?>
            <tr>
                <td><?= $association->getId() ?></td>
                <td><?= $association->getIdVehicule() ?></td>
                <td><?= $association->getIdConducteur() ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<h1 class="m-5">Insertion association</h1>
<form action="association_vehicule_conducteur.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">id vehicule</label>
    <input type="number" name="idVehicule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="id_vehicule">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">id conducteur</label>
    <input type="number" name="idConducteur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="id_conducteur">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>


  </form>