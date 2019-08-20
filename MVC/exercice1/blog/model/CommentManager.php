<?php 
namespace Younes\Blog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager{

	public function getComments($post_id){
		$con = $this->connectDB();

		$stmt = $con->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,"%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE post_id = ?');
		$stmt->execute(array($post_id));

		return $stmt;
	}

	public function addComment($post_id,$author,$comment){
		$con = $this->connectDB();

		$stmt = $con->prepare('INSERT INTO comments(post_id,author,comment,comment_date) VALUES(?,?,?,NOW())');
		$stmt->execute(array($post_id,$author,$comment));

		return $stmt;
	}

	public function viewComment($comment_id){

		$con = $this->connectDB();

		$stmt = $con->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,"%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE id=?');
		$stmt->execute(array($comment_id));

		return $stmt;
	}

	public function editComment($comment_id,$comment){
		$con = $this->connectDB();

		$stmt = $con->prepare('UPDATE comments SET comment=:comment WHERE id = :comment_id');

		$stmt->execute(array(':comment_id' => $comment_id,':comment' => $comment));

		return $stmt;
	}

};