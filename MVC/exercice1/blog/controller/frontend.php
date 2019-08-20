<?php
	
	session_start();

	require_once('model/PostManager.php');
	require_once('model/CommentManager.php');


	function listPosts(){
		$postManager = new \Younes\Blog\Model\PostManager();
		$posts = $postManager->getPosts();
		require('view/frontend/view.php');
	}

	function post($post_id){
		$postManager = new \Younes\Blog\Model\PostManager();
		$post = $postManager->getPost($post_id);

		$commentManager = new \Younes\Blog\Model\CommentManager();
		$comments = $commentManager->getComments($post_id);

		require('view/frontend/viewPost.php');
	}

	function addComment($post_id,$author,$comment){
		$commentManager = new \Younes\Blog\Model\CommentManager();
		$affectedLine = $commentManager->addComment($post_id,$author,$comment);

		if(!$affectedLine){
			throw new Exception('Error : Comment Not added !');
		}else{
			header('Location:?action=post&id='.$post_id);
		}
	}

	function viewComment($comment_id){
		$commentManager = new \Younes\Blog\Model\CommentManager();
		$comment = $commentManager->viewComment($comment_id);
		if(isset($_SESSION['edit'])){
			$edit = $_SESSION['edit'];
			unset($_SESSION['edit']);
		}else{
			$edit = "";
		}
		require('view/frontend/editPost.php');
	}

	function editComment($comment_id,$comment){
		$commentManager = new \Younes\Blog\Model\CommentManager();
		$affectedLine = $commentManager->editComment($comment_id,$comment);

		if(!$affectedLine){
			throw new Exception('Error : Comment Not added !');
		}else{
			
			$_SESSION['edit'] = "Comment Edited Successfully !";
			header('Location:?action=editComment&id='.$comment_id);
		}
	}