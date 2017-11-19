<?php

  class panier {

    private $DB;

    public function __construct($DB) {
      if(!isset($_SESSION)){
        session_start();
      }
      if(!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
      }
      $this->DB = $DB;
      if(isset($_GET['delPanier'])) {
        $this->del($_GET['delPanier']);
      }
      if(isset($_POST['panier']['quantity'])) {
        $this->recalc();
      }
    /*  if(isset($_GET['addcommande'])) {
        $this->addcommande($_GET['addcommande']);
      }*/
    }

    public function recalc() {
      foreach ($_SESSION['panier'] as $produit_id => $quantity) {
        if(isset($_POST['panier']['quantity'][$produit_id])){
          $_SESSION['panier'][$produit_id] = $_POST['panier']['quantity'][$produit_id];
        }
      }
    }

    public function count() {
      return array_sum($_SESSION['panier']);
    }

    public function total() {
      $total = 0;
      $ids = array_keys($_SESSION['panier']);
			if(empty($ids)) {
				$produits = array();
			}else {
				$produits = $this->DB->query('SELECT id_produit, pu FROM produit WHERE id_produit IN ('.implode(',',$ids).')');
			}
      foreach ($produits as $produit) {
        $total += ($produit->pu * 1.196) * $_SESSION['panier'][$produit->id_produit];
      }
      return $total;
    }

    public function add($produit_id) {
      $_SESSION['panier'][$produit_id] = 1;
    }

    public function del($produit_id){
      unset($_SESSION['panier'][$produit_id]);
    }

    /*public function addcommande($num_client) {
      if(!isset($_SESSION['enseigne'])) {
        // CODER POUR AFFICHER MESSAGE D ERREUR
        return $test;
      } else {
        $datenow = new DateTime(date("Y-m-d"));
        foreach ($produits as $produit) {
          $DB->query('INSERT INTO entete_commande (date_com, id_user) VALUES ('.$datenow->format("Y-m-d").', '.$_SESSION['id'].')');

          echo 'produit ajouté<br>';
          echo $_SESSION['id'];
        }

      }
    }*/

  }


 ?>
