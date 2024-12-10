<?php
namespace Classes;


/**
 * Objet Voiture
 */
class Voiture extends VehiculeAMoteur
{
    /**
     * Constructeur Voiture utilisant le constructeur de son parent (VehiculeAMoteur)
     * @param float $volumeReservoir Nombre de litre dans le reservoir
     */
    public function __construct(string $marque, string $modele, float $volumeReservoir)
    {
        parent::__construct($marque, $modele, $volumeReservoir);
    }

    /**
     * Méthode magique qui permet la conversion en chaîne de caractère
     * @return string
     */
    public function __toString(): string
    {
        return "Voiture: {$this->marque}-{$this->modele}, il reste {$this->moteur->getVolumeReservoir()} litre(s) dans le réservoir<br/>" . $this->moteur;
    }

    /**
     * Faire rouler la voiture
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     */
    public function rouler(float $volume) {
        while ($volume > 0) {
            //Si le réservoir est insuffisant, utiliser l'exception
            if ($this->moteur->getVolumeReservoir() < $volume) {
                throw new PanneEssenceException("Panne d'essence !");
            }

            //Démarrage et utilisation du carburant
            if (!$this->moteur->isDemarre()) {
                $this->demarrer();
            }

            $this->moteur->utiliser($volume);
            echo "Le moteur utilise {$volume} litre(s), il reste {$this->moteur->getVolumeReservoir()} litre(s).<br/>";
            $volume = 0;
        }
    }

    /**
     * Faire le plein de la voiture
     *
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     */
    public function faireLePlein(float $volume) {
        echo "Je vais faire le plein...<br/>";
        $this->arreter();
        $this->moteur->faireLePlein($volume);
        $this->demarrer();
    }
}
