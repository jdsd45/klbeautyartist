<?php

class PortfolioManager extends BddManager {

    public static function selectPhotos() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT p.id, p.titre, p.mots_cles, p.lien_img, p.en_ligne, album.titre AS album
            FROM portfolio_photos p
            LEFT JOIN portfolio_albums album
            ON album.id = p.fk_album
            ORDER BY album
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectPhoto($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
        SELECT p.id, p.titre, p.mots_cles, p.lien_img, p.en_ligne, album.titre AS album
            FROM portfolio_photos p
            LEFT JOIN portfolio_albums album
            ON album.id = p.fk_album            
            WHERE p.id = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees;        
    }

    public static function updatePhoto($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE portfolio_photos
            SET titre=:titre, 
                fk_album=(SELECT id FROM portfolio_albums WHERE id=:album), 
                mots_cles=:mots_cles,
                en_ligne=:en_ligne
            WHERE id=:id
        ");
        $req->execute(array(
            'id'        => $id,
            'album'     => $data['album'],
            'titre'     => $data['titre'],
            'mots_cles' => $data['mots_cles'],
            'en_ligne'  => $data['en_ligne']
        ));
    }

    public static function deletePhoto($id)
    {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('DELETE FROM portfolio_photos WHERE id = ?');
        $req->execute(array($id));
    }

    public static function insertPhoto($data, $path) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO portfolio_photos(fk_album, titre, mots_cles, lien_img, en_ligne)
            VALUES(:album, :titre, :mots_cles, :lien_img, :en_ligne)    
        ');
        $req->execute(array(
            'album'     => $data['album'],
            'titre'     => $data['titre'],
            'mots_cles' => $data['mots_cles'],
            'lien_img'  => $path,
            'en_ligne'  => $data['en_ligne']
        ));
    }

    public static function selectIdLastPhoto() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id
            FROM portfolio_photos
            ORDER BY id DESC LIMIT 0, 1
        ');
        $data = $req->fetch();
        return $data['id'];
    }

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE portfolio_photos 
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
            FROM portfolio_photos 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data['lien_img'];        
    }    

}