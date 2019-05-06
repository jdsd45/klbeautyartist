<?php

class MessageManager extends BddManager {

	public static function insertCompetence(Competence $competence) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
			INSERT INTO table_competences (ref_comp, designation, detail, categorie, ordre, type_action) 
			VALUES (:ref_comp, :designation, :detail, :categorie, :ordre, type_action=:type_action)');
		
		$req->execute(array(
			'ref_comp'      => $competence->getRef_comp,
			'designation'   => $competence->getDesignation,
            'detail'        => $competence->getDetail,
            'categorie'     => $competence->getCategorie,
            'ordre'         => $competence->getOrdre,
            'type_action'   => $competence->getType_action
		));
		
		if ($req) {
			echo 'Compétence ajoutée en base de données!';
		} else {
			throw new Exception('L\'insertion en base de données ne s\'est pas effectuée correctement.');
		}
    }
    
	public static function modifierCompetence(Competence $competence) {
		$bdd = parent::bddConnect();
        $req = $bdd->prepare('
        UPDATE table_competences 
        SET ref_comp=:ref_comp, designation=:designation, detail=:detail, categorie=:categorie, ordre=:ordre, action=:action 
        WHERE id=:id');
		
		$req->execute(array(
			'id'            => $competence->getId,
			'ref_comp'      => $competence->getRef_comp,
			'designation'   => $competence->getDesignation,
            'detail'        => $competence->getDetail,
            'categorie'     => $competence->getCategorie,
            'ordre'         => $competence->getOrdre,
            'type_action'   => $competence->getType_action
		));
		
		if ($req) {
			echo 'Compétence ajoutée en base de données!';
		} else {
			throw new Exception('La modification en base de données ne s\'est pas effectuée correctement.');
		}
    }

    public static function supprimerCompetence(Competence $competence) {
        $id_comp = $competence->getId();
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('DELETE FROM table_competences WHERE id = ?');
        $req->bindValue(1, $competence->getId());
        $req->execute();
		if ($req) {
			echo 'La compétence n°'.$id_comp.' a bien été supprimée de la base de données.';
		} else {
			throw new Exception('La suppression en base de données ne s\'est pas effectuée correctement.');
		}        
    }
    
	public static function getCompetence(int $id) : Competence {
		$bdd = parent::bddConnect();
        $req = $bdd->prepare('SELECT id, ref_comp, designation, detail, categorie, ordre, action action FROM table_competences WHERE id = ?');
		
		$req->execute(array(
			'id'            => $competence->getId,
			'ref_comp'      => $competence->getRef_comp,
			'designation'   => $competence->getDesignation,
            'detail'        => $competence->getDetail,
            'categorie'     => $competence->getCategorie,
            'ordre'         => $competence->getOrdre,
            'type_action'   => $competence->getType_action
        ));
        
        $req->bindValue(1, $id);
        $req->execute();
		
		if ($req) {
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $competence = new Competence($donnees);
            return $competence;        
		} else {
			throw new Exception('La récupération de la compétence ne s\'est pas effectée correctement');
		}
    }
    
    public static function getCompetencesDetails(): array {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('SELECT id, ref_comp, designation, detail, categorie, ordre, type_action FROM table_competences ORDER BY ref_comp');
        $req->execute();

		if ($req) {
            $competences = $req->fetchAll(PDO::FETCH_ASSOC);        
            return $competences;
		} else {
			throw new Exception('La récupération des compétences (avec Details) ne s\'est pas effectée correctement');
		}        
    }  

    public static function getCompetences(): array {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('SELECT id, ref_comp, designation, categorie, ordre, type_action FROM table_competences ORDER BY ref_comp');
        $competences = $req->fetchAll(PDO::FETCH_ASSOC);        
        $req->execute();

		if ($req) {
            $competences = $req->fetchAll(PDO::FETCH_ASSOC);        
            return $competences;
		} else {
			throw new Exception('La récupération des compétences (avec Details) ne s\'est pas effectée correctement');
		} 
    }    



}


?>