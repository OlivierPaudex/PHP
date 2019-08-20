<?php $title = "My Blog"; ?>
<?php ob_start(); ?>
	<div class="news">
		<a href="?action=listPosts">Return to main page</a>
		<?php $result = $post->fetch(); ?>
		<h1><?= $result['title']; ?> le <em><?= $result['date']; ?></em></h1>
		<p>
		<?= $result['content']; ?>	
		</p>
		<form action="?action=addComment&id=<?= $result['id']; ?>" method="post">
			<label for="author">Author</label><br>
			<input type="text" id="author" name="author"><br>
			<textarea name="comment" cols="21" rows="5" placeholder="Comment Here"></textarea><br>
			<input type="submit" value="add">
		</form>

		<?php
		$post->closeCursor();
		?>
	</div>
	<h2>Comment : </h2>
	<?php while($result=$comments->fetch()){ ?>
		<strong><?= $result['author']; ?></strong> le <em><?= $result['date']; ?></em>
		( <a class="edit" href="?action=editComment&id=<?= $result['id']; ?>">modifier</a> )
		<div><?= $result['comment']; ?></div><hr>
		<br/>
	<?php 
		}
		$comments->closeCursor();
 	?>
 <?php $content = ob_get_clean(); ?>
 <?php require('template.php'); ?>