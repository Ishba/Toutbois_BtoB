<?php require('module/pagination-art.php'); ?>

<h2 class="col-md-9">Liste des articles</h2>

<a href="index.php?p=nouvel-article" type="button" class="btn btn-primary col-md-3 float-right margin-bas">Ajouter un nouvel article</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Référence</th>
      <th scope="col">Nom</th>
      <th scope="col">Stock</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Remise %</th>
      <th scope="col">Prix TTC</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($db->query('SELECT * FROM produit ORDER BY id_produit LIMIT '.$firstArtPage.', '.$perpage, 'Article') as $article): ?>
        <tr>
          <td><img src="../img/<?= $article->getImgArt(); ?>-mini.jpg"></td>
          <td scope="row"><?= $article->getNumArt(); ?></td>
          <td><?= $article->getDesignationArt(); ?></td>
          <td><?= $article->getStockArt(); ?></td>
          <td><?= $article->getPrixUnitArt(); ?> €</td>
          <td><?= $article->getRemiseArt(); ?>%</td>
          <td><?= $article->getPrixUnitArt()*1.196; ?> €</td>
          <td><a href="index.php?p=detail-art<?= '&article='.$article->getNumArt(); ?>">Modifier</a></td>
        </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<?php require('module/pagination.php'); ?>
