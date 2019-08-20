<?php
namespace Fuyens\MVC;

require_once('./models/frontend/Manager.php');

class PostManager Extends Manager
{
	public function getPosts()
	{
		$bdd = $this->dbConnect();

		$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		return $req;
	}

	public function getPost($postID)
	{
		$bdd = $this->dbConnect();

		$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postID));
		$req = $req->fetch();
		return $req;
	}
}