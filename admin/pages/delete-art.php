<?php
  $numArt = $_GET['art'];
  $db3 = new Database();
  $db3->query3("DELETE FROM produit WHERE id_produit = ".$numArt);
  header('location: index.php?p=liste-articles');
 ?>
