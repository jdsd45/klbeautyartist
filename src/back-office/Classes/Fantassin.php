<?php

class Fantassin extends Perso
{
    const PV_INITIAUX = 100; 
    const NIVEAU_INITIAL = 1;
    const EXP_INITIAL = 0;

    const FORCE_INIT = 15;
    const ENDURANCE_INIT = 15;
    const RAPIDITE_INIT = 5;
    const CHANCE_INIT = 10;
    const INTELLIGENCE_INIT = 5;

    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function frapper($perso)
    {
        $degats = 0;
        if($perso->getNom() != $this->getNom())
        {
            $degats = 5;
            return $degats;
        }
        return $degats;
    }
    
}
