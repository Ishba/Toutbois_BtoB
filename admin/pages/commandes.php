<?php
$db = new Database();
$data = $db->query('SELECT * FROM produit');
var_dump($data);
 ?>

<h2>Liste des commandes</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="toutes-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Toutes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="encours-tab" data-toggle="tab" href="#encours" role="tab" aria-controls="profile" aria-selected="false">En cours</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="validees-tab" data-toggle="tab" href="#validees" role="tab" aria-controls="contact" aria-selected="false">Validées</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="facturees-tab" data-toggle="tab" href="#facturees" role="tab" aria-controls="contact" aria-selected="false">Facturées</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="annulees-tab" data-toggle="tab" href="#annulees" role="tab" aria-controls="contact" aria-selected="false">Annulées</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="toutes-tab">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Numéro commande</th>
          <th scope="col">Date de commande</th>
          <th scope="col">E-mail client</th>
          <th scope="col">Numéro client</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><a href="#">842</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>En cours</td>
        </tr>
        <tr class="table-success">
          <th scope="row"><a href="#">725</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Validée</td>
        </tr>
        <tr class="table-primary">
          <th scope="row"><a href="#">852</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Facturée</td>
        </tr>
        <tr class="table-danger">
          <th scope="row"><a href="#">369</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Annulée</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="tab-pane fade" id="encours" role="tabpanel" aria-labelledby="encours-tab">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Numéro commande</th>
          <th scope="col">Date de commande</th>
          <th scope="col">E-mail client</th>
          <th scope="col">Numéro client</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><a href="#">842</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>En cours</td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="tab-pane fade" id="validees" role="tabpanel" aria-labelledby="validees-tab">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Numéro commande</th>
          <th scope="col">Date de commande</th>
          <th scope="col">E-mail client</th>
          <th scope="col">Numéro client</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-success">
          <th scope="row"><a href="#">725</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Validée</td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="tab-pane fade" id="facturees" role="tabpanel" aria-labelledby="facturees-tab">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Numéro commande</th>
          <th scope="col">Date de commande</th>
          <th scope="col">E-mail client</th>
          <th scope="col">Numéro client</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-primary">
          <th scope="row"><a href="#">852</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Facturée</td>
        </tr>
      </tbody>
    </table>
  </div>


  <div class="tab-pane fade" id="annulees" role="tabpanel" aria-labelledby="annulees-tab">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Numéro commande</th>
          <th scope="col">Date de commande</th>
          <th scope="col">E-mail client</th>
          <th scope="col">Numéro client</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-danger">
          <th scope="row"><a href="#">369</a></th>
          <td>28/12/2016</td>
          <td>contact@leroymerlin.fr</td>
          <td>879564</td>
          <td>Annulée</td>
        </tr>
      </tbody>
    </table>
  </div>


</div>
