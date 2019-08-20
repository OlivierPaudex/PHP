<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <div class="container">
        <h1><a href="index.php" class="blog">Mon super blog !</a></h1>
    </div>

    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="container">
            <h2>
                <?= htmlspecialchars($data['title']); ?>
                <em>(le <?= $data['creation_date_fr']; ?>)</em>
            </h2>
            
            <p>
                <?= nl2br(htmlspecialchars($data['content'])); ?>
                <br>
                <em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Commentaires</a></em>
            </p>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
