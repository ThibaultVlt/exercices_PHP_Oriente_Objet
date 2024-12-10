<?php

use Classes\Autoload;
use Classes\Moteur;
use Classes\Voiture;
use Classes\Scooter;

require_once 'classes/Autoload.php';
Autoload::register();

//-----------------TESTS DU MOTEUR-----------------//
// //Instancier un moteur avec 5L dans le réservoir
// $moteur = new Moteur(5.0);
// //Démarrage du moteur, cela consomme 0.1L
// $moteur->demarrer();
// //Utilisation du moteur pour un trajet nécessitant 3 L
// $moteur->utiliser(3.0);
// //Faire le plein avec 10 L
// $moteur->faireLePlein(10.0);
// //Arrêter le moteur
// $moteur->arreter();

// Instanciation d'une Renault Laguna avec 30 litres dans le réservoir
$laguna = new Classes\Voiture("Renault", "Laguna", 30);

// Affichage des caractéristiques avant le trajet
echo $laguna . "<br/>";

// Démarrage du moteur
$laguna->demarrer();

// Effectuer un trajet de 25 litres
$laguna->rouler(25);

// Affichage des caractéristiques après le trajet
echo $laguna . "<br/>";
