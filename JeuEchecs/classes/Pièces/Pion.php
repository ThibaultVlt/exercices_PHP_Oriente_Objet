<?php
namespace App\Pièces;

/**
 * Objet Pion
 */
class Pion extends PieceEchecs
{
    /**
     * Constructeur du Fou
     *
     * @param integer $x Coordonnée en x
     * @param integer $y Coordonnée en y
     * @param integer $couleur Couleur de la case et/ou de la pièce
     */
    public function __construct(int $x, int $y, int $couleur)
    {
        parent::__construct($x, $y, $couleur);
    }


    /**
     * Vérification si on peut faire le déplacement
     *
     * @param integer $x Coordonnée en x
     * @param integer $y Coordonnée en y
     * @return boolean
     */
    public function peutAllerA($x, $y) {
        // Déplacement normal du pion
        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());
        
        // Le pion se déplace généralement d'une case en avant (horizontalement = 0, verticalement = 1)
        if ($dx == 0 && $dy == 1) {
            // Si pion est blanc, déplacement vers le haut
            //Si pion noir, déplacement vers le bas
            if ($this->getCouleur() == 1) {
                return $y > $this->getY();
            } else {
                return $y < $this->getY();
            }
        }

        //Pion au départ peut avancer de 2 cases (y=2 || y=7)
        if ($dx == 0 && $dy == 2) {
            if ($this->getCouleur() == 1) {
                //Pion blanc, de 2 à 4
                return $this->getY() == 2 && $y == 4; 
            } else {
                //Pion noir, de 7 à 5
                return $this->getY() == 7 && $y == 5;
            }
        }

        //Vérifie si le pion capture une pièce en diagonale
        if ($dx == 1 && $dy == 1) {
            // Le pion capture en diagonale
            if ($this->getCouleur() == 1) {
                //Pion blanc, il capture vers le haut
                return $y > $this->getY();
            } else {
                //Pion noir, il capture vers le bas
                return $y < $this->getY();
            }
        }

        return false; // Le pion ne peut pas aller à cette case
    }

    /**
     * Vérification si on peut manger un autre pion
     *
     * @param PieceEchecs $piece
     * @return void
     */
    public function peutManger(PieceEchecs $piece)
    {
        // Le pion mange en diagonale (1 case en diagonale)
        $dx = abs($this->getX() - $piece->getX());
        $dy = abs($this->getY() - $piece->getY());

        if ($dx == 1 && $dy == 1) {
            // Le pion blanc capture vers le haut, le pion noir vers le bas
            return ($this->getCouleur() == 1 && $piece->getY() > $this->getY()) ||
            ($this->getCouleur() == 2 && $piece->getY() < $this->getY());
        }

        return false;  // Le pion ne peut pas manger ici
    }
}//Laisser à la fin
