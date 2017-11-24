<?php

session_start();

unset($_SESSION['auth']);
unset($_SESSION['enseigne']);
unset($_SESSION['id']);
unset($_SESSION['panier']);

header('location: connexion-client.php');

 ?>
