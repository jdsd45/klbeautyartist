<?php

require 'BddManager.php';

class PrestationsManager extends BddManager {

/*     public static function selectCategories(){
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT DISTINCT categorie 
            FROM prestations
            ORDER BY categorie
        ');
        while($data = $req->fetch()) {
            $result[] = $data['categorie'];
        }   
        return $result;
    } */

    public static function selectPrestations() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, categorie, titre, prix, temps, lien_img, detail
            FROM prestations
            ORDER BY categorie
        ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectPrestation($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, categorie, titre, prix, temps, lien_img, detail
            FROM prestations 
            WHERE id = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees;        
    }

    public static function updatePrestation($id, $data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            UPDATE prestations
            SET titre=:titre, categorie=:categorie, prix=:prix, temps=:temps, detail=:detail
            WHERE id=:id
        ');
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
        $bdd = PersonnageManager::bddConnect();
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


    public static function getCategories() {
        $data = file_get_contents('static/categories.json');
        $data = json_decode($data);
        return $data;
    } 

}