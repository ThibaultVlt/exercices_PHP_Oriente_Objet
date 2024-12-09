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
echo "Verification de la couleur des pièces et des cases de l'échiquier (8, 1, 0) :<br/>";
echo "Couleur de la pièce : " . $piece->getCouleur() . "<br/>";
echo "Couleur de la case : " . $piece->getCouleurCase() . "<br/>";

echo "<br/>";


//CAVALIER
//Création d'un cavalier
$cavalier = new Cavalier(2, 1, 1);

//Vérification de la possibilité du déplacement
echo "Verification du déplacement du Cavalier:<br/>";
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
echo "<br/>";

//FOU
//Création d'un fou
$fou = new Fou(3, 8, 2);

//Vérification de la possibilité du déplacement
print "Verification du déplacement du Fou :<br/>";
print "de la position (3,8) vers (6,5): <br/>";

if ($fou->peutAllerA(6, 5)){
    print "Le cavalier peut aller en (6, 5). <br/>";
}else {
    print "Le cavalier ne peut pas aller en (6, 5). <br/>";
}
echo "<br/>";

print "de la position (3,8) vers (2,6): <br/>";
if ($fou->peutAllerA(2, 6)){
    print "Le cavalier peut aller en (2, 6). <br/>";
}else {
    print "Le cavalier ne peut pas aller en (2, 6). <br/>";
}

//Tableau de pièces

$pieces = [
    //Pièces blanches
    new Cavalier(3, 3, 1),
    new Cavalier(6, 6, 1),
    new Fou(1, 1, 1),
    new Fou(6, 1, 1),
    //Pièces noires
    new Cavalier(4, 5, 2),
    new Cavalier(7, 3, 2),
    new Fou(5, 5, 2),
    new Fou(7, 4, 2)
];

//Vérification si chacune des pièces peuvent aller en 5,5
echo "Résultats : <br/>";
foreach ($pieces as $index => $piece) {
    $peutAller = $piece->peutAllerA(5, 5); // Vérifie si la pièce peut aller en (5,5)

    echo "Pièce #" . ($index + 1) . " (" . get_class($piece) . ") ";
    echo "à la position (" . $piece->getX() . "," . $piece->getY() . ")";
    if ($peutAller) {
        echo " peut aller à (5,5). <br/>";
    } else {
        echo " ne peut pas aller à (5,5). <br/>";
    }
}