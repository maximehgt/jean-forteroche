<?php
if (isset($_GET['state'])) {
    if ($_GET['state'] === 'success') {
        echo '<div class="alert alert-success">
            <i class="fas fa-check"></i>  Commentaire ajouté avec succès
        </div>';
    }
    if ($_GET['state'] === 'error') {
        echo '<div class="alert alert-danger">
            <i class="fas fa-check"></i>  Veuillez remplir correctement chaque champs de votre commentaire
        </div>';
    }
}
?>
<!--Start article-->
<div class="container mt-4">  
<!--Start flèche direction-->
    <div class="links-nav">
        <?php
        if (!isset($previous) && !isset($next)) {
            // N'affiche rien
        } else {
            if (!isset($previous)) {
            $links = '<div class="flex navPost justify-end"><div class="flex nextPost"><a href="?p=posts.show&id=' . htmlspecialchars($next->id) . '">' . htmlspecialchars($next->title) . ' <i class="fas fa-arrow-right"></i></a></div></div>';
          } elseif (!isset($next)) {
              $links = '<div class="flex navPost justify-space-between"><div class="flex prevPost"><a href="?p=posts.show&id=' . htmlspecialchars($previous->id) . '"><i class="fas fa-arrow-left"></i> ' . htmlspecialchars($previous->title) . '</a></div></div>';
          } else {
              $links = '<div class="flex navPost justify-space-between"><div class="flex prevPost"><a href="?p=posts.show&id=' . htmlspecialchars($previous->id) . '"><i class="fas fa-arrow-left"></i> ' . htmlspecialchars($previous->title) . '</a></div> <div class="flex nextPost"><a href="?p=posts.show&id=' . htmlspecialchars($next->id) . '">' . htmlspecialchars($next->title) . ' <i class="fas fa-arrow-right"></i></a></div></div>';
        }
        echo $links;
      }
        ?>

    </div>
<!--End flèche direction-->
    
<!--Start article content-->
    <h1><?= htmlspecialchars($article->title); ?></h1>
    <p><em><?= htmlspecialchars($article->category); ?></em></p>
    <div class="chapitre"><?= $article->content; ?></div>
    <?php if (isset($_SESSION['auth'])): ?>
        <a class="btn btn-warning back-btn" href="?p=admin.posts.index"><i class="fas fa-cog"></i> Administration</a>
    <?php endif; ?>
<!--End article content-->

<!--Start commentaire affiché/signaler-->
    <h3>Commentaires <i class="fas fa-comment"></i></h3>
    <ul>
    <?php foreach($comments as $comment): ?>
        <li>
            <p><em><?= htmlspecialchars($comment->pseudo); ?></em> <i class="fas fa-user"></i> - <?= htmlspecialchars($comment->date); ?>
            <?php
            if (isset($_SESSION['report'])) {
                if (count($_SESSION['report']) < 3) {
                    if (!in_array($comment->id, $_SESSION['report'])) {
                        echo '<span class="report"><a href="?p=posts.reportComment&id=' . htmlspecialchars($comment->id) . '&post_id=' . htmlspecialchars($article->id) . '">Signaler <i class="fas fa-exclamation-circle"></i></a></span></p>';
                    } else {
                      # do nothing
                    }
                } else {
                    # do nothing
                }
            } else {
                echo '<span class="report"><a href="?p=posts.reportComment&id=' . htmlspecialchars($comment->id) . '&post_id=' . htmlspecialchars($article->id) . '">Signaler <i class="fas fa-exclamation-circle"></i></a></span></p>';
            }

             ?>
            <p><?= htmlspecialchars($comment->content); ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
<!--End commentaire affiché/signaler-->

<!--Start poster un commentaire-->
    <h4>Poster un commentaire</h4>
    <form action="?p=posts.addComment&id=<?= htmlspecialchars($article->id); ?>" method="post">
        <?= $form->input('pseudo', 'Pseudo'); ?>
        <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
        <button class="btn btn-primary">Envoyer</button>
    </form>
<!--End poster un commentaire-->
</div>
<!--End article-->
