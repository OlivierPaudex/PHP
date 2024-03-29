<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }   
}

function comment($post_id, $comment_id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
     
    $post = $postManager->getPost($_GET['post_id']);
    $comment = $commentManager->editComment($_GET['comment_id']);
 
    require('view/frontend/commentView.php');
}

function editComment ($post_id, $comment_id, $author, $comment)
{
    $commentManager = new CommentManager();
    $post = $commentManager->updateComment($post_id, $comment_id, $author, $comment);
    if($post === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
    else {
            header('Location: index.php?action=post&id=' . $post_id);
        }   
}
