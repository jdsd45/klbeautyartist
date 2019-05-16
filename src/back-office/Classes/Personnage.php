<?php

class Personnage
{
    private $_id;
    private $_nom;
    private $_pv;
    private $_experience;
    private $_niveau;
    private $_c_force;
    private $_c_endurance;
    private $_c_rapidite;
    private $_c_chance;
    private $_c_intelligence;
    private $_classe;
    private $_faction;
    private $_arme_1;
    private $_arme_2;
    private $_last_coup;
    private $_nb_coup_j;
    private $_nb_coup_aut;
    private $_last_co;
    private $_etat;
    private $_date_etat;

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
    const NB_COUP_AUT = 5;

    const ETAT_NORMAL = "NORMAL";
    const ETAT_EFFRAYE = "EFFRAYE";
    const ETAT_ASSOMME = "ETAT_ASSOMME";
    const ETAT_EMPOISONNE = "EMPOISONNE";
    


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

    private function gagnerNiveau()
    {
        $niveau = $this->getNiveau();
        if($niveau < 100)
        {
            $this->setNiveau($niveau + 1);
        }        
    }

    private function setId($id)
    {
        if(is_string($id))
        {
            $this->_id = (int)$id;
        }
    }

    private function setNom($nom)
    {
        if(is_string($nom))
        {
            $this->_nom = $nom;
        }
    }

    private function setPv($pv)
    {
        $this->_pv = $pv;
    }

    private function setExperience($exp)
    {
        $this->_experience = $exp;
    }

    private function setNiveau($niveau)
    {
        $this->_niveau = $niveau;
    }

     private function setC_force($force)
    {
        $this->_c_force = $force;
    }

    private function setC_endurance($endurance)
    {
        $this->_c_endurance = $endurance;
    }    

    private function setC_rapidite($rapidite)
    {
        $this->_c_rapidite = $rapidite;
    }    

    private function setC_chance($chance)
    {
        $this->_c_chance = $chance;
    }     

    private function setC_intelligence($intelligence)
    {
        $this->_c_intelligence = $intelligence;
    }   
    
    private function setClasse($classe)
    {
        $this->_classe = $classe;
    }   

    private function setFaction($faction)
    {
        $this->_faction = $faction;
    }  
    
    private function setArme_1($arme)
    {
        $this->_arme_1 = $arme;
    }     
    
    private function setArme_2($arme)
    {
        $this->_arme_2 = $arme;
    }        

    private function setLast_coup($date)
    {
        $this->_last_coup = $date;
    }  

    private function setNb_coup_j($nb_coups)
    {
        $this->_nb_coup_j = $nb_coups;
    }     
    
    private function setNb_coup_aut($nb_coups)
    {
        $this->_nb_coup_aut = $nb_coups;
    }        
    
    private function setLast_co($date)
    {
        $this->_last_co = $date;
    }       
    
    private function setEtat($etat)
    {
        $this->_etat = $etat;
    }

    private function setDate_etat($date)
    {
        $this->_date_etat = $date;
    }
    

    public function getId() { return $this->_id; }

    public function getNom() { return $this->_nom; }    

    public function getPv() { return $this->_pv; }   
    
    public function getExperience() { return $this->_experience; }

    public function getNiveau() { return $this->_niveau; }

    public function getC_force() { return $this->_c_force; }

    public function getC_endurance() { return $this->_c_endurance; }

    public function getC_rapidite() { return $this->_c_rapidite; }

    public function getC_chance() { return $this->_c_chance; }

    public function getC_intelligence() { return $this->_c_intelligence; }

    public function getClasse() { return $this->_classe; }

    public function getFaction() { return $this->_faction; }

    public function getArme_1() { return $this->_arme_1; }

    public function getArme_2() { return $this->_arme_2; }

    public function getLast_coup() { return $this->_last_coup; }

    public function getNb_coup_j() { return $this->_nb_coup_j; }

    public function getNb_coup_aut() { return $this->_nb_coup_aut; }

    public function getLast_co() { return $this->_last_co; }

    public function getEtat() { return $this->_etat; }

    public function getDate_etat() { return $this->_date_etat; }

}
