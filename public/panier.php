<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
?>

<?php
	if(isset($_GET['del'])) {
		$panier->del($_GET['del']);
	}
?>

<h2>Mon panier</h2>

<h6>Utilisateur : $Enseigne / $email</h6>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Référence produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix HT</th>
			<th scope="col">Prix TVA</th>
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
          <select class="form-control" id="">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </td>
      <td><?php echo number_format($produit->pu, 2, ',', ' '); ?> €</td>
			<td><?php echo number_format($produit->pu * 1.196, 2, ',', ' '); ?> €</td>
      <td><a href="panier.php?del=<?= $produit->id_produit; ?>"><button type="button" class="btn btn-outline-danger">X</button></a></td>
    </tr>
	<?php endforeach; ?>

  </tbody>
</table>

<p><strong>Total : <?= number_format($panier->total(),2,',',' '); ?> €</strong><span class="float-droit"><a href="#" class="btn btn-primary">Finaliser ma commande</a></span></p>


<?php
	require_once('../view/bas.php');

?>
