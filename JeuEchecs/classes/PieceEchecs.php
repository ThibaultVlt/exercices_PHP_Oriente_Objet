<?php
/**
 * Objet Pièces Echecs
 */
class PieceEchecs
{
/**
     *  Coordonnée X des cases
     * @var int
     */
    private $x;
/**
     *  Coordonnée Y des cases
     * @var int
     */
    private $y;
    /**
     * Couleur de la pièce
     * 1 = blanche
     * 2 = noire
     * @var int
     */
    private $couleur;

    /**
     * Constructeur du plateau d'échec
     *
     * @param integer $x Coorodonée en x
     * @param integer $y Coordonnée en y
     * @param integer $couleur Couleur de la case et/ou de la pièce
     */
    public function __construct(int $x, int $y, int $couleur)
    {
        //On vérifie que la valeur de x et entre 1 et 8, sinon on force la valeur au plus proche
        if ($x < 1){
            $x = 1;
        }
        if ($x > 8){
            $x = 8;
            }
        $this->x = $x;

        //On vérifie que la valeur de y et entre 1 et 8, sinon on force la valeur au plus proche
        if ($y < 1){
            $y = 1;
        }
        if ($y > 8){
            $y = 8;
        }
        $this->y = $y;

        //On vérifie que la couleur est 1 ou 2, sinon met une valeur par défaut à 1 (blanc)
        if ($couleur != 1 && $couleur != 2) {
            $couleur = 1;
        }
        $this->couleur = $couleur;
    }

    /**
     * Couleur de la pièce d'échec
     *
     * @return integer
     */
    public function getCouleur(): int
    {
        return $this->couleur;
    }

    /**
     * Couleur de la case ou se trouve la pièce
     *
     * @return integer
     */
    public function getCouleurCase(): int
    {
        //On cherche a savoir si la case et pair ou impair
        //On regarde si la somme / 2 = 1 ou a 2 pour savoir si case blanche (1) ou noire (2)
        $somme = $this->x + $this->y;
        if ($somme % 2 == 0) {
            return 1; // Blanc
        } else {
            return 2; // Noir
        }

        //TEST
//         $piece = new PieceEchecs(9, 0, 3); // Coordonnées invalides et couleur invalide
// echo "Couleur de la pièce : " . $piece->getCouleur() . "\n"; // Affiche 1 (blanc par défaut)
// echo "Couleur de la case : " . $piece->getCouleurCase() . "\n"; 
    }

}//Laisser à la fin
