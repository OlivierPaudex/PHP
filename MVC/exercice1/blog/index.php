<?php 

	require('controller/frontend.php');

	
	try{
		if(isset($_GET['action'])){
		if($_GET['action'] == 'listPosts'){

			listPosts();

		}else if($_GET['action'] == 'post'){
			
			if(isset($_GET['id']) && $_GET['id'] > 0){
				post($_GET['id']);
			}else{
				throw new Exception('Error ID');
			}
		}else if($_GET['action'] == 'addComment'){
			if(isset($_GET['id']) && $_GET['id'] > 0){
				if(!empty($_POST['author']) && !empty($_POST['comment'])){
					addComment($_GET['id'],$_POST['author'],$_POST['comment']);
				}else{
					throw new Exception('field empty !');
				}
			}else{
				throw new Exception('Error ID');
			}
		}else if($_GET['action'] == 'editComment'){
			if(isset($_GET['id']) && $_GET['id'] > 0){
				viewComment($_GET['id']);
				if(isset($_POST['comment'])){
					if(!empty($_POST['comment'])){
						editComment($_GET['id'],$_POST['comment']);
					}else{
						throw new Exception('field empty !');
					}
				}
			}else{
				throw new Exception('Error ID');
			}
		}

	}else{
		listPosts();
	}
}catch(Exception $e){
	die('Error : '.$e->getMessage());
}