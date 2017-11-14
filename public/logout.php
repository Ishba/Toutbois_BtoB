<?php

session_start();

unset($_SESSION['auth']);
unset($_SESSION['enseigne']);

header('location: connexion-client.php');

 ?>
