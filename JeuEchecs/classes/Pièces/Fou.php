<?php
namespace App\Pièces;

use Random\Engine;

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
    
    /**
     * Vérification si on peut manger un autre pion
     *
     * @param PieceEchecs $piece
     * @return void
     */
    public function peutManger(PieceEchecs $piece)
    {
        // Logique du Fou : Le Fou peut "manger" une pièce si elle est sur une diagonale
        $dx = abs($this->getX() - $piece->getX());
        $dy = abs($this->getY() - $piece->getY());

        return $dx == $dy;  // Le Fou se déplace en diagonale
    }

}//Laisser à la fin
