<?php $title = htmlspecialchars($post['title']); ?>
 
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
 
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
     
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>
 
<h2><?php echo 'Commentaire de ' . $comment['author'] . ', le ' . $comment['creation_date_fr']; ?></h2>
 
<form action="index.php?action=loadComment&amp;post_id=<?= $post['id'] ?>&amp;comment_id=<?= $comment['id'] ?>" method="post">
    <div> 
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($comment['author']); ?>" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment">
            <?php echo nl2br(htmlspecialchars($comment['comment'])); ?>
        </textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
 
 
<?php $content = ob_get_clean(); ?>
 
<?php require('template.php'); ?>