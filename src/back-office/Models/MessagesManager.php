<?php

class MessagesManager {

    public static function getMessages() {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom, email, telephone, date_message, message 
            FROM messages 
            ORDER BY date_message WHERE date_suppression = null');
        $req->execute();
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function getMessagesSupprimes() {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom, email, telephone, date_message, message 
            FROM messages 
            ORDER BY date_message WHERE date_suppression NOT null');
        $req->execute();
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public static function getMessage($id) {
        $bdd = parent::bddConnect();
        $req = $bdd->prepare('
            SELECT id, nom, email, telephone, date_message, message 
            FROM messages 
            WHERE id = ?');
        $req->execute(array($id));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

}