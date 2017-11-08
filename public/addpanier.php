<?php
  require('../view/header.php');
  if(isset($_GET['id'])) {
    $produit = $DB->query('SELECT id_produit FROM produit WHERE id_produit=:id', array('id' => $_GET['id']));
    if(empty($produit)) {
      die("Ce produit n'existe pas !");
    }
    $panier->add($produit[0]->id_produit);
    die('Produit ajouté au panier ! <br><a href="javascript:history.back()">Retourner au catalogue</a>');
  } else {
    die("Vous n'avez pas selectionné de produit à ajouter au panier !");
  }


 ?>
