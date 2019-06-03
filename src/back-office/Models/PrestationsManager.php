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

    public static function updatePrestation($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE prestations
            SET titre=:titre, 
                fk_categorie=(SELECT id FROM prestations_categories WHERE nom=:categorie), 
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
        $requete = $bdd->prepare('DELETE FROM prestations WHERE id = ?');
        $requete->execute(array($id));
    }

    public static function insertPrestation($data, $path) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            INSERT INTO prestations(categorie, titre, prix, temps, lien_img, detail)
            VALUES(:categorie, :titre, :prix, :temps, :lien_img, :detail)    
        ');
        $req->execute(array(
            'categorie' => $data['categorie'],
            'titre'     => $data['titre'],
            'prix'      => $data['prix'],
            'temps'     => $data['temps'],
            'lien_img'  => $path,
            'detail'    => $data['detail']
        ));
    }

	public static function updatePathImg($id, $path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE prestations 
            SET lien_img=:path
            WHERE id=:id');
		
		$req->execute(array(
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