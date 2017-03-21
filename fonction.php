<?php
include('parametres.php');

function AjoutZero($string){
	$constant = $string;
	if(strlen($string)<5){	
		$string = '0'.$string;
		for($i=strlen($constant);$i<4;$i++){
			$string = '0'.$string;
		}
	}
	return $string;
}

function MdpOublie($mail){
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	$characts = 'abcdefghijklmnopqrstuvwxyz';
    $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts .= '1234567890'; 
	$mdpcree = ''; 

	for($i=0;$i < 6;$i++)//6 est le nombre de caractères
	{ 
        $mdpcree .= substr($characts,rand()%(strlen($characts)),1); 
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br/>Voici votre nouveau mdp généré automatiquement :<br/>";
	$message_html = $message_html.$mdpcree;
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Votre nouveau mot de passe";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: <contact.belletable@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	
	mail($mail,$sujet,$message,$header);
	return $mdpcree;
}

function Contact($mail,$numero,$message,$nom){
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", "saillyaxelle@hotmail.fr")) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br/>Voici le message de Mr/Mme ";
	$message_html = $message_html.$nom."<br/> Email : ".$mail."<br/>Numero : ".$numero."<br/>Message : ".$message."</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Nouveau Message";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: ".$mail."".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	
	$mailenvoi = "contact.belletable@gmail.com";
	mail($mailenvoi,$sujet,$message,$header);
}

function EnvoiMailCommande($email,$numcommande,$totalcom,$datecom){
	
	$ladatecommande = date("d/m/Y", strtotime($datecom));
	
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br/>
	Nous vous confirmons votre commande du ".$ladatecommande."<br/>
	Numéro : ".$numcommande."<br/>
	Montant TTC : ".$totalcom."€<br/>
	Pour consulter le détail cliquer sur le lien suivant : <br/>
	<a href=\"http://127.0.0.1/projects/belletable/detailcommande.php?idcommande=".$numcommande."\">Ma commande</a>
	</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Votre commande";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: contact.belletable@gmail.com".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	
	mail($email,$sujet,$message,$header);
}

function EnvoiMailReducCommande($email,$reduc,$montant){
	
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br/>
	Grâce à vos ".$montant." commmandes,<br/>
	Vous bénéficiez d'un code de réduction de ".$montant."€ :<br/>
	".$reduc."
	</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Code de réduction";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: contact.belletable@gmail.com".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	
	mail($email,$sujet,$message,$header);
}

function EnvoiMailReducPeriode($email,$reduc,$occasion,$montant){
	
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br/>
	A l'occasion ".$occasion.", BelleTable vous offre une réduction de ".$montant."% sur votre commande.<br/>
	Code de réduction :<br/>
	".$reduc."
	</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Code de réduction";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: contact.belletable@gmail.com".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	
	mail($email,$sujet,$message,$header);
}

?>
