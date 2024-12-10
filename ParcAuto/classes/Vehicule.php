<?php
namespace Classes;
/**
 * Objet Vehicule
 */
abstract class Vehicule
{

    //Méthodes abstraite
    /**
     * Méthode abstraite
     *
     * @return boolean
     */
    abstract public function demarrer(): bool;
    abstract public function arreter();
    abstract public function faireLePlein(float $volume);
}