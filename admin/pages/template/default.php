<html>
  <head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styles.css">
  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- Navbar content -->
        <span class="navbar-brand mb-0 h1">Toutbois BO</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="col-md-9">
            <ul class="navbar-nav">
              <li class="nav-item <?php if($_GET['p'] == 'commandes' || $_GET['p'] == 'detail-cde') { echo 'active';} ?>">
                <a class="nav-link" href="index.php?p=commandes">Suivi commandes<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?php if($_GET['p'] == 'liste-articles' || $_GET['p'] == 'detail-art') { echo 'active';} ?>">
                <a class="nav-link" href="index.php?p=liste-articles">Gestion des articles</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="navbar-nav float-droit-menu">
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] == 'ADMIN'): ?>

                <li class="nav-item active">
                  <a class="nav-link" href="index.php?p=logout"><?= $_SESSION['user']; ?> Déconnexion</a>
                </li>
              <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=login">Connexion</a>
              </li>
            <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>

      <?= $content; ?>




    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
