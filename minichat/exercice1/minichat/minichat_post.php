<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
try
{
	$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
	$req=$bdd->prepare('INSERT into minichat (pseudo, message,date_message) values(?,?,?)');
	$req->execute(array($_POST['pseudo'], $_POST['message'], date("Y/m/d H:i:s")));
}
catch(Exception $e)
{
	echo $e;
}


header('location:minichat.php');
?>
</body>
</html>