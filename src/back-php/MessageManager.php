<?php

class MessageManager extends BddManager {

	public static function insertMessage(string $nom, string $email, string $message) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
			INSERT INTO table_messages (nom, email, message, date_message) 
			VALUES (:nom, :email, :message, NOW())');
		
		$req->execute(array(
			'nom' => $nom,
			'email' => $email,
			'message' => $message
		));
		
		if ($req == true) {
			echo 'Votre message a bien été envoyé, je vous répondrai rapidement!';
			self::envoyerMail($nom, $email, $message);
		} else {
			echo 'Erreur dans l\'envoi du message';
		}
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