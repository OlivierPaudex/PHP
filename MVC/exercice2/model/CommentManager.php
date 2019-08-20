<?php

namespace Thunderwilder\Blog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC LIMIT 0, 5');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $req->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function getComment($commentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM comments WHERE id = ?');
		$req->execute(array($commentId));
		$one_comment = $req->fetch();

		return $one_comment;
	}

	public function editComment($new_comment, $current_date)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET comment = :new_comment, edit_date = :edit_date WHERE id = '.(int)$_GET['id'].' ');
		$affectedComment = $req->execute(array(
			'new_comment' => $new_comment,
			'edit_date' => $current_date
		));

		return $affectedComment;
	}
}
