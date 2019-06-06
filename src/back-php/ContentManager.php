<?php

require 'BddManager.php';

class ContentManager extends BddManager {

    public static function getPrestations() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT p.id, p.titre, p.prix, p.temps, p.lien_img, p.detail, cat.nom AS categorie
            FROM prestations p
            LEFT JOIN prestations_categories cat
            ON cat.id = p.fk_categorie
            ORDER BY categorie
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;        
    }    

    public static function getCategories() {
        $bdd = parent::bddConnect();
        $req = $bdd->query("
            SELECT id, nom, url
            FROM prestations_categories
            WHERE nom!='Autre'
            ORDER BY nom
        ");
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function getAbout() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT content, lien_img
            FROM about
        ');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }    

}



