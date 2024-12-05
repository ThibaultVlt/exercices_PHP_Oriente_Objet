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
     * @param integer $coord_X
     * @param integer $coord_y
     * @param integer $couleur
     */
    public function __construct(int $x, int $y, int $couleur)
    {
        $this->x = $x;
        $this->y = $y;
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
        return $this->couleur;
    }

}//Laisser à la fin
