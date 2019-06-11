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

    public static function albumNameNotExist($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT titre
            FROM portfolio_albums
            WHERE titre=:titre AND id!=:id
        ');
        $req->execute(array(
            'titre'   => $data['titre'],
            'id'      => $id
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

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE portfolio_albums 
            SET lien_img=:path
            WHERE id=:id
            ');
		
		$req->execute(array(
            'path' => $path,
            'id'   => $id
		));
    }

    public static function selectPathImg($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT lien_img
            FROM portfolio_albums 
            WHERE id=:id
            ');
        $req->execute(array(
            'id' => $id
        ));
        $data = $req->fetch();
        return $data['lien_img'];        
    }        

}
