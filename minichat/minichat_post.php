<?php
	// On démarre la session AVANT d'écrire du code HTML
	if(session_status() == PHP_SESSION_NONE){session_start();}

	// Test si formulaire et champs existent
	if (isset($_POST['formulaire']) && !empty($_POST['pseudo']) && !empty($_POST['message']))
	{
		// Cookie de session
		$_SESSION['pseudo'] = $_POST['pseudo'];

		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		// Insertion du message à l'aide d'une requête préparée, la date s'insère automatiquement
		$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
		$req->execute(array(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['message'])));
	}

	// Redirection du visiteur vers la page du minichat
	header('Location: https://www.fuyens.ch/minichat/minichat.php');
?>