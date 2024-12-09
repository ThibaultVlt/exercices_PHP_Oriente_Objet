<?php
namespace App\Pièces;

/**
 * Objet Roi
 */
class Roi extends PieceEchecs
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
        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());
        //Déplacement d'une case seulement, en horizontal, vertical ou diagonal
        return ($dx <= 1 && $dy <= 1);
    }

    /**
     * Vérification si on peut manger un autre pion
     *
     * @param PieceEchecs $piece
     * @return boolean
     */
    public function peutManger(PieceEchecs $piece): bool {
        // Vérifie si la pièce est adjacente au roi (une case de distance)
        $dx = abs($this->getX() - $piece->getX());
        $dy = abs($this->getY() - $piece->getY());

        // Si la pièce est adjacente (une case dans toutes les directions)
        if ($dx <= 1 && $dy <= 1) {
            // Le roi peut manger la pièce s'il a une couleur différente
            return $this->getCouleur() !== $piece->getCouleur();
        }

        return false;
    }

}//Laisser à la fin
