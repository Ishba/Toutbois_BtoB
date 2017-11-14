<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
  require('../class/pagination.class.php');
?>
<script type="text/javascript" src="../js/ajax.js"></script>
<script>
	function myfunc(strURL) {
		//alert ("ici");
		xmlhttpPost(strURL);
		//alert ("ici2");
		return false;
	}
</script>

<h2>Connexion</h2>


<div class="row justify-content-md-center">
  <form name="loginform" class="col-md-6" method="post">
    <div class="form-group">
      <label for="emailClient">Email</label>
      <input type="email" name="log_email" class="form-control" id="log_email" placeholder="Login">
    </div>

    <div class="form-group">
      <label for="logPassword">Mot de passe</label>
      <input type="password" name="log_password" class="form-control" id="log_password" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary" onclick="return myfunc('log-control.php');">Connexion</button>
		<br><br>
  </form>
</div>
<div class="alert alert-success" role="alert" id="resultat2"></div>
<div class="alert alert-danger" role="alert" id="resultat"></div>




<?php
	require_once('../view/bas.php');

?>
