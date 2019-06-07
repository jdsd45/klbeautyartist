<?php

class PortfolioAlbumsManager extends BddManager {

    public static function selectAlbums() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, titre, url, mots_cles, lien_img
            FROM portfolio_albums
            ORDER BY titre
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function albumNameNotExist($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT titre
            FROM portfolio_albums
            WHERE titre=:titre
        ');
        $req->execute(array(
            'titre'   => $data['titre']
        ));
        if($req->fetch()) {
            return false;
        } 
        return true;
    }

    public static function updateAlbum($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE portfolio_albums
            SET titre=:titre, url=:url
            WHERE id=:id
        ");
        $req->execute(array(
            'id' => $id,
            'titre' => $data['titre'],
            'url' => Regex::transformInUrl($data['titre'])
        ));
    }

	public static function updatePathImg($path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE portfolio_albums 
            SET lien_img=:path
            ');
		
		$req->execute(array(
			'path' => $path
		));
    }

    public static function selectPathImg() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT lien_img
            FROM portfolio_albums 
            ');
        $data = $req->fetch();
        return $data['lien_img'];        
    }        

    /*

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
        $req = $bdd->prepare("
            UPDATE prestations_categories
            SET nom=:nom
            WHERE id=:id AND nom != 'Autre'
            ");
        $req->execute(array(
            'id'    => $id,
            'nom'   => $data['nom'],          
        ));
    }

    public static function deleteCategorie($id)
    {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("DELETE FROM prestations_categories WHERE id = ? AND nom != 'Autre'");
        $req->execute(array($id));
        $req->closeCursor();

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
        $req->closeCursor();    

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
    } */


}