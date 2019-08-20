<?php

require('controller/frontend.php');

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPosts')
		{
			listPosts();
		}

		else if($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				post();
			}

			else
			{
				throw new Exception( 'Aucun identifiant de billet envoyé');
			}
		}

		else if($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				post();
			}

			else
			{
				throw new Exception( 'Aucun identifiant de billet envoyé');
			}
		}

		else if($_GET['action'] == 'addComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				if(!empty($_POST['author']) && !empty($_POST['comment']))
				{
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}

				else
				{
					throw new Exception ('Tous les champs ne sont pas remplis.');
				}
			}

			else
			{
				throw new Exception ('Aucun identifiant de billet envoyé');
			}		
		}

		else if($_GET['action'] == 'getComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				getComment($_GET['id']);
			}

			else
			{
				throw new Exception ('Aucun identifiant de commentaire envoyé');
			}
		}

		else if($_GET['action'] == 'editionComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idPost']))
			{
				if(isset($_POST['new_comment']))
				{
					// permet de rétablir le fuseau horaire de Paris (heure d'été)
					date_default_timezone_set('Europe/Paris');
					$current_date = date("Y-m-d H:i:s");

					editionComment($_POST['new_comment'], $current_date);
				}

				else
				{
					throw new Exception ('Le champ n\'a pas été rempli.');
				}
			}

			else
			{
				throw new Exception ('Aucun identifiant de commentaire envoyé');
			}
		}
	}

	else
	{
		listPosts();
	}
}

catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
