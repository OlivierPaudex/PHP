<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Membres</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
	
		<form id="formulaire" name="formulaire" action="login.php" method="post">
			<p>
			<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo'];?>" /><br />
			<label for="password">Mot de passe</label> :  <input type="password" name="password" id="password" /><br />
			<label for="retype_password">Retapez votre mot de passe</label> :  <input type="password" name="retype_password" id="retype_password" /><br />
			<label for="email">Adresse email</label> :  <input type="email" name="email" id="email" /><br />
			<input type="submit" value="Envoyer" name="formulaire" />
			</p>
		</form>
		
		<form id="formulaire2" name="formulaire2" action="login2.php" method="post">
			<p>
			<label for="pseudo2">Pseudo</label> : <input type="text" name="pseudo2" id="pseudo2" value="<?php echo $_SESSION['pseudo'];?>" /><br />
			<label for="password2">Mot de passe</label> :  <input type="password" name="password2" id="password2" /><br />
			<label for="check_login">Connexion automatique</label> :  <input type="checkbox" name="check1" id="check1" /><br />
			<input type="submit" value="Connecter" name="formulaire2" />
			</p>
		</form>
	</body>
</html>

<?php
	$return_password = isset($_GET['return_password']) ? $_GET['return_password'] : NULL;
	if ($return_password)
	{
		$message = "Mot de passe ne correspond pas";
		echo "<script>alert('$message');</script>";
	}
	
	$return_pseudo = isset($_GET['return_pseudo']) ? $_GET['return_pseudo'] : NULL;
	if ($return_pseudo)
	{
		$message = "Login existe déjà";
		echo "<script>alert('$message');</script>";
	}
	
	$return_login = isset($_GET['return_login']) ? $_GET['return_login'] : NULL;
	if ($return_login)
	{
		$message = "OK";
		echo "<script>alert('$message');</script>";
	}
	
	$return_connected = isset($_GET['return_connected']) ? $_GET['return_connected'] : NULL;
	if ($return_connected)
	{
		$message = "Vous êtes connecté";
		echo "<script>alert('$message');</script>";
	}
?>

