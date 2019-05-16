<?php

class EventManager extends BddManager
{
    const CAT_ATTAQUE = "ATTAQUE";
    const CAT_MORT = "MORT";
    const CAT_CREATION = "CREATION_PERSO";

    public static function addEvent($categorie, $nom_perso_origin=null, $nom_perso_cible=null) 
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->prepare(
            'INSERT INTO historique(date_evt, categorie, nom_perso_origin, nom_perso_cible) 
            VALUES (NOW(), :categorie, :nom_perso_origin, :nom_perso_cible )');
        $requete->execute(array(
            'categorie' => $categorie,
            'nom_perso_origin' => $nom_perso_origin,
            'nom_perso_cible' => $nom_perso_cible
        ));
    }

    public static function getEvents()
    {
        $bdd = PersonnageManager::bddConnect();
        $requete = $bdd->query('SELECT * FROM historique ORDER BY date_evt DESC LIMIT 15');
        $historique = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $historique;
    }

}