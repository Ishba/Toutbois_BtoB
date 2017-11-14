<?php
	require_once('../view/haut.php');
	require_once('../view/menu.php');
?>


<h2>Mes commandes</h2>

<div id="accordion" role="tablist">
  <div class="card_cde">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Commande 47852 (05/12/2016)
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Référence produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
              <td>Nom du produit</td>
              <td>2</td>
              <td>400,00 €</td>
            </tr>
            <tr>
              <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
              <td>Nom du produit</td>
              <td>2</td>
              <td>400,00 €</td>
            </tr>
            <tr>
              <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
              <td>Nom du produit</td>
              <td>2</td>
              <td>400,00 €</td>
            </tr>
          </tbody>
        </table>
        <p><strong>Total : 1600,00 €</strong><span class="float-droit"><a href="#">imprimer la facture</a></span></p>

      </div>
    </div>
  </div>

  <div id="accordion" role="tablist">
    <div class="card_cde">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Commande 47852 (05/12/2016)
          </a>
        </h5>
      </div>

      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Photo</th>
                <th scope="col">Référence produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                <td>Nom du produit</td>
                <td>2</td>
                <td>400,00 €</td>
              </tr>
              <tr>
                <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                <td>Nom du produit</td>
                <td>2</td>
                <td>400,00 €</td>
              </tr>
              <tr>
                <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                <td>Nom du produit</td>
                <td>2</td>
                <td>400,00 €</td>
              </tr>
            </tbody>
          </table>
          <p><strong>Total : 1600,00 €</strong><span class="float-droit"><a href="#">imprimer la facture</a></span></p>

        </div>
      </div>
    </div>

    <div id="accordion" role="tablist">
      <div class="card_cde">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              Commande 47852 (05/12/2016)
            </a>
          </h5>
        </div>

        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Photo</th>
                  <th scope="col">Référence produit</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Prix</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                  <td>Nom du produit</td>
                  <td>2</td>
                  <td>400,00 €</td>
                </tr>
                <tr>
                  <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                  <td>Nom du produit</td>
                  <td>2</td>
                  <td>400,00 €</td>
                </tr>
                <tr>
                  <td><img src="../img/test-pdt-mini.jpg" alt="..."></td>
                  <td>Nom du produit</td>
                  <td>2</td>
                  <td>400,00 €</td>
                </tr>
              </tbody>
            </table>
            <p><strong>Total : 1600,00 €</strong><span class="float-droit"><a href="#">imprimer la facture</a></span></p>

          </div>
        </div>
      </div>


      <?php
      	require_once('../view/bas.php');

      ?>
