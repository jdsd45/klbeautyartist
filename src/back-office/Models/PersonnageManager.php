<?php 

class PersonnageManager extends BddManager
{

    public static function ajouterPersonnage($perso, $mdp)
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare('
        INSERT INTO table_perso(nom, pv, mdp, experience, niveau, c_force, c_endurance, c_rapidite, c_chance, c_intelligence, classe, faction, arme_1, arme_2, nb_coup_j, nb_coup_aut, etat, date_etat) 
        VALUES (:nom, :pv, :mdp, :experience, :niveau, :c_force, :c_endurance, :c_rapidite, :c_chance, :c_intelligence, :classe, :faction, :arme_1, :arme_2, :nb_coup_j, :nb_coup_aut, :etat, :date_etat)');
        $requete->execute(array(
            'nom' => $perso->getNom(),
            'pv' => $perso->getPv(),
            'mdp' => password_hash($mdp, PASSWORD_DEFAULT),
            'experience' => $perso->getExperience(),
            'niveau' => $perso->getNiveau(),
            'c_force' => $perso->getC_force(),
            'c_endurance' => $perso->getC_endurance(),
            'c_rapidite' => $perso->getC_rapidite(),
            'c_chance' => $perso->getC_chance(),
            'c_intelligence' => $perso->getC_intelligence(),
            'classe' => $perso->getClasse(),
            'faction' => $perso->getFaction(),
            'arme_1' => $perso->getArme_1(),
            'arme_2' => $perso->getArme_2(),
            'nb_coup_j' => $perso->getNb_coup_j(),
            'nb_coup_aut' => $perso->getNb_coup_aut(),
            'etat' => $perso->getEtat(),
            'date_etat'=>$perso->getDate_etat()
        ));
    }

    public static function supprimerPersonnage($perso)
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare('DELETE FROM table_perso WHERE nom = ?');
        $requete->execute(array($nom = $perso->getNom()));
    }

    public static function updatePersonnage($perso)
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare('
        UPDATE table_perso 
        SET pv=:pv, experience=:experience, niveau=:niveau, c_force=:c_force, c_endurance=:c_endurance, c_rapidite=:c_rapidite, c_chance=:c_chance, c_intelligence=:c_intelligence, arme_1=:arme_1, arme_2=:arme_2, last_coup=:last_coup, nb_coup_j=:nb_coup_j, nb_coup_aut=:nb_coup_aut, last_co=:last_co, etat=:etat, date_etat=:date_etat
        WHERE nom = :nom');
        $requete->execute(array(
            'nom' => $perso->getNom(),
            'pv' => $perso->getPv(),
            'experience' => $perso->getExperience(),
            'niveau' => $perso->getNiveau(),
            'c_force' => $perso->getC_force(),
            'c_endurance' => $perso->getC_endurance(),
            'c_rapidite' => $perso->getC_rapidite(),
            'c_chance' => $perso->getC_chance(),
            'c_intelligence' => $perso->getC_intelligence(),
            'arme_1' => $perso->getArme_1(),
            'arme_2' => $perso->getArme_2(),
            'last_coup' => $perso->getLast_coup(),
            'nb_coup_j' => $perso->getNb_coup_j(),
            'nb_coup_aut' => $perso->getNb_coup_aut(),
            'last_co' => $perso->getLast_co(),
            'etat' => $perso->getEtat(),
            'date_etat' =>$perso->getDate_etat()
        ));      
    }

    public static function isPersonnageExist($nom)
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare('SELECT nom, mdp FROM table_perso WHERE nom = ?');
        $requete->execute(array($nom));
        $resultat = $requete->fetch();  
        
        return $resultat;
    }

    public static function getPersonnages()
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->query('SELECT id, nom, pv, niveau, classe, faction, arme_1, arme_2, etat, date_etat FROM table_perso ORDER BY nom');
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
    
        return $donnees;
    }

    public static function getPersonnage($nom)
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare('
        SELECT id, nom, pv, experience, niveau, c_force, c_endurance, c_rapidite, c_chance, c_intelligence, classe, faction, arme_1, arme_2, last_coup, nb_coup_j, nb_coup_aut, last_co, etat, date_etat 
        FROM table_perso WHERE nom = ?');
        $requete->execute(array($nom));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
    
        return $donnees;
    }

}

