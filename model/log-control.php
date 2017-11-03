<?php

  $login_adm = htmlspecialchars($_POST['log_adm']);
  $log_password = htmlspecialchars($_POST['log_password']);

  echo $login_adm.' '.$log_password.'<br><br>';
  require_once('connexion.inc');
  try {
  //  $stmt = $bdd->prepare("SELECT idClient, passwordCrypt FROM login INNER JOIN client ON numClient where email = '$log_email'");
    $stmt = $bdd->prepare("SELECT nomAdmin, password FROM admin");
    $result = $stmt -> execute();
    /*if ($result == true) {
      echo 'requete ok<br>';
    } else {
      echo 'requete non valide<br>';
    }*/
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }

  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $user = $stmt->fetch();

  $login = $user->nomAdmin;
  echo $login.'<br>';
  $pwd = $user->password;
  echo $pwd.'<br>';

  if($login_adm == $login && $log_password == $pwd) {
    echo 'Vous êtes connecté !';
  } else {
    echo 'E-mail ou mot de passe incorrect !<br>';
  }

?>
