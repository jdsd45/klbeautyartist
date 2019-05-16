<?php

class UtilisateurManager extends BddManager
{
    private $_isConnect;
    private $_nom;
    private $_mdp;

    public function __construct($nom, $mdp)
    {
        $this->setIsConnect(false);
        $this->setNom($nom);
        $this->setMdp($mdp);
        
    }

    public function connexion()
    {
        $nom = $this->getNom();
        $mdp = $this->getMdp();
        
        $resultat = PersonnageManager::isPersonnageExist($nom);
        $mdpCorrect = password_verify($mdp, $resultat['mdp']);

        if ($mdpCorrect)
        {
            $this->setIsConnect(true);
        }
    }

    private function setIsConnect($etat)
    {
        $this->_isConnect = $etat;
    }

    private function setNom($nom)
    {
        $this->_nom = $nom;
    }
    
    private function setMdp($mdp)
    {
        $this->_mdp = $mdp;
    }    

    public function getIsConnect()
    {
        return $this->_isConnect;
    }    

    public function getNom()
    {
        return $this->_nom;
    }    
    
    private function getMdp()
    {
        return $this->_mdp;
    }         

}   