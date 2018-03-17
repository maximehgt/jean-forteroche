<!--start category roman-->
<div class="container mt-4">
    <h1 class="title-id"><?= $category->title ?></h1>

    <div class="row">
        <div class="col-sm-8 mt-4">
            <ul>
            <?php foreach($articles as $post): ?>

                <li>  
                    <h2><i class="far fa-bookmark"></i> <a href="<?= htmlspecialchars($post->url); ?>"><?= htmlspecialchars($post->title); ?></a></h2>
                    <p><em><?= htmlspecialchars($post->category); ?></em></p>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php if (isset($_SESSION['auth'])): ?>
                <a class="btn btn-warning back-btn" href="?p=admin.categories.index"><i class="fas fa-cog"></i> Administration</a>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
          <h2 class="title-id">Romans</h2>
            <ul>
            <?php foreach($categories as $category): ?>
                <li><i class="fas fa-book"></i> <a href="<?= htmlspecialchars($category->url); ?>"><?= htmlspecialchars($category->title); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
    </div>
</div>
<!--End category roman-->
