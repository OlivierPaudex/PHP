<?php
try
{
	// Sous WAMP (Windows)
	$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
} 

$possesseur = "Patrick";
$prix_max = 10;

$sth = $bdd->prepare('SELECT nom
    FROM jeux_video
    WHERE possesseur = :possesseur AND prix = :prix_max');
$sth->execute(array(':possesseur' => $possesseur, ':prix_max' => $prix_max));


echo '<ul>';

while ($donnees = $sth->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}

echo '</ul>';

$sth->closeCursor();

?>