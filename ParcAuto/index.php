<?php

use Classes\Autoload;
use Classes\Moteur;

require_once 'classes/Autoload.php';
Autoload::register();

//-----------------TESTS DU MOTEUR-----------------//
//Instancier un moteur avec 5L dans le réservoir
$moteur = new Moteur(5.0);
//Démarrage du moteur, cela consomme 0.1L
$moteur->demarrer();
//Utilisation du moteur pour un trajet nécessitant 3 L
$moteur->utiliser(3.0);
//Faire le plein avec 10 L
$moteur->faireLePlein(10.0);
//Arrêter le moteur
$moteur->arreter();

