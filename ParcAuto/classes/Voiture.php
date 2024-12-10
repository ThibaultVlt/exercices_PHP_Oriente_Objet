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
    public function rouler(float $volume)
    {
        // Si le moteur n'est pas démarré, on démarre
        if (!$this->moteur->isDemarre()) {
            $this->demarrer();
        }
        // On utilise le carburant pour le trajet
        $carburantRestant = $this->moteur->utiliser($volume);
    }
}
