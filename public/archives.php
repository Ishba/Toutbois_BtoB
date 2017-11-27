<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
?>


<h2>Mes commandes</h2>


<?php
	if(empty($_SESSION['auth'])){
		?>
		<p>Vous devez vous <a href="connexion-client.php">connecter</a> pour visualiser l'historique de vos commandes.</p>
		<?php
	} else {


 ?>
 <?php $commandes = $DB->query("SELECT * FROM entete_commande WHERE idUser = ".$_SESSION['id']." ORDER BY id_com DESC"); ?>
<?php
	$nbCollapse = 0;
	foreach ($commandes as $commande) {
		$numCde = $commande->id_com;
		$dateCde = $commande->date_com;
		$idUser = $commande->idUser;
		$statut = $commande->statut_cde;
		$prixTotalTTC = 0;
		$nbCollapse += 1;

		$produits = $DB->query('SELECT * FROM ligne_commande WHERE id_com = '.$numCde);
?>
<div id="accordion" role="tablist">
  <div class="card_cde">
    <div class="card-header" role="tab" id="heading<?= $nbCollapse; ?>">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapse<?= $nbCollapse; ?>" aria-expanded="true" aria-controls="collapse<?= $nbCollapse; ?>">
          Commande n° <?= $numCde; ?> (<?= $dateCde; ?>)
        </a>
				<span class="float-right"><?= $statut; ?></span>
      </h5>
    </div>
		<div id="collapse<?= $nbCollapse; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?= $nbCollapse; ?>" data-parent="#accordion">
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Photo</th>
							<th scope="col">Référence produit</th>
							<th scope="col">Quantité</th>
							<th scope="col">Prix TTC</th>
						</tr>
					</thead>
					<tbody>
<?php
		foreach ($produits as $produit) {
			$quantite = $produit->qte;
			$idProduit = $produit->id_produit;
			$produitDetail = $DB->query("SELECT * FROM produit WHERE id_produit = ".$idProduit);
			foreach ($produitDetail as $pdtDetail) {
				$designation = $pdtDetail->designation;
				$image = $pdtDetail->image;
				$prixUnitaire = $pdtDetail->pu;
				$prixTTC = $prixUnitaire * 1.196;
				$prixTotalTTC += $prixTTC*$quantite;
			}
			?>

				<tr>
					<td><img src="../img/<?= $image; ?>-mini.jpg" alt="..."></td>
					<td><?= $designation; ?></td>
					<td><?= $quantite; ?></td>
					<td><?php echo number_format($prixTTC*$quantite, 2, ',', ' '); ?> €</td>
				</tr>

			<?php
		}?>

			</tbody>
		</table>
		<p><strong>Total : <?php echo number_format($prixTotalTTC, 2, ',', ' '); ?> €</strong><!--<span class="float-droit"><a href="#">imprimer la facture</a></span>--></p>

		</div>
	</div>
</div>

	<?php
	}

	}
 ?>


  <?php
  	require_once('../view/bas.php');

  ?>
