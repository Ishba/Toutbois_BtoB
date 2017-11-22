<?php

require 'class/Autoloader.php';

Autoloader::register();

if(isset($_GET['p'])) {
  $p = $_GET['p'];
} else {
  $p = 'login';
}

// Initialisation des objets
$db = new Database();

ob_start();
if($p === 'login') {
  require 'pages/login.php';
} elseif($p === 'commandes') {
  require 'pages/commandes.php';
} elseif($p === 'detail-cde') {
  require 'pages/detail-cde.php';
}

$content = ob_get_clean();
require 'pages/template/default.php'

?>


<!--
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styles.css">
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script>
  		function myfunc(strURL) {
  			alert ("ici");
  			xmlhttpPost(strURL);
  			alert ("ici2");
  			return false;
  		}
		</script>
  </head>
  <body>
    <div class="container">

      <div class="row justify-content-md-center">
        <form name="loginform" class="col-md-6" method="post">
          <div class="form-group">
            <label for="exampleInputLogin1">Login</label>
            <input type="text" name="log-adm" class="form-control" id="log_adm" placeholder="Login">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="log-password" class="form-control" id="log_password" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-primary" onclick="return myfunc('../model/log-control.php');">Connexion</button>
        </form>
      </div>
      <div class="alert alert-success" role="alert" id="resultat2"></div>
      <div class="alert alert-danger" role="alert" id="resultat"></div>
    </div>
  </body>
</html>
-->
