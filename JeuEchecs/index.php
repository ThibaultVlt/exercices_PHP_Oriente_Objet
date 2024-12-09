<?php

use App\Autoload;
// use App\Pièces\PieceEchecs; ne peut plus être instancié car class abstraite
use App\Pièces\Cavalier;
use App\Pièces\Fou;
use App\Pièces\Roi;
use App\Pièces\Pion;

require_once 'classes/Autoload.php';
Autoload::register();

//--------------------TESTS--------------------

//Vérification de la couleur de la pièce et de la couleur de la case
// $piece = new PieceEchecs(8, 1, 0);
//Résultats : 1 => blanc ; 2 => noire
// echo "Verification de la couleur des pièces et des cases de l'échiquier (8, 1, 0) :<br/>";
// echo "Couleur de la pièce : " . $piece->getCouleur() . "<br/>";
// echo "Couleur de la case : " . $piece->getCouleurCase() . "<br/>";

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

// Création du tableau de pièces
$pieces = [
    // Pièces blanches
    new Cavalier(3, 3, 1), // Pièce blanche
    new Cavalier(6, 6, 1), // Pièce blanche
    new Fou(1, 1, 1),      // Pièce blanche
    new Fou(6, 1, 1),      // Pièce blanche
    new Roi(4, 4, 1),      // Pièce blanche
    new Pion(2, 2, 1),     // Pièce blanche

    // Pièces noires
    new Cavalier(4, 5, 2), // Pièce noire
    new Cavalier(7, 3, 2), // Pièce noire
    new Fou(5, 5, 2),      // Pièce noire
    new Fou(7, 4, 2),      // Pièce noire
    new Roi(6, 6, 2),      // Pièce noire
    new Pion(7, 7, 2)      // Pièce noire
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
echo "<br/><br/>";

//Test de peutManger()
$roiBlanc = new Roi(4, 4, 1);
$roiNoir = new Roi(5, 5, 2);
$cavalierBlanc = new Cavalier(1, 2, 1);
$cavalierNoir = new Cavalier(2, 4, 2);
$pionBlanc = new Pion(2, 2, 1);
$pionNoir = new Pion(3, 3, 2);

// Test des méthodes `peutManger` des pièces
echo "Test de peutManger():<br/>";

// Le roi blanc peut manger le roi
//Résultat attendu : Oui, ils sont adjacents
if ($roiBlanc->peutManger($roiNoir)) {
    echo "Roi Blanc peut manger Roi Noir<br/>";
} else {
    echo "Roi Blanc ne peut pas manger Roi<br/>";
}

// Le cavalier blanc peut manger le cavalier
//Résultat attendu : Non, position pas en 'L' pour un cavalier
if ($cavalierBlanc->peutManger($cavalierNoir)) {
    echo "Cavalier Blanc peut manger Cavalier<br/>";
} else {
    echo "Cavalier Blanc ne peut pas manger Cavalier<br/>";
}

// Le pion blanc peut manger le pion
//Résultat attendu : Non, ne sont pas en position diagonale
if ($pionBlanc->peutManger($pionNoir)) {
    echo "Pion Blanc peut manger Pion Noir<br/>";
} else {
    echo "Pion Blanc ne peut pas manger Pion Noir<br/>";
}

// Le pion blanc peut manger le roi
//Résultat attendu : Non, le pion ne mange que en diagonale de 1
if ($pionBlanc->peutManger($roiNoir)) {
    echo "Pion Blanc peut manger Roi<br/>";
} else {
    echo "Pion Blanc ne peut pas manger Roi<br/>";
}

// Le cavalier noir peut manger le pion blanc ?
//Résultat attendu : Oui, distance en 'L'
if ($cavalierNoir->peutManger($pionBlanc)) {
    echo "Cavalier Noir peut manger Pion Blanc<br/>";
} else {
    echo "Cavalier Noir ne peut pas manger Pion Blanc<br/>";
}

// Le roi noir peut manger le cavalier blanc
//Résultat attendu : Oui, ils sont adjacents
if ($roiNoir->peutManger($cavalierBlanc)) {
    echo "Roi Noir peut manger Cavalier Blanc<br/>";
} else {
    echo "Roi Noir ne peut pas manger Cavalier Blanc<br/>";
}
