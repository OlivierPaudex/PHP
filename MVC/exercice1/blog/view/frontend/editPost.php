<?php $title = "Edit My Comment"; ?>
<?php ob_start(); ?>
<?php $result = $comment->fetch() ?>
	<div class="news">
		<a href="?action=post&id=<?= $result['post_id']; ?>">Return to post</a>
		<h1>Edit Your Comment</h1>
		<strong><?= $result['author']; ?></strong> le <em><?= $result['date'] ?></em>
		<form action="?action=editComment&id=<?= $result['id']; ?>" method="post">
			<textarea name="comment"><?= $result['comment']; ?></textarea><br/>
			<input type="submit" name="submit" value="Edit the comment">
		</form>
		<div class="editMessage"><?= $edit; ?></div>
	</div>
 <?php $comment->closeCursor();  ?>
 <?php $content = ob_get_clean(); ?>
 <?php require('template.php'); ?>