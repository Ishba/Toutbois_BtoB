<?php
  $numCde = $_GET['commande'];
  $prixTotalTTC = 0;
  $detailCde = $db->query('SELECT * FROM entete_commande WHERE id_com = '.$numCde.' ', 'Order');
  foreach ($detailCde as $commande) {?>

<h2>Detail commande <?= $commande->getNumCde(); ?></h2>

<ul class="sans-puce">
  <li>Numéro de commande : <?= $commande->getNumCde(); ?></li>
  <li>Date de commande : <?= $commande->getDateCde(); ?></li>
  <li>Statut : <?= $commande->getStatut(); ?></li>
  <li>Numéro de client : <?= $commande->getNumClient(); ?></li>
</ul>

<?php } //endforeach

  $produits = $db->query2('SELECT * FROM ligne_commande WHERE id_com = '.$numCde);
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Référence produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Prix TTC</th>
      <th scope="col">Prix Total TTC</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($produits as $produit) {
        $quantite = $produit->qte;
        $idProduit = $produit->id_produit;
        $produitDetail = $db->query2("SELECT * FROM produit WHERE id_produit = ".$idProduit);
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
      <td><?php echo number_format($prixUnitaire, 2, ',', ' '); ?> €</td>
      <td><?php echo number_format($prixTTC, 2, ',', ' '); ?> €</td>
      <td><?php echo number_format($prixTTC*$quantite, 2, ',', ' '); ?> €</td>
    </tr>
    <?php
  }?>

  </tbody>
</table>

<table class="table">
  <tbody>
    <tr class="table-info">
      <td class="float-droit"><strong>Total : <?php echo number_format($prixTotalTTC, 2, ',', ' '); ?> €</strong></td>
      <td></td>
    </tr>
  </tbody>
</table>


<?php

  echo $commande->getButtonBar($numCde);

  if(isset($_GET['action'])){
    action($_GET['action']);
  }

  function action() {
    $db2 = new Database();
    $numCde = $_GET['commande'];

    switch ($_GET['action']) {
      case 'encours':
        $action = 'En cours';
        break;

      case 'valider':
        $action = 'Validée';
        break;

      case 'facturer':
        $action = 'Facturée';
        break;

      case 'annuler':
        $action = 'Annulée';
        break;

      default:
        $action = 'En cours';
        break;
    }
    $db2->query3("UPDATE entete_commande SET statut_cde = '$action' WHERE id_com = $numCde");
    header('Location:index.php?p=detail-cde&commande='.$numCde);
  }

 ?>
