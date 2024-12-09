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
    private bool $demarre;

    /**
     * Constructeur de la class Moteur
     * @param float $volumeReservoir Nombre de litre dans le reservoir
     * @param float $volumeTotal Nombre total de litre reçus
     * @param boolean $demarre
     */
    public function __construct(float $volumeReservoir = 0.0, float $volumeTotal = 0.0, bool $demarre = false) {
        $this->volumeReservoir = $volumeReservoir;
        $this->volumeTotal = $volumeTotal;
        $this->demarre = $demarre;
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

    TODO A Tester / Aucun test effectué
    /**
     * Consommation de 0.1 litre
     * retour true si le véhicule démarre
     * @return boolean
     */
    public function demarrer(): bool {
        echo "Tentative de démarrage...\n";

        if ($this->volumeReservoir >= 0.1) {
            $this->volumeReservoir -= 0.1;
            $this->demarre = true;
            echo "Je démarre. Carburant restant : {$this->volumeReservoir} L\n";
            return true;
        } else {
            echo "Impossible de démarrer. Pas assez de carburant (reste {$this->volumeReservoir} L).\n";
            $this->demarre = false;
            return false;
        }
    }

    /**
     * Consommation du carburant pour un trajet
     *
     * @param float $volumeNecessaire
     * @return float
     */
    public function utiliser(float $volumeNecessaire): float {
        echo "Utilisation du moteur. Volume nécessaire : {$volumeNecessaire} L\n";

        //Vérification du carburant disponible
        if ($this->volumeReservoir >= $volumeNecessaire) {
            $this->volumeReservoir -= $volumeNecessaire;
            echo "Trajet effectué. Carburant restant : {$this->volumeReservoir} L\n";
        } else {
            echo "Carburant insuffisant. Utilisation de tout le réservoir ({$this->volumeReservoir} L).\n";
            $volumeNecessaire = $this->volumeReservoir;
            $this->volumeReservoir = 0;
        }

        return $this->volumeReservoir;
    }


    /**
     * Ajouter un volume de carburant dans le réservoir
     *
     * @param float $volume
     * @return void
     */
    public function faireLePlein(float $volume): void {
        $this->volumeReservoir += $volume;
        $this->volumeTotal += $volume;

        echo "Faire le plein : +{$volume} L. Carburant total reçu : {$this->volumeTotal} L. Carburant actuel : {$this->volumeReservoir} L\n";
    }

    /**
     * Arrêter le moteur
     *
     * @return void
     */
    public function arreter(): void {
        if ($this->demarre) {
            $this->demarre = false;
            echo "Moteur arrêté.\n";
        } else {
            echo "Le moteur est déjà arrêté.\n";
        }
    }
}
