<?php

class Order {

  public function getNumCde() {
    return $this->id_com;
  }

  public function getDateCde() {
    $ladate = $this->date_com;
    list($date, $time) = explode(" ", $ladate);
    list($year, $month, $day) = explode("-", $date);
    list($hour, $min, $sec) = explode(":", $time);
    $ladate = "$day/$month/$year  $time";
    return $ladate;
  }

  public function getNumClient() {
    return $this->idUser;
  }

  public function getStatut() {
    return $this->statut_cde;
  }

  public function getColorLine() {
    switch ($this->statut_cde) {
      case 'En cours':
        return '';
        break;
      case 'Validée':
        return ' class="table-success"';
        break;
      case 'Facturée':
        return ' class="table-primary"';
        break;
      case 'Annulée':
        return ' class="table-danger"';
        break;

      default:
        return '';
        break;
    }
  }

  public function getbuttonEnCours($numCde) {
    return '<a href="index.php?p=detail-cde&commande='.$numCde.'&action=encours"  type="button" class="btn btn-outline-secondary col-md-2">En cours</a>';
  }

  public function getbuttonValider($numCde) {
    return '<a href="index.php?p=detail-cde&commande='.$numCde.'&action=valider"  type="button" class="btn btn-outline-success col-md-2">Valider</a>';
  }

  public function getbuttonFacturer($numCde) {
    return '<a href="index.php?p=detail-cde&commande='.$numCde.'&action=facturer"  type="button" class="btn btn-outline-primary col-md-2">Facturer</a>';
  }

  public function getbuttonAnnuler($numCde) {
    return '<a href="index.php?p=detail-cde&commande='.$numCde.'&action=annuler"  type="button" class="btn btn-outline-danger col-md-2">Annuler</a>';
  }

  public function getButtonBar($numCde) {
    switch ($this->statut_cde) {
      case 'En cours':
        return '
        <div class="bouton-groupe float-droit col-md-12">
        '.$this->getbuttonValider($numCde).' '.$this->getbuttonFacturer($numCde).' '.$this->getbuttonAnnuler($numCde).'
        </div>
        ';
        break;
      case 'Validée':
        return '
        <div class="bouton-groupe float-droit col-md-12">
          '.$this->getbuttonEnCours($numCde).' '.$this->getbuttonFacturer($numCde).' '.$this->getbuttonAnnuler($numCde).'
        </div>
        ';
        break;
      case 'Facturée':
        return '';
        break;
      case 'Annulée':
        return '';
        break;

      default:
        return '';
        break;
    }
  }

}

 ?>
