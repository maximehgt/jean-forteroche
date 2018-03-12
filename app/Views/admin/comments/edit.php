<?php if ($error): ?>
  <div class="alert alert-danger">
      <i class="fas fa-exclamation-triangle"></i>  Veuillez remplir correctement chaque(s) champ(s).
  </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('pseudo', 'Pseudo'); ?>
    <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
    <?= $form->input('signal_count', 'Signalement', ['type' => 'number']); ?>

    <button class="btn btn-primary">Sauvegarder</button>
</form>
<br>
<a class="btn btn-warning back-btn" href="?p=admin.comments.index"><i class="fas fa-arrow-left"></i> Retour</a>
