<?php
try
{
	// Sous WAMP (Windows)
	$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$nom = "Assasin's Creed Origins";
$possesseur = "Olivier";
$console = "PS4";
$prix = "60";
$nbre_joueurs_max = 1;
$commentaires = "Plus de 100 heures de jeux";


$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));

echo 'Le jeu a bien été ajouté !';
?>