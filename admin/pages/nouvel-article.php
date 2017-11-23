<h2>Enregistrement nouvel article</h2>

<form method="post" action="index.php?p=nouvel-article" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nom de l'article</label>
      <input type="nomPdt" class="form-control" id="inputNomPdt" name="inputNomPdt" placeholder="Désignation">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Prix</label>
      <input type="prixPdt" class="form-control" id="inputPrixPdt" name="inputPrixPdt" placeholder="Prix">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">remise</label>
      <input type="remisePdt" class="form-control" id="inputRemisePdt" name="inputRemisePdt" placeholder="Remise">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Stock</label>
      <input type="number" class="form-control" id="inputStockPdt" name="inputStockPdt" placeholder="Stock">
    </div>
    <div class="form-group col-md-12">
      <label class="custom-file">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" id="imagePdt" name="imagePdt" class="custom-file-input">
        <span class="custom-file-control">Charger une photo...</span>
      </label>
    </div>
    <div class="bouton-groupe float-droit col-md-12">
      <button onclick="returnList();" type="button" class="btn btn-warning col-md-2">Annuler</button>
      <button type="submit" class="btn btn-success col-md-2">Valider</button>
    </div>
  </div>

</form>

<?php

	if(isset($_POST) && !empty($_POST) && isset($_FILES['imagePdt']) && !empty($_FILES['imagePdt'])) {
    $designation = htmlspecialchars($_POST['inputNomPdt']);
    $prixUnit = htmlspecialchars($_POST['inputPrixPdt']);
    $remise = htmlspecialchars($_POST['inputRemisePdt']);
    $stock = htmlspecialchars($_POST['inputStockPdt']);
    $prixUnit = str_replace(',', '.', $prixUnit);
    $nomImage = str_replace(' ', '_', $designation);

		addarticle($designation, $nomImage, $prixUnit, $remise, $stock, $_FILES['imagePdt']);
	}

	function addarticle() {

    if(isset($_POST) && !empty($_POST) && isset($_FILES['imagePdt']) && !empty($_FILES['imagePdt'])) {

      $designation = htmlspecialchars($_POST['inputNomPdt']);
      $prixUnit = htmlspecialchars($_POST['inputPrixPdt']);
      $remise = htmlspecialchars($_POST['inputRemisePdt']);
      $stock = htmlspecialchars($_POST['inputStockPdt']);
      $prixUnit = str_replace(',', '.', $prixUnit);
      $nomImage = str_replace(' ', '_', $designation);

      if(isset($_FILES['imagePdt'])) {
        $dossier = '../img/';
        $fichier = basename($nomImage.'.jpg');
        if(move_uploaded_file($_FILES['imagePdt']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {
              echo 'Upload effectué avec succès !';
         }
         else //Sinon (la fonction renvoie FALSE).
         {
              echo 'Echec de l\'upload !';
         }
      }

  		$db2 = new Database();
  		$db2->query3("INSERT INTO produit (designation, image, pu, remise, qte_stock) VALUES ('$designation', '$nomImage', ".$prixUnit.", ".$remise.", ".$stock.")");


  		?><div class="alert alert-success" role="alert">Votre article est enregistrée !</div><?php
    }else {
      ?><div class="alert alert-danger" role="alert">Il faut remplire tous les champs du formulaire !</div><?php
    }

	}
	?>
  <script>function returnList() {window.location = "index.php?p=liste-articles";}</script>
