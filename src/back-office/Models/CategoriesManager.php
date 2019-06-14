<?php

class CategoriesManager extends BddManager {

    public static function selectCategories() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, titre, url, lien_img
            FROM prestations_categories
            ORDER BY titre
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectCategorie($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, titre, url, lien_img
            FROM prestations_categories 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;        
    }

    public static function insertCategorie($data, $path) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO prestations_categories (titre, url, lien_img)
            VALUES(:titre, :url, :lien_img)    
        ');
        $req->execute(array(
            'titre' => $data['titre'],
            'url' => Regex::transformInUrl($data['titre']),
            'lien_img'  => $path
        ));
    }    

    public static function updateCategorie($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE prestations_categories
            SET titre=:titre, url=:url
            WHERE id=:id AND titre != 'Autre'
            ");
        $req->execute(array(
            'id'    => $id,
            'titre'   => $data['titre'],     
            'url'   => Regex::transformInUrl($data['titre'])
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
                WHERE titre='Autre'
            )
            WHERE fk_categorie =:idCatDelete
        ");
        $req->execute(array(
            'idCatDelete' => $id
        ));
        
        $req = $bdd->prepare("DELETE FROM prestations_categories WHERE id = ? AND titre != 'Autre'");
        $req->execute(array($id));
    }

    public static function categorieNameNotExist($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT titre
            FROM prestations_categories
            WHERE titre=:titre AND id!=:id
        ');
        $req->execute(array(
            'id'    => $id,
            'titre'   => $data['titre']
        ));
        if($req->fetch()) {
            return false;
        } 
        return true;
    }    

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE prestations_categories 
            SET lien_img=:path
            WHERE id=:id');
		
		$req->execute(array(
            'id'   => $id,
			'path' => $path
		));
    }

    public static function selectPathImg($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT lien_img
            FROM prestations_categories 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data['lien_img'];        
    }     

}