<?php

require 'BddManager.php';

class ContentManager extends BddManager {

    public static function getPrestations() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, categorie, titre, prix, temps, lien_img, detail
            FROM prestations 
            ORDER BY categorie
            ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }    
}


//header("Access-Control-Allow-Origin: *");

/* $request = $_GET['q'];

$file = file_get_contents('../static/' . $request . '.json');

echo $file; */

