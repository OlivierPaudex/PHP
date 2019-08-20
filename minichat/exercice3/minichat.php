<?php
session_start();
require('config.php'); // appelle le fichier de config de la bdd
?>
<!DOCTYPE html>

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>
	<title>Minichat</title>
</head>

<body>

<form action="minichat_post.php" method="post">
	<p style="text-align:center;">
		Pseudo : <input type="text" id="pseudo" name="pseudo" value="<?php if (!empty($_SESSION['pseudoretenu'])) { echo htmlspecialchars(($_SESSION['pseudoretenu'])); } else { } ?>">
		Message : <input type="text" id="message" name="message" />
		<input type="submit" value="Valider" />
	</p>
</form>

<?php
	
// retourne une notification sur l'échec ou la réussite d'envoi du message
$return = isset($_GET['return']) ? $_GET['return'] : NULL;
if	($return == 'success')
{
	echo("<p style=\"text-align:center;\">Le message a bien été posté.</p>");
}
elseif ($return == 'error')
{
	echo("<p style=\"text-align:center;\">ERREUR : Vous devez indiquer un pseudo et un message.</p>");
}

// ?return=clearsession permet de détruire les informations de session
elseif ($return == 'clearsession')
{
	session_destroy();
	echo("<p style=\"text-align:center;\">Les informations de session ont bien été détruites.</p>");
}
else
{
}
?>
<br />
<br />

<?php
/// on affiche les messages
$contentmessages = $bdd->query('SELECT id, pseudo, message, DATE_FORMAT(date_ajout, \'%d/%m/%Y %h:%i:%s\') AS date_ajout_formattee FROM messages ORDER BY date_ajout DESC, id DESC LIMIT 0, 10');

while ($chatinfo = $contentmessages->fetch())
{
	?>
	<p>
<strong><i>[<?php echo($chatinfo['date_ajout_formattee']); ?>]</i> <?php echo htmlspecialchars($chatinfo['pseudo']); ?></strong> - <?php echo htmlspecialchars($chatinfo['message']); ?>
	</p>
	<?php
}
$contentmessages->closeCursor();
?>
</p>
</body>