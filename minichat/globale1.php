<?php
	// On démarre la session AVANT d'écrire du code HTML
	if(session_status() == PHP_SESSION_NONE){session_start();}
	
	// Initialiser ou récupérer le paramètre selection de page
	if (!isset($_GET['selection_page']) || !isset($_SESSION['page']))
	{
		$_SESSION['page'] = 1;
	}
	else
	{
		if (is_numeric($_GET['selection_page']))
		{
			$_SESSION['page'] = $_GET['selection_page'];
		}
	}
	
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	// Récupération du nombre max de messages 
	$reponse = $bdd->query("SELECT count(*) AS articlemax FROM minichat");
	$donnees = $reponse->fetch();
	
	// Calcul du nombre max de pages
	$pagemax = (int)$donnees[articlemax] / 10;
	$page_modulo = $donnees[articlemax] % 10;
	if ($page_modulo != 0)
	{	
		$pagemax++;
	}
		
	// Test de dépassement
	if ($_SESSION['page'] > $pagemax) 
	{
		$_SESSION['page'] = $pagemax;
	}
	elseif ($_SESSION['page'] < 1) 
	{
		$_SESSION['page'] = 1;
	}
?>	
	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    
    <body>
		<p>Nous sommes sur la page : <?php echo $_SESSION['page'];?></p>
		
		<p>
		<?php
			for ($i = 1; $i <= $pagemax; $i++)
			{
				echo '<a href="https://www.fuyens.ch/minichat/globale1.php?selection_page=' . $i . '">' . $i . ' </a>';
			}
		?>
		</p>
	</body>
</html> 