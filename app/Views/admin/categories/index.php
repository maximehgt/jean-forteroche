<?php
switch ($success) {
    case 'add':
        echo '<div class="alert alert-success">
            <i class="fas fa-check"></i>  Roman ajouté avec succès
        </div>';
        break;

    case 'edit':
        echo '<div class="alert alert-primary">
            <i class="fas fa-check"></i>  Roman modifié avec succès
        </div>';
        break;

    case 'delete':
        echo '<div class="alert alert-danger">
            <i class="fas fa-check"></i>  Roman supprimé avec succès
        </div>';
        break;

    default:
        break;
}
?>

<!--Start admin catégory-->
<h1 class="title-id"><i class="fas fa-book"></i> Administrer les romans</h1>
<p>
    <a href="?p=admin.categories.add" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
              <td class="title-id">Titre</td>
              <td class="title-id">Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $category): ?>
        <tr>
          <td><?= htmlspecialchars($category->title); ?></td>
          <td>
              <a class="btn btn-secondary" href="?p=posts.category&id=<?= htmlspecialchars($category->id); ?>"><i class="fas fa-eye"></i>  Voir</a>
              <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= htmlspecialchars($category->id); ?>"><i class="fas fa-edit"></i> Editer</a>
              <a href="#openModal<?= htmlspecialchars($category->id); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</a>
              <div id="openModal<?= htmlspecialchars($category->id); ?>" class="modalDialog">
                <div>
                  <a href="#close" title="Close" class="close"><i class="fas fa-times"></i></a>
                  <div>
                    Souhaitez vous vraiment supprimer cet element ?
                  </div>
                  <div>
                    <form action="?p=admin.categories.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($category->id); ?>">
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
<!--End admin catégory-->