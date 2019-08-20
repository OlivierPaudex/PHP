<?php 
	// Test si formulaire et champs existent
	if (isset($_POST['formulaire']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['retype_password']) && !empty($_POST['email']))
	{
		// Mot de passe identique
		if ($_POST['password'] != $_POST['retype_password'])
		{
			// Redirection du visiteur vers la page du minichat
			header('Location: https://www.fuyens.ch/membres/membres.php?return_password=true');
			exit;
		}

		// Hachage du mot de passe
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
		// Recherche du pseudo en double
		$req = $bdd->prepare('SELECT COUNT(DISTINCT pseudo) AS pseudo_existant FROM membres WHERE pseudo = ?');
		$req->execute(array(htmlspecialchars($_POST['pseudo'])));
		$donnees = $req->fetch();

		if($donnees[pseudo_existant])
		{
			// Redirection du visiteur vers la page du minichat
			header('Location: https://www.fuyens.ch/membres/membres.php?return_pseudo=true');
			exit;
		}
		
		// Insertion
		$req = $bdd->prepare('INSERT INTO membres(pseudo, password, email) VALUES(?, ?, ?)');
		$req->execute(array(htmlspecialchars($_POST['pseudo']), htmlspecialchars($pass_hache), htmlspecialchars($_POST['email'])));
		
		// Redirection du visiteur vers la page du minichat
		header('Location: https://www.fuyens.ch/membres/membres.php?return_login=true');
		exit;
	}
?>