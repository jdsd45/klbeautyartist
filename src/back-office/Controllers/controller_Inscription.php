<?php

function creationPersonnage($twig)
{

    $arrMessagesCreation = array();
    $isPersoCreate = false;
    $essaiCreation = false;

    function nomPersoValide($nom)
    {
        global  $arrMessagesCreation;
        if(strlen($nom) < 3)
        {
            $arrMessagesCreation[] = "Nom de personnage trop court (min. 3 caractères)";
            return false;
        }
        $isUserExist = PersonnageManager::isPersonnageExist($nom);
        if($isUserExist) 
        { 
            $arrMessagesCreation[] = "Nom de personnage déjà pris!";
            return false;
        }        

        return true;
    }

    function mdpValide($mdp, $mdp_conf)
    {
        $reponse = true;
        global  $arrMessagesCreation;
        if(strlen($mdp) < 4)
        {
            $arrMessagesCreation[] = "Mot de passe trop court (min. 4 caractères)";
            $reponse = false;
        }
        if($mdp !== $mdp_conf)
        {
            $arrMessagesCreation[] = "Les mots de passe ne correspondent pas.";
            $reponse = false;
        }
        return $reponse;
    }

    function classeValide($classe)
    {
        global  $arrMessagesCreation;
        $classes = array('CLASSE_FANTASSIN', 'CLASSE_ESPION', 'CLASSE_CAVALIER');
        if(in_array($classe, $classes))
        {
            return true;
        }
        $arrMessagesCreation[] = "Classe inexistante!";
        return false;
    }

    function factionValide($faction)
    {
        global  $arrMessagesCreation;
        $factions = array('FACTION_GRECS', 'FACTION_ROMAINS');
        if(in_array($faction, $factions))
        {
            return true;
        }
        $arrMessagesCreation[] = "Faction inexistante!";
        return false;
    }    
    
        if(isset($_POST['nom_perso']))
        {
            global $arrMessagesCreation;
            $essaiCreation = true;

            $nom = ucfirst(strtolower(htmlentities($_POST['nom_perso'])));
            $mdp = htmlentities($_POST['mdp']);
            $mdp_conf = htmlentities($_POST['mdp_conf']);
            $classe = htmlentities($_POST['classe_perso']);
            $faction = htmlentities($_POST['faction_perso']);

            $nomPersoValide = nomPersoValide($nom);
            $mdpValide = mdpValide($mdp, $mdp_conf);
            $classeValide = classeValide($classe);
            $factionValide = factionValide($faction);
            if($nomPersoValide && $mdpValide && $classeValide && $factionValide)
            {
                $donnees = array(
                    'nom' => $nom,
                    'pv' => Personnage::PV_INITIAUX,
                    'experience' => Personnage::EXP_INITIAL,
                    'niveau' => Personnage::NIVEAU_INITIAL, 
                    'c_force' => Personnage::FORCE_INIT,
                    'c_endurance' => Personnage::ENDURANCE_INIT,
                    'c_rapidite' => Personnage::RAPIDITE_INIT,
                    'c_chance' => Personnage::CHANCE_INIT,
                    'c_intelligence' => Personnage::INTELLIGENCE_INIT,
                    'classe' => constant('Personnage::'.$classe),
                    'faction' => constant('Personnage::'.$faction),
                    'arme_1' => Personnage::ARME_GLAIVE,
                    'arme_2' => Personnage::ARME_ARC,
                    'nb_coup_j' => Personnage::NB_COUP_J_INIT,
                    'nb_coup_aut' => Personnage::NB_COUP_AUT,
                    'etat' => Personnage::ETAT_NORMAL
                );
                $perso = new Personnage($donnees);
                PersonnageManager::ajouterPersonnage($perso, $mdp);
                EventManager::addEvent(EventManager::CAT_CREATION, $nom);
                $isPersoCreate = true;
                $arrMessagesCreation[] = "Personnage créé";
            }
        }
        
        echo $twig->render('Vue_CreationPerso.twig', [
            'essaiCreation' => $essaiCreation,
            'tabMessages' => $arrMessagesCreation,
            'isPersoCreate' => $isPersoCreate
        ]);
}