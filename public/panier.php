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
	require('addcommande.php');
	require_once('../view/bas.php');

?>
