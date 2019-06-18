<?php

class AboutManager extends BddManager {

    public static function selectAbout() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT content, lien_img
            FROM about
        ');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public static function updateAbout($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE about
            SET content=:content
        ");
        $req->execute(array(
            'content' => $data['content']         
        ));
    }

	public static function updatePathImg($path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE about 
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
            FROM about 
            ');
        $data = $req->fetch();
        return $data['lien_img'];        
    }    

}