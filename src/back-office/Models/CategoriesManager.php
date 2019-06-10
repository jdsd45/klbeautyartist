<?php

class CategoriesManager extends BddManager {

    public static function selectCategories() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, nom, url
            FROM prestations_categories
            ORDER BY nom
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectCategorie($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom, url
            FROM prestations_categories 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;        
    }

    public static function insertCategorie($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO prestations_categories (nom, url)
            VALUES(:nom, :url)    
        ');
        $req->execute(array(
            'nom' => $data['nom'],
            'url' => Regex::transformInUrl($data['nom'])
        ));
    }    

    public static function updateCategorie($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE prestations_categories
            SET nom=:nom, url=:url
            WHERE id=:id AND nom != 'Autre'
            ");
        $req->execute(array(
            'id'    => $id,
            'nom'   => $data['nom'],     
            'url'   => Regex::transformInUrl($data['nom'])
        ));
    }

    public static function deleteCategorie($id)
    {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE prestations
            SET fk_categorie=(
                SELECT id
                FROM prestations_categories
                WHERE nom='Autre'
            )
            WHERE fk_categorie =:idCatDelete
        ");
        $req->execute(array(
            'idCatDelete' => $id
        ));
        
        $req = $bdd->prepare("DELETE FROM prestations_categories WHERE id = ? AND nom != 'Autre'");
        $req->execute(array($id));



    }

    public static function categerieNameNotExist($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT nom
            FROM prestations_categories
            WHERE nom=:nom AND id!=:id
        ');
        $req->execute(array(
            'id'    => $id,
            'nom'   => $data['nom']
        ));
        if($req->fetch()) {
            return false;
        } 
        return true;
    }    


}