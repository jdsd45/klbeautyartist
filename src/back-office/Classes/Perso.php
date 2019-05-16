<?php

abstract class Perso
{
    protected $_id;
    protected $_nom;
    protected $_pv;
    protected $_experience;
    protected $_niveau;
    protected $_c_force;
    protected $_c_endurance;
    protected $_c_rapidite;
    protected $_c_chance;
    protected $_c_intelligence;
    protected $_classe;
    protected $_faction;
    protected $_arme_1;
    protected $_arme_2;
    protected $_last_coup;
    protected $_nb_coup_j;
    protected $_nb_coup_aut;
    protected $_last_co;
    protected $_etat;
    protected $_date_etat;

    const PV_INITIAUX = 100; 
    const NIVEAU_INITIAL = 1;
    const EXP_INITIAL = 0;

    const FORCE_INIT = 5;
    const ENDURANCE_INIT = 5;
    const RAPIDITE_INIT = 5;
    const CHANCE_INIT = 5;
    const INTELLIGENCE_INIT = 5;

    const CLASSE_FANTASSIN = "FANTASSIN"; 
    const CLASSE_ESPION = "ESPION";
    const CLASSE_CAVALIER = "CAVALIER";

    const FACTION_GRECS = "GRECS";
    const FACTION_ROMAINS = "ROMAINS";

    const ARME_GLAIVE = "GLAIVE";
    const ARME_PILLUM = "PILLUM";
    const ARME_ARC = "ARC";
    const ARME_FRONDE = "FRONDE";
    const ARME_POIGNARD = "POIGNARD";

    const NB_COUP_J_INIT = 0;
    const NB_COUP_AUT_INIT = 5;

    const ETAT_NORMAL = "NORMAL";
    const ETAT_EFFRAYE = "EFFRAYE";
    const ETAT_ASSOMME = "ETAT_ASSOMME";
    const ETAT_EMPOISONNE = "EMPOISONNE";


    public function recevoirDegats($degats)
    {
        $pv = $this->getPv() - $degats;
        $this->setPV($pv);
    }

    public function gagnerExperience($exp)
    {
        $expTotal = $this->getExperience() + $exp;
        if($expTotal >= 100)
        {
            $expTotal = $expTotal - 100; 
            $this->gagnerNiveau();
        }
        $this->setExperience($expTotal);
    }

    protected function gagnerNiveau()
    {
        $niveau = $this->getNiveau();
        if($niveau < 100)
        {
            $this->setNiveau($niveau + 1);
        }        
    }
}