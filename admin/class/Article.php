<?php

class Article {

  public function getNumArt() {
    return $this->id_produit;
  }

  public function getDesignationArt() {
    return $this->designation;
  }

  public function getImgArt() {
    return $this->image;
  }

  public function getPrixUnitArt() {
    return $this->pu;
  }

  public function getRemiseArt() {
    return $this->remise;
  }

  public function getStockArt() {
    return $this->qte_stock;
  }

}

 ?>
