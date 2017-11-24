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
      <label for="inputEmail4">Remise</label>
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
        <span class="custom-file-control">Charger une photo (318 x 318)...</span>
      </label>
    </div>
    <div class="form-group col-md-12">
      <label class="custom-file">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" id="imagePdtMini" name="imagePdtMini" class="custom-file-input">
        <span class="custom-file-control">Charger miniature (40 x 40)...</span>
      </label>
    </div>
    <div class="bouton-groupe float-droit col-md-12">
      <button onclick="returnList();" type="button" class="btn btn-warning col-md-2">Annuler</button>
      <button type="submit" class="btn btn-success col-md-2">Valider</button>
    </div>
  </div>

</form>

<?php

  function supprAccents($chaine) {
    $chaine = str_replace(array(
								'à', 'â', 'ä', 'á', 'ã', 'å',
								'î', 'ï', 'ì', 'í',
								'ô', 'ö', 'ò', 'ó', 'õ', 'ø',
								'ù', 'û', 'ü', 'ú',
								'é', 'è', 'ê', 'ë',
								'ç', 'ÿ', 'ñ', 'ý',
							),
							array(
								'a', 'a', 'a', 'a', 'a', 'a',
								'i', 'i', 'i', 'i',
								'o', 'o', 'o', 'o', 'o', 'o',
								'u', 'u', 'u', 'u',
								'e', 'e', 'e', 'e',
								'c', 'y', 'n', 'y',
							), $chaine);
    $chaine = str_replace(array(
								'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
								'Î', 'Ï', 'Ì', 'Í',
								'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
								'Ù', 'Û', 'Ü', 'Ú',
								'É', 'È', 'Ê', 'Ë',
								'Ç', 'Ÿ', 'Ñ', 'Ý',
							),
							array(
								'A', 'A', 'A', 'A', 'A', 'A',
								'I', 'I', 'I', 'I',
								'O', 'O', 'O', 'O', 'O', 'O',
								'U', 'U', 'U', 'U',
								'E', 'E', 'E', 'E',
								'C', 'Y', 'N', 'Y',
							), $chaine);
    return $chaine;
  }

	if(isset($_POST) && !empty($_POST) && isset($_FILES['imagePdt']) && !empty($_FILES['imagePdt']) && isset($_FILES['imagePdtMini']) && !empty($_FILES['imagePdtMini'])) {
    $designation = htmlspecialchars($_POST['inputNomPdt']);
    $prixUnit = htmlspecialchars($_POST['inputPrixPdt']);
    $remise = htmlspecialchars($_POST['inputRemisePdt']);
    $stock = htmlspecialchars($_POST['inputStockPdt']);
    $prixUnit = str_replace(',', '.', $prixUnit);
    $nomImage = str_replace(' ', '_', $designation);
    $nomImage = supprAccents($nomImage);
    $extensions = array('.jpg', '.jpeg');
    $extension = strrchr($_FILES['imagePdt']['name'], '.');
    $taille_maxi = 1000000;
    $taille = filesize($_FILES['imagePdt']['tmp_name']);
    $nomImageMini = str_replace(' ', '_', $designation);
    $nomImageMini = supprAccents($nomImageMini);
    $extensions2 = array('.jpg', '.jpeg');
    $extension2 = strrchr($_FILES['imagePdtMini']['name'], '.');
    $taille_maxi2 = 100000;
    $taille2 = filesize($_FILES['imagePdtMini']['tmp_name']);

		addarticle($designation, $nomImage, $nomImageMini, $prixUnit, $remise, $stock, $_FILES['imagePdt'], $_FILES['imagePdtMini'], $extensions, $extension, $taille_maxi, $taille);
	}

	function addarticle() {

    if(isset($_POST) && !empty($_POST) && isset($_FILES['imagePdt']) && !empty($_FILES['imagePdt']) && isset($_FILES['imagePdtMini']) && !empty($_FILES['imagePdtMini'])) {

      $designation = htmlspecialchars($_POST['inputNomPdt']);
      $prixUnit = htmlspecialchars($_POST['inputPrixPdt']);
      $remise = htmlspecialchars($_POST['inputRemisePdt']);
      $stock = htmlspecialchars($_POST['inputStockPdt']);
      $prixUnit = str_replace(',', '.', $prixUnit);
      $nomImage = str_replace(' ', '_', $designation);
      $nomImage = supprAccents($nomImage);
      $extensions = array('.jpg', '.jpeg');
      $extension = strrchr($_FILES['imagePdt']['name'], '.');
      $taille_maxi = 1000000;
      $taille = filesize($_FILES['imagePdt']['tmp_name']);
      $nomImageMini = str_replace(' ', '_', $designation);
      $nomImageMini = supprAccents($nomImageMini);
      $extensions2 = array('.jpg', '.jpeg');
      $extension2 = strrchr($_FILES['imagePdtMini']['name'], '.');
      $taille_maxi2 = 100000;
      $taille2 = filesize($_FILES['imagePdtMini']['tmp_name']);

      if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
      {
           $erreur = 'Vous devez uploader une photo produit de type jpg...';
      }
      if($taille>$taille_maxi)
      {
           $erreur = 'La photo produit est trop lourde...';
      }
      if(!in_array($extension2, $extensions2)) //Si l'extension n'est pas dans le tableau
      {
           $erreur = 'Vous devez uploader une photo produit miniature de type jpg...';
      }
      if($taille2>$taille_maxi2)
      {
           $erreur = 'La photo produit miniature est trop lourde...';
      }

      if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
      {

        if(isset($_FILES['imagePdt'])) {
          $dossier = '../img/';
          $fichier = basename($nomImage.'.jpg');
          if(move_uploaded_file($_FILES['imagePdt']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
           {
                echo 'Upload photo effectué avec succès !<br>';
           }
           else //Sinon (la fonction renvoie FALSE).
           {
                echo 'Echec de l\'upload photo !<br>';
           }
        } else {
           $erreur = 'Il faut uploader une photo produit !<br>';
        }

        if(isset($_FILES['imagePdtMini'])) {
          $dossier = '../img/';
          $fichier2 = basename($nomImage.'-mini.jpg');
          if(move_uploaded_file($_FILES['imagePdtMini']['tmp_name'], $dossier . $fichier2)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
           {
                echo 'Upload photo miniature effectué avec succès !<br>';
           }
           else //Sinon (la fonction renvoie FALSE).
           {
                echo 'Echec de l\'upload photo miniature !<br>';
           }
        } else {
           $erreur = 'Il faut uploader une photo produit miniature !';
        }

    		$db2 = new Database();
    		$db2->query3("INSERT INTO produit (designation, image, pu, remise, qte_stock) VALUES ('$designation', '$nomImage', ".$prixUnit.", ".$remise.", ".$stock.")");

    		?><div class="alert alert-success" role="alert">Votre article est enregistrée !</div><?php
      }else {
        ?><div class="alert alert-danger" role="alert"><?= $erreur; ?></div><?php
      }
    }
	}
	?>
  <script>function returnList() {window.location = "index.php?p=liste-articles";}</script>
