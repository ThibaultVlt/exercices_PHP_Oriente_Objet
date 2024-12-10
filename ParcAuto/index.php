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

$citroenC5 = new Voiture("Citroën", "C5", 50);
// Affichage initial
echo $citroenC5 . "<br/>";

// Essai de rouler 6 fois 10 litres
try {
    // Effectuer 6 trajets de 10 litres
    for ($i = 0; $i < 6; $i++) {
        echo "Parcours de 10 litres :<br/>";
        $citroenC5->rouler(10);
    }
} catch (Classes\PanneEssenceException $e) {
    echo "La C5 vient de tomber en panne : " . $e->getMessage() . "<br/>";
    
    // Faire le plein en cas de panne
    echo "Je vais faire le plein avec 50 litre(s)...<br/>";
    $citroenC5->faireLePlein(50);
    
    // Continuer le trajet après avoir fait le plein
    echo "Le moteur est redémarré.<br/>";
    $citroenC5->rouler(10); // Reprendre la route après avoir redémarré
}

// Affichage final
echo $citroenC5 . "<br/>";

