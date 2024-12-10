<?php
namespace Classes;

/**
 * Objet Scooter
 */
class Scooter extends VehiculeAMoteur
{
    /**
     * Consommation de carburant total
     * @var integer
     */
    private $totalCarburantConsomme = 0;

    /**
     * Carburant mis dans le scooter
     * @var integer
     */
    private $totalLitresVerse = 0;

    /**
     * Constructeur Voiture utilisant le constructeur de son parent (VehiculeAMoteur)
     *
     * @param string $marque Marque du véhicule
     * @param string $modele Modèle du véhicule
     * @param float $volumeReservoir Nombre de litre dans le reservoir
     */
    public function __construct(string $marque, string $modele, float $volumeReservoir) {
        parent::__construct($volumeReservoir);
        $this->marque = $marque;
        $this->modele = $modele;
    }

    /**
     * Méthode magique qui permet la conversion en chaîne de caractère
     * @return string
     */
    public function toString() {
        return "Scooter: {$this->marque}-{$this->modele}, il reste {$this->moteur->getVolumeReservoir()} litre(s) dans le réservoir";
    }

    /**
     * Faire rouler le scooter
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     */
    public function rouler(float $volume) {
        $initialVolume = $this->moteur->getVolumeReservoir(); // Sauvegarder le volume initial
        while ($volume > 0) {
            //Si le réservoir est insuffisant, utiliser l'exception
            if ($this->moteur->getVolumeReservoir() < $volume) {
                throw new PanneEssenceException("Panne d'essence !");
            }

            // Démarrage et utilisation du carburant
            if (!$this->moteur->isDemarre()) {
                echo "Le moteur est démarré avec {$this->moteur->getVolumeReservoir()} litre(s) dans le réservoir<br/>";
                $this->demarrer();
            }

            $this->moteur->utiliser($volume);
            $this->totalCarburantConsomme += $volume; // Suivre la consommation
            echo "Le moteur utilise {$volume} litre(s), il reste {$this->moteur->getVolumeReservoir()} litre(s).<br/>";
            $volume = 0; // Fin du trajet si carburant suffisant
        }
    }

    /**
     * Faire le plein de la voiture
     *
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     */
    public function faireLePlein(float $volume) {
        $this->totalLitresVerse += $volume;  // Ajouter les litres versés
        echo "Je vais faire le plein ...<br/>";
        $this->arreter();
        $this->moteur->faireLePlein($volume);
        echo "Le moteur est arrêté<br/>";
        echo "Je fais le plein avec {$volume} litre(s)<br/>";
        $this->demarrer();
    }
    

}
