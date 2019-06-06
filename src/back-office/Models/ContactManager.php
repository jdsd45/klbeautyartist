<?php

class ContactManager extends BddManager {

    public static function selectContact() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT content_1, content_2, lien_img
            FROM contact
        ');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public static function updateContact($data) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare("
            UPDATE contact
            SET content_1=:content_1, content_2=:content_2
        ");
        $req->execute(array(
            'content_1' => $data['content_1'],         
            'content_2' => $data['content_2'],         
        ));
    }

	public static function updatePathImg($path) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
            UPDATE contact 
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
            FROM contact 
            ');
        $data = $req->fetch();
        return $data['lien_img'];        
    }    

}