<?php
namespace Classes\Vehicule;

abstract class Vehicule {

    //Méthodes abstraite
    abstract public function demarrer(): bool;
    abstract public function arreter();
    abstract public function faireLePlein(float $volume);
}