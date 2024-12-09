<?php

use App\Autoload;
use App\Pièces\PieceEchecs;
use App\Pièces\Cavalier;
use App\Pièces\Fou;

require_once 'classes/Autoload.php';
Autoload::register();

//--------------------TESTS--------------------

//Vérification de la couleur de la pièce et de la couleur de la case
$piece = new PieceEchecs(8, 1, 0);
//Résultats : 1 => blanc ; 2 => noire
echo "Verification de la couleur des pièces et des cases de l'échiquier :<br/>";
echo "Couleur de la pièce : " . $piece->getCouleur() . "<br/>";
echo "Couleur de la case : " . $piece->getCouleurCase() . "<br/>";

echo "<br/>";

echo "Verification du déplacement du cavalier (de la position (2,1) vers (2,3) et de (2,1) vers (2,3)):<br/>";
$cavalier = new Cavalier(2, 1, 1);
echo "de la position (2,1) vers (2,3): <br/>";

if ($cavalier->peutAllerA(3, 3)) {
    echo "Le cavalier peut aller en (3, 3). <br/>";
} else {
    echo "Le cavalier ne peut pas aller en (3, 3). <br/>";
}
echo "<br/>";

echo "de la position (2,1) vers (2,3): <br/>";
if ($cavalier->peutAllerA(2, 3)) {
    echo "Le cavalier peut aller en (2, 3). <br/>";
} else {
    echo "Le cavalier ne peut pas aller en (2, 3). <br/>";
}


