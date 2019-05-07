<?php

require 'BddManager.php';

class MessageManager extends BddManager {

	public static function insertMessage(string $prenom, string $nom, string $email, string $telephone, string $message) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
			INSERT INTO messages (prenom, nom, email, telephone, message, date_message) 
			VALUES (:prenom, :nom, :email, :telephone, :message, NOW())');
		
		$req->execute(array(
			'prenom' => $prenom,
			'nom' => $nom,
			'email' => $email,
			'telephone' => $telephone,
			'message' => $message
		));
		
/* 		if ($req == true) {
			echo 'Votre message a bien été envoyé, je vous répondrai rapidement!';
			self::envoyerMail($nom, $email, $message);
		} else {
			echo 'Erreur dans l\'envoi du message';
		} */

		return $req;
	}

	public static function envoyerMail(string $nom, string $email, string $message) {
		try
		{
			$message = $nom . " a envoyé un message : " . $message;
			$message = str_replace("\n.", "\n..", $message);
			$message = wordwrap($message, 70, "\r\n");
			mail('jdsd@jdsd.fr', 'Message', $message);
		} 
		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

}


?>