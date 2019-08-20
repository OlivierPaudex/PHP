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
		
		<p>
			<strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?><br />
			<?= nl2br(htmlspecialchars($comment['comment'])) ?>
		</p>
		
		<h2>Modifier le commentaire ci-dessous</h2>
		
		<form action="index.php?action=changeComment&id=<?= htmlspecialchars($comment['id']) ?>&post=<?= htmlspecialchars($comment['id_post']) ?>" method="post">
			<div>
				<label for="comment">Commentaire</label><br />
				<textarea id="comment" name="comment" cols="100"><?= nl2br(htmlspecialchars($comment['comment'])) ?></textarea>
				<br /><br />
			</div>
			
			<div>
				<input type="submit" />
			</div>
		</form>
	</body>
</html>