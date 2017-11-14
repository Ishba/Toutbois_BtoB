<?php
  require_once('../view/haut.php');
  $log_email = htmlspecialchars($_POST['log_email']);
  $log_password = htmlspecialchars($_POST['log_password']);

  //echo $log_email.' '.$log_password.'<br><br>';

  try {
    $stmt = $DB->connect("SELECT idClient, passwordCrypt FROM login INNER JOIN client ON numClient = idClient WHERE email = '$log_email'");
    //$req->execute();
    //return $req->fetchAll(PDO::FETCH_OBJ);
    if ($stmt == false) {
      echo 'Votre e-mail est incorrect !<br>';
    }
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }

  //$stmt->setFetchMode(PDO::FETCH_OBJ);
  //$user = $stmt->fetch();

  foreach ($stmt as $user) {
    $num_client = $user->idClient;
    //echo $num_client.'<br>';
    $pass_client = $user->passwordCrypt;
    //echo $pass_client.'<br>';

    if(password_verify($log_password, $pass_client)) {
      echo 'Vous êtes connecté !';
      $_SESSION['auth'] = "Connect";
      
    } else {
      echo 'Votre mot de passe est incorrect !<br>';
    }
  }





?>
