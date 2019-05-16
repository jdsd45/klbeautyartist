<?php

require 'BddManager.php';

class MessagesManager extends BddManager {

    public static function getMessages() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            SELECT id, nom, prenom, email, telephone, date_message, message 
            FROM messages 
            WHERE date_suppression IS NULL
            ORDER BY date_message 
            ');
            //WHERE date_suppression IS null
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function getMessagesSupprimes() {
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
            SELECT id, nom, prenom, email, telephone, date_message, message 
            FROM messages 
            WHERE id = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function progSuppressionMessage($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            UPDATE messages
            SET date_suppression = NOW() 
            WHERE id = ?');
        $req->execute(array($id));
    }

    public static function supprimerMessages() {
        $bdd = parent::bddConnect();
        $req = $bdd->query('
            DELETE FROM messages 
            WHERE (date_suppression NOT null) AND (DATEDIFF(day, NOW(), date_suppression) >= 30)');
    }

}