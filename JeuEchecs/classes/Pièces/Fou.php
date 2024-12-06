<?php
namespace App\Pièces\;
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
        if($this->estDansLEchiquier($x, $y)){
            return true;
        }else{
            return false;
        }
    }


}//Laisser à la fin
