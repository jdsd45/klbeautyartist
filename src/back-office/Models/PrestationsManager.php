<?php

class PrestationsManager {

    public static function getPrestations() {
        $data = file_get_contents('static/prestations.json');
        $data = json_decode($data);
        return $data;
    }

    public static function getPrestation($id) {
        $data = self::getPrestations();
        return $data[$id-1];
    }

    public static function getCategories() {
        $data = file_get_contents('static/categories.json');
        $data = json_decode($data);
        return $data;
    }


/*     public static function getPrestations() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, nom, prenom, email, telephone, date_message, message, date_suppression 
            FROM messages 
            WHERE date_suppression IS NULL
            ORDER BY date_message 
            ');
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    } */

/*     public static function getMessagesSupprimes() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, nom, prenom, email, telephone, date_message, message
            FROM messages 
            WHERE date_suppression IS NOT NULL
            ORDER BY date_message');
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function getMessage($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom, prenom, email, telephone, date_message, message, date_suppression 
            FROM messages 
            WHERE id = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function setSuppressionMessage($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            UPDATE messages
            SET date_suppression =
                (CASE
                    WHEN date_suppression IS NULL THEN NOW()
                    ELSE NULL
                END)
            WHERE id = ?');
        $req->execute(array($id));
    }

    public static function supprimerMessages() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            DELETE FROM messages 
            WHERE (date_suppression IS NOT NULL) AND (DATEDIFF(NOW(), date_suppression) >= 30)');
    } */

}