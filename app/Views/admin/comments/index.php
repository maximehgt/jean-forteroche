<?php
switch ($success) {
    case 'edit':
        echo '<div class="alert alert-primary">
            <i class="fas fa-check"></i>  Commentaire modifié avec succès
        </div>';
        break;

    case 'delete':
        echo '<div class="alert alert-danger">
            <i class="fas fa-check"></i>  Commentaire supprimé avec succès
        </div>';
        break;

    default:
        break;
}
?>

<!--Start admin commentaires-->
<h1 class="title-id"><i class="far fa-comment"></i> Administrer les commentaires</h1>

<table class="table">
    <thead>
        <tr>
              <td class="title-id">Source</td>
              <td class="title-id">Pseudo</td>
              <td class="title-id">Commentaire</td>
              <td class="title-id">Signalement</td>
              <td class="title-id">Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment): ?>
        <tr>
          <td><em><?= htmlspecialchars($comment->category); ?></em><br><?= htmlspecialchars($comment->title); ?></td>
          <td><?= htmlspecialchars($comment->pseudo); ?></td>
          <td><?= htmlspecialchars($comment->content); ?></td>
          <?php
          if ((int)$comment->signal_count > 10) {
              echo '<td style="background-color: rgba(180, 43, 43, 0.83);">' . htmlspecialchars($comment->signal_count) . ' <i class="fas fa-exclamation-circle"></i></td>';
          } else if ((int)$comment->signal_count > 5) {
              echo '<td style="background-color: rgba(243, 171, 77, 0.83);">' . htmlspecialchars($comment->signal_count) . ' <i class="fas fa-exclamation-triangle"></i></td>';
          } else {
              echo '<td>' . htmlspecialchars($comment->signal_count) . '</td>';
          }
          ?>
          <td>
              <a class="btn btn-secondary" href="?p=posts.comment&id=<?= htmlspecialchars($comment->id); ?>"><i class="fas fa-eye"></i>  Voir</a>
              <a class="btn btn-primary" href="?p=admin.comments.edit&id=<?= htmlspecialchars($comment->id); ?>"><i class="fas fa-edit"></i> Editer</a>
              <a href="#openModal<?= htmlspecialchars($comment->id); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</a>
              <div id="openModal<?= htmlspecialchars($comment->id); ?>" class="modalDialog">
                <div>
                  <a href="#close" title="Close" class="close"><i class="fas fa-times"></i></a>
                  <div>
                    Souhaitez vous vraiment supprimer cet element ?
                  </div>
                  <div>
                    <form action="?p=admin.comments.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($comment->id); ?>">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
                    </form>
                    <a href="#close" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Annuler</a>
                  </div>
                </div>
              </div>

          </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<!--End admin commentaires-->