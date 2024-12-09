<?php
namespace Classes\Moteur;

/**
 * Objet Moteur
 */
class Moteur{
    /**
     * Nombre de litre dans le reservoir
     * @var float
     */
    private float $volumeReservoir;
    /**
     * Nombre total de litre reçus
     * @var float
     */
    private float $volumeTotal;
    /**
     * Moteur démarré ou non
     * @var boolean
     */
    private bool $demmarre;

    /**
     * Constructeur de la class Moteur
     * @param float $volumeReservoir Nombre de litre dans le reservoir
     * @param float $volumeTotal Nombre total de litre reçus
     * @param boolean $demarre
     */
    public function __construct(float $volumeReservoir = 0.0, float $volumeTotal = 0.0, bool $demarre = false) {
        $this->volumeReservoir = $volumeReservoir;
        $this->volumeTotal = $volumeTotal;
        $this->demarre = $demarre; Moteur démarré ou non
    }

    //GETTERS
    /**
     * Get volume du réservoir
     * @return float
     */
    public function getVolumeReservoir(): float {
        return $this->volumeReservoir;
    }

    /**
     * Get du volume total
     * @return float
     */
    public function getVolumeTotal(): float {
        return $this->volumeTotal;
    }

    /**
     * Etat du booléen pour savoir si moteur démarré 
     * @return boolean
     */
    public function isDemarre(): bool {
        return $this->demarre;
    }

    
}
