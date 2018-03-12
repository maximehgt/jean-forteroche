<?php if ($error): ?>
  <div class="alert alert-danger">
      <i class="fas fa-exclamation-triangle"></i>  Veuillez remplir correctement chaque(s) champ(s).
  </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('title', 'Titre du chapitre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Roman', $categories); ?>

    <button class="btn btn-primary">Sauvegarder</button>
</form>
<br>
<a class="btn btn-warning back-btn" href="?p=admin.posts.index"><i class="fas fa-arrow-left"></i> Retour</a>
