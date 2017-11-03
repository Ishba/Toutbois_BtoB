<?php
  $PARAM_hote = 'localhost';
  $PARAM_port = '3306';
  $PARAM_nom_bd = 'toutbois_btob';
  $PARAM_utilisateur = 'root';
  $PARAM_mot_passe = '';

  function connexion_open($PARAM_hote, $PARAM_port, $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe) {
    $connect = true;
    try
    {
    	$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
            $connect = false;
    }

    if ($connect == true) {
      echo "connexion reussie <br /><br />";
      return $bdd;
    }

  }


  function connexion_close() {
    $connect = null;
  }

?>
