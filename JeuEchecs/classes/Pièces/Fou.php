<?php
namespace App\Pièces;
/**
 * Objet fou
 */
class Fou extends PieceEchecs
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
    public function peutAllerA($x, $y)
    {
        //Si la case n'est pas dans l'échiquier alors pas de déplacement possible vers cette position
        if (!$this->estDansLEchiquier($x, $y)) {
            return false;
        }

        //Déplacement spécifique au Fou en diagonale
        //déplacement sur X => dx soit dx=1
        //déplacement en y: dy=1
        //Donc dx = dy
        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());
        if ($dx === $dy) {
            return true;
        } else {
            return false;
        }
    }

}//Laisser à la fin
