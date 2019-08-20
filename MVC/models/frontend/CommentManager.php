<?php
namespace Fuyens\MVC;

require_once('./models/frontend/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$bdd = $this->dbConnect();
	
		$req = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date');
		$req->execute(array($postId));
		return $req;
	}

	public function postComment($postId, $author, $comment)
	{
		$bdd = $this->dbConnect();
	
		$comments = $bdd->prepare('INSERT INTO comments(id_post, author, comment) VALUES(?, ?, ?)');
		$req = $comments->execute(array($postId, $author, $comment));

		return $req;
	}
	
	public function getComment($commentId)
	{
		$bdd = $this->dbConnect();
		
		$req = $bdd->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
		$req->execute(array($commentId));
		$req = $req->fetch();
		return $req;
	}
	
	public function updateComment($commentId, $comment)
	{
		$bdd = $this->dbConnect();
		
		$req = $bdd->prepare('UPDATE comments SET comment = ? WHERE id = ?');
		$req->execute(array($comment, $commentId));
		return $req;
	}
}