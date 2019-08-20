<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts()
{
	$postManager = new \Thunderwilder\Blog\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new \Thunderwilder\Blog\Model\PostManager();
	$commentManager = new \Thunderwilder\Blog\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new \Thunderwilder\Blog\Model\CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);

    if(isset($_POST['author']))
    {
        setcookie('author', $_POST['author'], time() + 24*3600, null, null, false, true);
    }

	if($affectedLines === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function getComment($commentId)
{
	$commentManager = new \Thunderwilder\Blog\Model\CommentManager();
	$one_comment = $commentManager->getComment($commentId);

	if($one_comment === false)
	{
		throw new Exception('Impossible de récupérer le commentaire');
	}
	else
	{
		require('view/frontend/editView.php');
	}
}

function editionComment($new_comment, $current_date)
{
	$commentManager = new \Thunderwilder\Blog\Model\CommentManager();
	$affectedComment = $commentManager->editComment($new_comment, $current_date);

	if($affectedComment === false)
	{
		throw new Exception('Impossible d\'éditer le commentaire');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $_GET['idPost']);
	}
}
