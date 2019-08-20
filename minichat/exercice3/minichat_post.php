<?php
session_start();
require('config.php'); // appelle le fichier de config de la bdd

$_SESSION['pseudoretenu'] = $_POST['pseudo'];

// insère le message en bdd et retourne un message de succès ou d'échec
if (!empty($_POST['pseudo']) && !empty($_POST['message']))
{
	$insertionbdd = $bdd->prepare("INSERT INTO messages VALUES ('0', :pseudo, :message, NOW())");
	$insertionbdd->execute(array(
		'pseudo' => $_POST['pseudo'],
		'message' => $_POST['message']
		));
		header('Location: minichat.php?return=success');
}
else
{
	header('Location: minichat.php?return=error');
}
?>