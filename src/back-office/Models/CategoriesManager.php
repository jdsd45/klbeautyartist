<?php

require 'BddManager.php';

class CategoriesManager extends BddManager {

    public static function selectCategories() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, nom
            FROM prestations_categories
            ORDER BY id
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectCategorie($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom
            FROM prestations_categories 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;        
    }

    public static function updateCategorie($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            UPDATE prestations_categories
            SET nom=:nom
            WHERE id=:id
        ');
        $req->execute(array(
            'id'    => $id,
            'nom'   => $data['nom'],          
        ));
    }

    public static function deleteCategorie($id)
    {
        $bdd = parent::bddConnect();
        $requete = $bdd->prepare('DELETE FROM prestations_categories WHERE id = ?');
        $requete->execute(array($id));
    }

    public static function insertCategorie($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO prestations_categories (nom)
            VALUES(:nom)    
        ');
        $req->execute(array(
            'nom' => $data['nom'],
        ));
    }


}