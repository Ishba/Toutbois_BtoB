<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
?>

<h2>Mon panier</h2>

<form method="post" action="panier.php">
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col"></th>
	      <th scope="col">Référence produit</th>
	      <th scope="col">Quantité</th>
	      <th scope="col">Prix HT</th>
				<th scope="col">Prix TTC</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
			<?php
				$ids = array_keys($_SESSION['panier']);
				if(empty($ids)) {
					$produits = array();
				}else {
					$produits = $DB->query('SELECT * FROM produit WHERE id_produit IN ('.implode(',',$ids).')');
				}
				foreach ($produits as $produit):
			?>
	    <tr>
	      <td><img src="../img/<?= $produit->image; ?>-mini.jpg" alt="..."></td>
	      <td><?php echo $produit->designation; ?></td>
	      <td>
	        <div class="form-group col-md-8 select-qte">
	          <span class="row"><input type="text" class="quantity" name="panier[quantity][<?= $produit->id_produit; ?>]" value="<?= $_SESSION['panier'][$produit->id_produit] ?>"> </span>
	        </div>
	      </td>
	      <td><?php echo number_format($produit->pu * $_SESSION['panier'][$produit->id_produit], 2, ',', ' '); ?> €</td>
				<td><?php echo number_format($produit->pu * $_SESSION['panier'][$produit->id_produit] * 1.196, 2, ',', ' '); ?> €</td>
	      <td><a href="panier.php?delPanier=<?= $produit->id_produit; ?>"><button type="button" class="btn btn-outline-danger">X</button></a></td>
	    </tr>
		<?php endforeach; ?>

	  </tbody>
	</table>
	<div class="totalPanier">
		<p><input type="submit" class="btn btn-secondary" value="recalculer"><strong>&nbsp;&nbsp; Total TTC : <?= number_format($panier->total(),2,',',' '); ?> €</strong><span class="float-droit"><a href="panier.php?addcommande" class="btn btn-primary">Finaliser ma commande</a></span></p>
	</div>
</form>


<?php

	if(isset($_GET['addcommande'])) {
		addcommande($_GET['addcommande']);
	}

	function addcommande() {
		if(!isset($_SESSION['enseigne'])) {
			// CODER POUR AFFICHER MESSAGE D ERREUR
			?><div class="alert alert-danger" role="alert">Il faut vous connecter pour poursuivre votre commande !</div><?php
		} else {
			$DB2 = new DB();
			$DB2->query2('INSERT INTO entete_commande (date_com, idUser) VALUES (NOW(), '.$_SESSION["id"].')');


			$idCde = $DB2->query('SELECT id_com FROM entete_commande ORDER BY id_com DESC LIMIT 1');


			$cdelines = $_SESSION['panier'];
			foreach ($cdelines as $cdelineid => $lineqte) {

				$DB2->query2('INSERT INTO ligne_commande (qte, id_com, id_produit) VALUES ('.$lineqte.', '.$idCde[0]->id_com.', '.$cdelineid.')');

			}
			?><div class="alert alert-success" role="alert">Votre commande est enregistrée<br>Numéro de commande : <?= $idCde[0]->id_com; ?></div><?php
		}
	}


	require_once('../view/bas.php');

?>
