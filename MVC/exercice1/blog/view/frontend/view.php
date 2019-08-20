
<?php  $title = "My Blog"; ?>
<?php ob_start(); ?>
	<div class="news">
		<?php while($result = $posts->fetch()){ ?>
		<h1><?= $result['title']; ?> le <em><?= $result['date']; ?></em></h1>
		<p>
		<?= $result['content']; ?>	
		<a href="?action=post&id=<?= $result['id']; ?>">Comment</a>
		</p>
		<?php
		}
		$posts->closeCursor();
		?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>