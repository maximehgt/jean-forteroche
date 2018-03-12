<!--Start connexion-->
<div class="container mt-4">
	<h1 class="title-id">Connexion</h1>

	<?php if ($errors): ?>
	  <div class="alert alert-danger">
	      <i class="fas fa-exclamation-triangle"></i>  Identifiants incorrects
	  </div>
	<?php endif; ?>

	<form method="post">
	    <?= $form->input('username', 'Pseudo'); ?>
	    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	    <button class="btn btn-primary">Se connecter</button>
	</form>
</div>
<!--End connexion-->