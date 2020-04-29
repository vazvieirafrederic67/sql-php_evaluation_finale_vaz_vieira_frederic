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
$vehicules = $vehiculeTools->getAllVehicules();

//$tools->prettyVarDump($vehicules);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css" >
    <title>VTC</title>
</head>
<body>

<input type="button" onclick="window.location.href='/public/pages/vehicules.php'" value="Vehicules">
<input type="button" onclick="window.location.href='/public/pages/conducteurs.php'" value="conducteurs">
<input type="button" onclick="window.location.href='/public/pages/association_vehicule_conducteur.php'" value="association vehicules/conducteurs">




</body>
</html>