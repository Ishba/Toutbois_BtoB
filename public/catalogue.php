<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
?>



<h2>Commander</h2>

<?php $produits = $DB->query('SELECT * FROM produit'); ?>
<?php foreach ($produits as $produit): ?>
	<div class="card col-md-4" style="width: 20rem;">
		<img class="card-img-top" src="../img/<?= $produit->image; ?>.jpg" alt="<?php echo $produit->image; ?>">
		<div class="card_corps">
			<h4 class="card-title"><?php echo $produit->designation; ?></h4>

				<p class="prix">Prix : <?php echo number_format($produit->pu, 2, ',', ' '); ?></p>
				<p class="float-droit">Remise : <?php echo $produit->remise; ?>%</p>

			<a href="addpanier.php?id=<?= $produit->id_produit; ?>" class="btn btn-primary addPanier">Ajouter au panier</a>
		</div>
	</div>
<?php endforeach ?>




<?php
	require_once('../view/bas.php');

?>
