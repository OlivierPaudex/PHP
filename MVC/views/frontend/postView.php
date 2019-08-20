<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="./public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
		<p><a href="index.php">Retour aux billets</a></p>
       
        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= htmlspecialchars($post['creation_date_fr']) ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Ajouter un commentaire</h2>
		
		<form action="index.php?action=addComment&id=<?= htmlspecialchars($post['id']) ?>" method="post">
			<div>
				<label for="author">Auteur</label><br />
				<input type="text" id="author" name="author" />
				<br /><br />
			</div>
			
			<div>
				<label for="comment">Commentaire</label><br />
				<textarea id="comment" name="comment" cols="100"></textarea>
				<br /><br />
			</div>
			
			<div>
				<input type="submit" />
			</div>
		</form>

		<h2>Commentaires</h2>
		
        <?php
			while ($comment = $comments->fetch())
			{
        ?>
		
            <p>
				<strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?>
				<strong>(</strong><a href="index.php?action=modifyComment&id=<?= htmlspecialchars($comment['id']) ?>">Modifier</a><strong>)</strong>
			</p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
			
        <?php
			}
			$comments->closeCursor();
        ?>
    </body>
</html>
