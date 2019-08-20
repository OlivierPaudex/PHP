<?php
require('./controllers/frontend/controller.php');

try
{
	if (isset($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case "post":
				if (isset($_GET['id']) && $_GET['id'] > 0)
				{
					post();
				}
				else
				{
				throw new Exception('Erreur : aucun identifiant de billet envoyé');
				}
				break;
			case "addComment":
				if (isset($_GET['id']) && $_GET['id'] > 0)
				{
					if (!empty($_POST['author']) && !empty($_POST['comment']))
					{
						addComment($_GET['id'], $_POST['author'], $_POST['comment']);
					}
					else
					{
						throw new Exception('Erreur : tous les champs ne sont pas remplis !');
					}
				}
				else
				{
					throw new Exception('Erreur : aucun identifiant de billet envoyé');
				}
				break;
			case "modifyComment":
				if (isset($_GET['id']) && $_GET['id'] > 0)
				{
					modifyComment($_GET['id']);
				}
				else
				{
					throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
				}
				break;
			case "changeComment":
				if ((isset($_GET['id']) && $_GET['id'] > 0) & (isset($_GET['post']) && $_GET['post'] > 0))
				{
					if (!empty($_POST['comment']))
					{
						changeComment($_GET['id'], $_GET['post'], $_POST['comment']);
					}
					else
					{
						throw new Exception('Erreur : Le commentaire est vide !');
					}
				}
				else
				{
					throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
				}
				break;
		}
	}
	else
	{
		listPosts();
	}
}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
	require('./views/frontend/errorView.php');
}

