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
		if (htmlspecialchars(is_numeric($_GET['selection_page'])))
		{
			$_SESSION['page'] = htmlspecialchars($_GET['selection_page']);
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
	$reponse->closeCursor();
	
	// Calcul du nombre max de pages
	$pagemax = (int)($donnees[articlemax] / 10);
	$page_modulo = $donnees[articlemax] % 10;
	
	// Ajouter une page si nécessaire
	if ($pagemax == 0 || $page_modulo != 0) {$pagemax++;}
	
	// Test de dépassement (si l'utilisateur modifie l'URL)
	if ($_SESSION['page'] > $pagemax) 
	{
		$_SESSION['page'] = $pagemax;
	}
	elseif ($_SESSION['page'] < 1) 
	{
		$_SESSION['page'] = 1;
	}
	
	// Calcul de l'offset de la page
	$offset = 10 * ($_SESSION['page'] - 1);	
?>	
	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
		<!-- Ajout du name formulaire, Ajout du cookie "SESSION" -->
		<form id="formulaire" name="formulaire" action="minichat_post.php" method="post">
			<p>
			<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo'];?>" /><br />
			<label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
			<input type="submit" value="Envoyer" name="formulaire" />
			</p>
			
			<!-- Afficher le sélectionneur de page -->
			<p>
			<?php
				for ($i = 1; $i <= $pagemax; $i++)
				{
					echo '<a href="https://www.fuyens.ch/minichat/minichat.php?selection_page=' . htmlspecialchars($i) . '">' . htmlspecialchars($i) . ' </a>';
				}
			?>
			</p>
			
		</form>
		
		<?php
			// Récupération de 10 messages selon l'offset de la page
			$reponse = $bdd->query("SELECT pseudo, message, DATE_FORMAT(`date_message`,'%d/%m/%Y %H:%i:%s') as date_formatee FROM minichat ORDER BY ID DESC LIMIT $offset, 10");
			
			// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
			while ($donnees = $reponse->fetch())
			{
				echo '<p><strong>' . htmlspecialchars($donnees['date_formatee']) . ' : ' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
			}

			$reponse->closeCursor();
		?>
    </body>
</html>