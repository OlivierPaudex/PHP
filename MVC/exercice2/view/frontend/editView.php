<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <div class="container">
        <h1><a href="index.php" class="blog">Mon super blog !</a></h1>
    </div>

    <div class="container">
        <h3>Commentaire à éditer</h3><br>

        <p><strong><?= htmlspecialchars($one_comment['author']); ?></strong> le <?= $one_comment['comment_date_fr']; ?></p>

        <form action="index.php?action=editionComment&amp;id=<?= $_GET['id']; ?>&amp;idPost=<?=$_GET['idPost']; ?>" method="POST">
            <label for="new_comment"><p><textarea name="new_comment" id="new_comment" rows="5" cols="50"><?= nl2br(htmlspecialchars($one_comment['comment'])); ?></textarea></label></p>

            <input type="submit" value="Editer" class="btn btn-primary">
            <a href="index.php?action=post&amp;id=<?= $one_comment['post_id']; ?>"><button type="button" class="btn btn-info">
            Annuler</button></a>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


