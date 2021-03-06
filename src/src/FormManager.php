<?php

require 'BddManager.php';

class FormManager extends BddManager {

	public static function insertMessage($data) {
		$bdd = parent::bddConnect();
		$req = $bdd->prepare('
			INSERT INTO messages (prenom, nom, email, telephone, message, date_message) 
			VALUES (:prenom, :nom, :email, :telephone, :message, NOW())');
		
		$req->execute(array(
			'prenom' => $data->prenom,
			'nom' => $data->nom,
			'email' => $data->email,
			'telephone' => $data->telephone,
			'message' => $data->message
		));
		
/*  		if ($req == true) {
			echo 'Votre message a bien été envoyé, je vous répondrai rapidement!';
			self::envoyerMail($nom, $email, $message);
		} else {
			echo 'Erreur dans l\'envoi du message';
		}  */

		return $req;
	}

/*  	public static function envoyerMail(string $nom, string $email, string $message) {
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
	}  */

}
