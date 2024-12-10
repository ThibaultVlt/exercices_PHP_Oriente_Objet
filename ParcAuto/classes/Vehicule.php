<?php
namespace Classes;
/**
 * Objet Vehicule
 */
abstract class Vehicule
{
    /**
     * Marque du véhicule
     *
     * @var string
     */
    protected string $marque;

    /**
     * Modèle du véhicule
     *
     * @var string
     */
    protected string $modele;

    /**
     * Constructeur de la class Vehicule
     *
     * @param string $marque Marque du véhicule
     * @param string $modele Modèle du véhicule
     */
    public function __construct(string $marque, string $modele)
    {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    /**
     * Méthode magique qui permet la conversion en chaîne de caractère
     * @return string
     */
    public function __toString(): string
    {
        return "Véhicule: {$this->marque}-{$this->modele}";
    }

    //Méthodes abstraite
    /**
     * Méthode abstraite démarrer le véhicule
     * @return boolean
     */
    abstract public function demarrer(): bool;
    /**
     * Méthode abstraite arrêt du véhicule
     * @return void
     */
    abstract public function arreter();
    /**
     * Méthode abstraite pour faire le plein
     * @param float $volume Volume de carburant mit dans le réservoir
     * @return void
     */
    abstract public function faireLePlein(float $volume);
}
