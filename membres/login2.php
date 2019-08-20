<?php 
	// Test si formulaire et champs existent
	if (isset($_POST['formulaire2']) && !empty($_POST['pseudo2']) && !empty($_POST['password2']))
	{
		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
		//  Récupération de l'utilisateur et de son pass hashé
		$req = $bdd->prepare('SELECT ID, password FROM membres WHERE pseudo = ?');
		$req->execute(array(htmlspecialchars($_POST['pseudo2'])));
		$donnees = $req->fetch();

		// Comparaison du password envoyé via le formulaire avec la base
		$isPasswordCorrect = password_verify($_POST['password2'], $donnees['password']);

		if ($isPasswordCorrect)
		{
			session_start();
			$_SESSION['id'] = $donnees['ID'];
			$_SESSION['pseudo'] = $_POST['pseudo2'];
			
			// Redirection du visiteur vers la page du minichat
			header('Location: https://www.fuyens.ch/membres/membres.php?return_connected=true');
			exit;
		}
		else
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
?>