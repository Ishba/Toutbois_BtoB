<?php

	if(isset($_GET['addcommande'])) {
		addcommande($_GET['addcommande']);
	}

	function addcommande() {
  if(!isset($_SESSION['enseigne'])) {
			// CODER POUR AFFICHER MESSAGE D ERREUR
			?><div class="alert alert-danger" role="alert">Il faut vous <a href="connexion-client.php">connecter</a> pour poursuivre votre commande !</div><?php
		} elseif (empty($_SESSION['panier'])) {
		  ?><div class="alert alert-danger" role="alert"><strong>Votre panier est vide !</strong><br>Ajoutez des produit depuis la page <a href="catalogue.php">commander</a></div><?php
		} else {
      $statut = 'En cours';
			$DB2 = new DB();
			$DB2->query2("INSERT INTO entete_commande (date_com, idUser, statut_cde) VALUES (NOW(), ".$_SESSION['id'].", '$statut')");


			$idCde = $DB2->query('SELECT id_com FROM entete_commande ORDER BY id_com DESC LIMIT 1');


			$cdelines = $_SESSION['panier'];
			foreach ($cdelines as $cdelineid => $lineqte) {

				$DB2->query2('INSERT INTO ligne_commande (qte, id_com, id_produit) VALUES ('.$lineqte.', '.$idCde[0]->id_com.', '.$cdelineid.')');

			}
			?><div class="alert alert-success" role="alert">Votre commande est enregistrée<br>Numéro de commande : <?= $idCde[0]->id_com; ?></div><?php
		}
		unset($_SESSION['panier']);
	}
	?>
