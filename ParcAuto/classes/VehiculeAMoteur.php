<?php
namespace Classes;
/**
 * Objet abstrait Véhicule à moteur
 */
abstract class VehiculeAMoteur extends Vehicule
{
    /**
     * Propriété $moteur instance de la class Moteur
     *
     * @var Moteur
     */
    protected Moteur $moteur;

    /**
     * Constructeur de VéhiculeAMoteur
     * @param float $volumeRevervoir Nombre de litre dans le reservoir
     */
    public function __construct(string $marque, string $modele, float $volumeReservoir)
    {
        parent::__construct($marque, $modele);
        $this->moteur = new Moteur($volumeReservoir);
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
     * Démarrer le véhicule
     *Délègue l'opération au moteur
     * @return boolean
     */
    public function demarrer() : bool
    {
        return $this->moteur->demarrer();
    }
    
    /**
     * Arrêter le véhicule
     * Délègue l'opération au moteur
     * @return void
     */
    public function arreter()
    {
        $this->moteur->arreter();
    }

    /**
     * Ajouter un volume de carburant dans le réservoir
     *
     * @param float $volume Quantité de carburant (en Litres)
     * @return void
     * @return void
     */
    public function faireLePlein(float $volume) {
        //Étapes prédéfinies :
        //Arrêter le moteur
        $this->arreter();

        //Faire le plein (par class Moteur)
        $this->moteur->faireLePlein($volume);

        //Démarrer le moteur
        $this->demarrer();
    }
}
