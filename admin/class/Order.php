<?php

class Order {

  public function getNumCde() {
    return $this->id_com;
  }

  public function getDateCde() {
    return $this->date_com;
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

}

 ?>
