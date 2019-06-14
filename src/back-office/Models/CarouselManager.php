<?php

class CarouselManager extends BddManager {

    public static function selectPhotos() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, titre, lien_img
            FROM carousel
            ORDER BY titre
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectPhoto($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, titre, lien_img
            FROM carousel 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;        
    }

    public static function insertPhoto($data, $path) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO carousel (titre, lien_img)
            VALUES(:titre, :lien_img)    
        ');
        $req->execute(array(
            'titre' => $data['titre'],
            'lien_img'  => $path
        ));
    }    

    public static function updatePhoto($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE carousel
            SET titre=:titre
            WHERE id=:id
            ");
        $req->execute(array(
            'id'    => $id,
            'titre'   => $data['titre']     
        ));
    }

    public static function deletePhoto($id)
    {
        $bdd = parent::bddConnect();        
        $req = $bdd->prepare("DELETE FROM carousel WHERE id = ?");
        $req->execute(array($id));
    }  

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE carousel 
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
            FROM carousel 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data['lien_img'];        
    }     

}