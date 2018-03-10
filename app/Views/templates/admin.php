<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Jean Forteroche">
    <meta name="twitter:description" content="Blog - Jean Forteroche">
    <meta name="twitter:image" content="http://maxime-hugonnet.fr/jean-forteroche/public/img/jean-rf.jpg">
    <!-- Open Graph data -->
    <meta property="og:title" content="Jean Forteroche"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://maxime-hugonnet.fr/jean-forteroche">
    <meta property="og:image" content="http://maxime-hugonnet.fr/jean-forteroche/public/img/jean-rf.jpg"/>
    <meta property="og:description" content="RBlog - Jean Forteroche"/>
    <link rel="apple-touch-icon" sizes="180x180" href="./public/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicon-16x16.png">
    <link rel="mask-icon" href="./public/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">

    <link rel="stylesheet" href="./css/styles.css">
    <title><?= App::getInstance()->title; ?></title>
  </head>

  <body>
    <div class="header" id="header-perso">
        <div class="top-header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
                  <a class="nav-item nav-link" href="index.php?p=admin.posts.index"><i class="far fa-bookmark"></i> Chapitres</a>
                  <a class="nav-item nav-link" href="index.php?p=admin.categories.index"><i class="fas fa-book"></i> Romans</a>
                  <a class="nav-item nav-link" href="index.php?p=admin.comments.index"><i class="far fa-comment"></i> Commentaires</a>
                  <a class="nav-item nav-link" href="index.php?p=admin.app.logOut"><i class="fas fa-sign-in-alt"></i> Déconnexion</a>
                </div>
              </div>
            </nav>
          </div>
        </div>
    </div>

    <div class="container">

      <div class="starter-template" style="padding-top: 100px">
        <?= $content ?>
      </div>
    </div><!-- /.container -->

    <footer class="py-2 bg-dark mt-4">
      <p class="m-0 text-center text-white">Copyright &copy; HGTProduction 2018</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8dzax3r89w6pf827p7ykwd3soyohjqsysbr3puloamubtf3o"></script>
    <script src="./js/tinyfix.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
