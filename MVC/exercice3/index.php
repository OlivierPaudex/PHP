<?php
require('controller/frontend.php');

try 
{
    if (isset($_GET['action'])) {
        
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }

        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé bonjour');
            }
        }

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'editComment') {
    		if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
        		if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
            		comment($_GET['post_id'], $_GET['comment_id']);
        		}
	        	else {
	            	throw new Exception('Aucun identifiant de commentaire envoyé');
	        	}
    		}
    		else {
        		throw new Exception('Aucun identifiant de billet envoyé');
    		}
		}



        elseif ($_GET['action'] == 'loadComment') {
            if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        editComment($_GET['post_id'],$_GET['comment_id'],$_POST['author'],$_POST['comment']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                    }
                }
            }    
            else {
                    throw new Exception('Aucun identifiant de billet envoyé j\'ai les boules');
                }
            }
    }
        else {
            listPosts();
        }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}