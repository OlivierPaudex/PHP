<!DOCTYPE html>
<html>
<head>
	<title>mini chat</title>
</head>
	<style>
		form, p
		{
			text-align: center;
		}
	</style>
<body>
	<form action="minichat_post.php" method="post">
		<p>
			<label for="pseudo">pseudo</label><input type="text" name="pseudo" id="pseudo"/><br/>
			<label for="message">message</label><input type="text" name="message" id="message"/><br/>

			<input type="submit" value="Envoyer">
		</p>
	</form>
<?php 

try
{
	$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');	
	$reponse=$bdd->query('SELECT pseudo,message,date_message from minichat order by id desc limit 0,10');
}
catch(Exception $e)
{
	echo $e;
}

while($donnee=$reponse->fetch())
{
	echo'<p><strong>'. htmlspecialchars($donnee['pseudo']). '<strong>:' . htmlspecialchars($donnee['message']).' '. htmlspecialchars($donnee['date_message']).'</p>';
}
$reponse->closeCursor();
?>
</body>
</html>