<?php 
namespace Younes\Blog\Model;

require_once('model/Manager.php');


class PostManager extends Manager{

	public function getPosts(){

		$con = $this->connectDB();

		$stmt = $con->query('SELECT id, title, content, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin%ss") AS date FROM posts ORDER BY id DESC');

		return $stmt;
	}

	public function getPost($post_id){
		$con = $this->connectDB();

		$stmt = $con->prepare('SELECT id, title, content, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin%ss") AS date FROM posts WHERE id = ?');
		$stmt->execute(array($post_id));

		return $stmt;
	}

};