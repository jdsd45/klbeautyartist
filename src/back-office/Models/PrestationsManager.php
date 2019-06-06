<?php

class PrestationsManager extends BddManager {

    public static function selectPrestations() {
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

    public static function selectPrestation($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT p.id, p.titre, p.prix, p.temps, p.lien_img, p.detail, cat.nom AS categorie
            FROM prestations p
            LEFT JOIN prestations_categories cat
            ON cat.id = p.fk_categorie            
            WHERE p.id = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees;        
    }

    public static function insertPrestation($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO prestations(fk_categorie, titre, prix, temps, detail)
            VALUES(:categorie, :titre, :prix, :temps, :detail)    
        ');
        $req->execute(array(
            'categorie' => $data['categorie'],
            'titre'     => $data['titre'],
            'prix'      => $data['prix'],
            'temps'     => $data['temps'],
            'detail'    => $data['detail']
        ));
    }    

    public static function updatePrestation($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE prestations
            SET titre=:titre, 
                fk_categorie=(SELECT id FROM prestations_categories WHERE id=:categorie), 
                prix=:prix, 
                temps=:temps, 
                detail=:detail
            WHERE id=:id
        ");
        $req->execute(array(
            'id'        => $id,
            'categorie' => $data['categorie'],
            'titre'     => $data['titre'],
            'prix'      => $data['prix'],
            'temps'     => $data['temps'],
            'detail'    => $data['detail']            
        ));
    }

    public static function deletePrestation($id)
    {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('DELETE FROM prestations WHERE id = ?');
        $req->execute(array($id));
    }


    public static function selectIdLastPrestation() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id
            FROM prestations
            ORDER BY id DESC LIMIT 0, 1
        ');
        $data = $req->fetch();
        return $data['id'];
    }

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE prestations 
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
            FROM prestations 
            WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data['lien_img'];        
    }    

}