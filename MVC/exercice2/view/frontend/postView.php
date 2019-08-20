<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <div class="container">
		<h1><a href="index.php" class="blog">Mon super blog !</a></h1><br>
		<p><a href="index.php">Retour à la liste des posts</a></p>

	    <h3>
	        <?= htmlspecialchars($post['title']) ?>
	        <em>(le <?= $post['creation_date_fr'] ?>)</em>
	    </h3>
	    
	    <p>
	        <?= nl2br(htmlspecialchars($post['content'])) ?>
	    </p>
	</div>


    <div class="container">
		<h3>Commentaires</h3>

		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<br>
			<div id="chatbox">
			    <div><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
			    <a href="index.php?action=getComment&amp;id=<?= $comment['id']; ?>&amp;idPost=<?= $comment['post_id']; ?>">(modifier)</a></div>

						<?php
							if($comment['comment_date_fr'] != $comment['edit_date_fr'])
							{
								echo "<div class=\"commentaire_modifie\"> " . "(édité le " . $comment['edit_date_fr'] . ")</div>";
							}

							else
							{
								echo "";
							}
						?>

				<br>
			    <div><?= nl2br(htmlspecialchars($comment['comment'])) ?></div>
			 </div>
		<?php
		}
		?>
	</div>

	<div id="formulaire" class="container well">
		<form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="POST">
			<br>
			<fieldset>
				<legend>Ecrivez un commentaire</legend>
				<label for="author"><p>Votre pseudo :</p> <input type="text" name="author" id="author" pattern="[a-zA-Z0-9_@ ]{3,15}" class="form-control" required 
					<?php
						if(isset($_COOKIE['author']))
						{
							echo ' value="' . $_COOKIE['author'] . '"';
						}
					?>
				></label><br>
				<label for="comment"><br><p>Votre commentaire :</p> <textarea name="comment" id="comment" rows="5" cols="50" pattern="[a-zA-Z0-9_@ ]{3,15}" class="form-control" required></textarea></label><br><br>
				<input type="submit" value="Envoyer" class="btn btn-primary">
			</fieldset>
		</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

