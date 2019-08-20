<?php

// Création du cookie mémorisant le pseudo de l'utilisateur

setcookie('pseudo', $_POST['pseudo'], time() + 365*24*36000, null, null, false, true); 

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Requête préparée

$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>