<?php

  $perpage = 8;
  $nbArticleTotal = $db->nbArticle('SELECT COUNT(*) AS total FROM produit');
  $nbPage = ceil($nbArticleTotal / $perpage);

  // Verification de la page où l'on se trouve dans l'url si pg n'est pas vide et que c'est un chiffre.
  // ctype_digit() retourne 1 si tous les caractères retournés sont des chiffres ou sinon 0
  if(isset($_GET['pg']) && !empty($_GET['pg']) && ctype_digit($_GET['pg']) == 1) {
    if($_GET['pg'] > $nbPage) {
      $current = $nbPage;
    } else {
      $current = $_GET['pg'];
    }
  } else {
    $current = 1;
  }

  $firstArtPage = ($current - 1) * $perpage;

 ?>
