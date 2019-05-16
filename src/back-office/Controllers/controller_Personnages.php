<?php

function controller_personnages($action, $twig)
{
    switch ($action) 
    {
        case 'listPersonnages':
            $arrayTwig['donneesPersos'] = PersonnageManager::getPersonnages();
            $vueTwig = 'Vue_Personnages.twig';
        break;

        case 'monPersonnage':
            $arrayTwig['perso'] = PersonnageManager::getPersonnage($_SESSION['nom']);
            $vueTwig = 'Vue_Perso.twig';
        break;
        
        case 'attaquer':
            if(isset($_POST['nom_target']))
            {
                $nom_target = htmlentities($_POST['nom_target']);
                $donneesTarget = PersonnageManager::getPersonnage($nom_target);
                if($donneesTarget)
                {
                    $perso = unserialize($_SESSION['perso']);
                    $persoTarget = new Personnage($donneesTarget);
                    $degats = $perso->frapper($persoTarget);
                    $perso->gagnerExperience(10);
                    $persoTarget->recevoirDegats($degats);
                    PersonnageManager::updatePersonnage($perso);
                    EventManager::addEvent(EventManager::CAT_ATTAQUE, $_SESSION['nom'], $persoTarget->getNom());
                
                    if($persoTarget->getPv() <= 0)
                    {
                        PersonnageManager::supprimerPersonnage($persoTarget);
                        EventManager::addEvent(EventManager::CAT_MORT, $_SESSION['nom'], $persoTarget->getNom());
                        $perso->gagnerExperience(80);
                    }
                    PersonnageManager::updatePersonnage($persoTarget);
                    $_SESSION['perso'] = serialize($perso);                    

                    

                    header('Location: index.php?action=personnages');
                }
            }

            $vueTwig = 'Vue_Personnages.twig';
            $arrayTwig['donneesPersos'] = PersonnageManager::getPersonnages();
        break;   
        
        case 'historique':
            $vueTwig = 'Vue_Historique.twig';
            $arrayTwig['historique'] = EventManager::getEvents();            
        break;
    }
    echo $twig->render($vueTwig, $arrayTwig);  
}