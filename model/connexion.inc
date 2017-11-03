<?php
  require_once('dao.inc');
  if (!isset($bdd)) {
    $bdd = connexion_open($PARAM_hote, $PARAM_port, $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
  }
 ?>
