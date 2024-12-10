<?php
namespace Classes;

/**
 * Objet Scooter
 */
class Scooter extends VehiculeAMoteur
{
    /**
     * Constructeur Voiture utilisant le constructeur de son parent (VehiculeAMoteur)
     * @param float $volumeReservoir Nombre de litre dans le reservoir
     */
    public function __construct(float $volumeReservoir)
    {
        parent::__construct($volumeReservoir);
    }

    /**
     * Faire rouler le scooter
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     */
    public function rouler(float $volume)
    {
        //Si le moteur n'est pas démarré, on le démarre
        if (!$this->moteur->isDemarre()) {
            $this->demarrer();
        }
        //Quantité de carburant utilisé.
        $carburantRestant = $this->moteur->utiliser($volume);
        echo "Carburant restant après le trajet : {$carburantRestant} L<br/>";
    }
}
