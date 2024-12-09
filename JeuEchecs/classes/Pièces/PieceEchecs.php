<?php
namespace App\Pièces;
/**
 * Objet Pièces Echecs
 */
abstract class PieceEchecs
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
     * @param integer $x Coordonnée en x
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

    // GETTERS (permet de récupérer des valeurs d'une propriété)
    /**
     * Get des abscisses X
     *
     * @return int
     */
    public function getX() {
        return $this->x;
    }

    /**
     * Get des ordonnées Y
     *
     * @return int
     */
    public function getY() {
        return $this->y;
    }

    //SETTERS (permet la modification d'une valeur d'une propriété.)
    /**
     * Set des abscisses X
     *
     * @param int $x Coordonnée X des cases
     * @return void
     */
    public function setX($x) {
        //Si la position en X est entre 1 et 8 alors OK
        if ($x >= 1 && $x <= 8) {
            $this->x = $x;
        } else {
            //Si X < 1 alors on met x = 1
            if ($x < 1) {
                $this->x = 1;
            //Si X > 8 alors on met x = 8
            } else {
                $this->x = 8;
            }
        }
    }

    /**
     * Set des ordonnées Y
     *
     * @param int $y Coordonnée Y des cases
     * @return void
     */
    public function setY($y) {
        //Si la position en Y est entre 1 et 8 alors OK
        if ($y >= 1 && $y <= 8) {
            $this->y = $y;
        } else {
            //Si Y < 1 alors on met Y = 1
            if ($y < 1) {
                $this->y = 1;
            //Si X > 8 alors on met x = 8
            } else {
                $this->y = 8;
            }
        }
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
            return 2; // Noir
        } else {
            return 1; // Blanc
        }
    }

    //Vérifier si une case est dans l'échiquier
    public function estDansLEchiquier($x, $y) {
        return $x >= 1 && $x <= 8 && $y >= 1 && $y <= 8;
    }

    // Méthode abstraite (force l'implémentation dans les class enfants)
    //Vérifier si le déplacement à une position
    abstract public function peutAllerA(int $x, int $y);

    //Vérifier si le pion peut manger le pion adverse
    abstract public function peutManger(PieceEchecs $piece);

}//Laisser à la fin
