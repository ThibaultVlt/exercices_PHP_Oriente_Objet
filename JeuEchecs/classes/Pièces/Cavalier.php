<?php
namespace App\Pièces;
/**
 * Objet cavalier
 */
class Cavalier extends PieceEchecs
{
    /**
     * Constructeur du Cavalier
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
        //Déplacement spécifique au Cavalier en L
        //déplacement sur X => dx soit dx=1  || dx=2
        //déplacement en y: pour dx=1 alors dy=2
        //pour dx=2 alors dy=1
        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());
        if (($dx === 2 && $dy === 1) || ($dx === 1 && $dy === 2)) {
            return true;
        } else {
            return false;
        }
    }

}//Laisser à la fin
