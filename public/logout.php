<?php

session_start();

unset($_SESSION['auth']);
unset($_SESSION['enseigne']);
unset($_SESSION['id']);

header('location: connexion-client.php');

 ?>
