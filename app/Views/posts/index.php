<!-- Start banner -->
<header class="header banner" id="header-perso">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>
<!-- End banner -->

<!--Start présentation-->
<div class="container"> <!--Start container-->
  <div class="row"> <!--Start row-->
      <div class="col-sm-8 mt-4">
          <h2 class="test center" id="who-title">Qui suis-je ?</h2>
          <div class="row">
              <div class= "col-sm-3">
                  <img src="img/jean-rf.jpg" alt="Jean ForteRoche" id="jean">
              </div>
              <div class= "col-sm-9">
                <h3>Jean Forteroche, écrivain pour son plus gfrand plaisir.</h3>
                <p>Vous pourrez trouver sur ce site mes nouveaux ouvrages en ligne.</p>
                <p>En vous souhaitant une agréable lecture, votre écrivain dévoué.</p>
                <p>- Jean Forteroche -</p>
              </div>
          </div>
      </div>  
<!--End présentation-->

<!--Start mes romans-->
      <div class="col-sm-4 mt-4">
          <h3 class="last-chapitre">Mes Romans</h3>
          <ul>
          <?php foreach($categories as $category): ?>
              <li><i class="fas fa-book"></i> <a href="<?= htmlspecialchars($category->url); ?>"><?= htmlspecialchars($category->title); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
<!--End mes romans-->

<!--Start dernier post-->
      <div class="container last-posts center">
        <h2>Mes dernières publications</h2>
        <ul>
        <?php foreach($posts as $post): ?>
            <li>
                <h2><i class="far fa-bookmark"></i> <a href="<?= htmlspecialchars($post->url); ?>"><?= htmlspecialchars($post->title); ?></a></h2>
                <p><em><?= htmlspecialchars($post->category); ?></em></p>
                <p><?= htmlspecialchars($post->date); ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
      </div>
<!--End dernier post-->

  </div> <!--End row-->
</div> <!--End container-->