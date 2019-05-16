<?php

function controller_connexion($action, $twig)
{
    $essaiConnexion = false;
    $estConnecte = false;

    switch ($action) 
    {
        case 'connexion':
            if(isset($_POST['nom_perso']))
            {
                $essaiConnexion = true;
                $nom = ucfirst(strtolower(htmlentities($_POST['nom_perso'])));
                $mdp = htmlentities($_POST['mdp']);
        
                $manager = new UtilisateurManager($nom, $mdp);
                $manager->connexion();
                $estConnecte = $manager->getIsConnect();
                if ($estConnecte)
                {
                    $donneesPerso = PersonnageManager::getPersonnage($nom);
                    $perso = new Personnage($donneesPerso);
                    session_start();
                    $_SESSION['nom'] = $nom;
                    $_SESSION['perso'] = serialize($perso);
                    $twig->addGlobal('isSession', 'vrai');
                    $twig->addGlobal('nomPerso', $_SESSION['nom']);
                    header('Location: index.php?action=perso');
                }
            }
        break;
        
        case 'deconnexion':        
            session_unset();
            session_destroy();
            $twig->addGlobal('isSession', null);
        break;
    }

    echo $twig->render('Vue_Connexion.twig', [
        'essaiConnexion' => $essaiConnexion,
        'estConnecte' => $estConnecte
        ]);     
}