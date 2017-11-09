<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
  require('../class/pagination.class.php');
?>

<?php
  // onclick="return myfunc('../model/log-control.php');"
  // !preg_match('/^[a-z0-9_]+$/'
  if(!empty($_POST)) {

    $errors = array();

    if(empty($_POST['emailClient']) || !filter_var($_POST['emailClient'] , FILTER_VALIDATE_EMAIL)) {
      $errors['emailClient'] = "Votre e-mail n'est pas valide !";
    }

    if(empty($_POST['logPassword']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['emailClient'])) {
      $errors['logPassword'] = "Votre mot de passe n'est pas valide !";
    }

    var_dump($errors);

  }

 ?>

<h2>Connexion</h2>

<div class="row justify-content-md-center">
  <form name="loginform" class="col-md-6" method="post">
    <div class="form-group">
      <label for="exampleInputLogin1">Email</label>
      <input type="email" name="emailClient" class="form-control" id="emailClient" placeholder="Login">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" name="logPassword" class="form-control" id="logPassword" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Connexion</button>
  </form>
</div>
<div class="alert alert-success" role="alert" id="resultat2"></div>
<div class="alert alert-danger" role="alert" id="resultat"></div>


<?php
	require_once('../view/bas.php');

?>
