<?php
require_once('./models/frontend/PostManager.php');
require_once('./models/frontend/CommentManager.php');

use \Fuyens\MVC\PostManager;
use \Fuyens\MVC\CommentManager;

function listPosts()
{
	$postManager = new PostManager();
    $posts = $postManager->getPosts();
	
	require('./views/frontend/listPostsView.php');	
}

function post()
{
	$postManager = new PostManager();
    $commentManager = new CommentManager();
	
	$post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
	
	if (empty($post))
	{
		throw new Exception('Le billet n\'existe pas !');
	}
	else
	{
	require('./views/frontend/postView.php');
	}
}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	
	$status = $commentManager->postComment($postId, $author, $comment);
	
	if ($status === false)
	{
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
	{
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($commentId)
{
	$commentManager = new CommentManager();
	
	$comment = $commentManager->getComment($commentId);
	
	if ($comment === false)
	{
        throw new Exception('Le commentaire n\'existe pas !');
    }
	else
	{
		require('./views/frontend/modifyCommentView.php');
	}
}

function changeComment($commentId, $postId, $comment)
{
	$commentManager = new CommentManager();
	
	$status = $commentManager->updateComment($commentId, $comment);
	
	if ($status === false)
	{
        throw new Exception('Impossible de mettre à jour le commentaire !');
    }
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}