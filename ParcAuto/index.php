<?php

use Classes\Autoload;
use Classes\Moteur;
use Classes\Voiture;
use Classes\Scooter;
use Classes\PanneEssenceException;

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


echo "Bonjour <br/>";

// Instancier la voiture avec 30 litres de carburant
$laguna = new Voiture("Renault", "Laguna", 30);

// Afficher les caractéristiques initiales
echo $laguna . " <br/>";

// Démarrer la voiture
$laguna->demarrer();

// Rouler avec une consommation de 29.9 litres
$laguna->rouler(29.9);

// Essayer de rouler avec 50 litres, ce qui provoque une panne d'essence
try {
    $laguna->rouler(50); // Ceci va lever l'exception
} catch (PanneEssenceException $e) {
    echo "La laguna vient de tomber en panne : " . $e->getMessage() . " <br/>";
}

// Afficher les caractéristiques après la panne
echo $laguna . "<br/>";