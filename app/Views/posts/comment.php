<!--Start comment-->
<div class="container">
	<h1><?= htmlspecialchars($comment->pseudo); ?></h1>
	<p><em><?= htmlspecialchars($comment->date); ?></em></p>
	<h2><?= htmlspecialchars($comment->content); ?></h2>
	<?php if (isset($_SESSION['auth'])): ?>
	    <a class="btn btn-warning back-btn" href="?p=admin.comments.index"><i class="fas fa-cog"></i> Administration</a>
	<?php endif; ?>
</div>
<!--End comment-->