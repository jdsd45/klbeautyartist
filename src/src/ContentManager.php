<?php

require 'BddManager.php';

class ContentManager extends BddManager {

    public static function getPhotosCarousel() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, titre, lien_img
            FROM carousel
            ORDER BY titre
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }    

    public static function getPrestations() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT p.id, p.titre, p.prix, p.temps, p.lien_img, p.detail, cat.titre AS categorie
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
            SELECT id, titre, url, lien_img
            FROM prestations_categories
            WHERE titre!='Autre'
            ORDER BY titre
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

    public static function getContact() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT content_1, content_2, lien_img
            FROM contact
        ');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }    

    public static function getPhotosPortfolio() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT p.id, p.titre, p.mots_cles, p.lien_img, p.en_ligne, album.url AS album, album.titre AS albumTitre
            FROM portfolio_photos p
            LEFT JOIN portfolio_albums album
            ON album.id = p.fk_album
            ORDER BY album
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }   
    
    public static function getAlbumsPortfolio() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, titre, url, mots_cles, lien_img
            FROM portfolio_albums
            ORDER BY titre
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;        
    }

}



