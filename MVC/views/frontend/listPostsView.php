<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="./public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
 
		<?php
			while ($post = $posts->fetch())
			{
        ?>
        
		<div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= htmlspecialchars($post['creation_date_fr']) ?></em>
            </h3>
            
            <p>
				<?= nl2br(htmlspecialchars($post['content'])) ?>
				<br />
				<em><a href="index.php?action=post&id=<?= htmlspecialchars($post['id']) ?>">Commentaires</a></em>
            </p>
        </div>
		
        <?php
			}
			$posts->closeCursor();
        ?>
    </body>
</html>