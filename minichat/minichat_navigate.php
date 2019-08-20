<?php
	// On démarre la session AVANT d'écrire du code HTML
	if(session_status() == PHP_SESSION_NONE){session_start();}
	 
	//Test si le paramètre "navigation" existe
    if (isset($_GET['navigation']))
    {
		// Incrémente de 1
		if ($_GET['navigation'] == "apres")
		{
			if ($_SESSION['page'] < $_SESSION['pagemax'])
			{
			$_SESSION['page']++;
			}
		}
		else
		{
			// Décrémente de 1
			if ($_SESSION['page'] > 1)
			{
				$_SESSION['page']--;
			}
		}
        
		// Redirection du visiteur vers la page du minichat
		header('Location: https://www.fuyens.ch/minichat/minichat.php');
	}
?>

