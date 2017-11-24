<?php

class Database {

  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'toutbois';
  private $pdo;

  public function __construct($host = null, $username = null, $password = null, $database = null) {
    if($host != null){
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->database = $database;
    }
  }

  private function getPDO() {
    if($this->pdo === null){
      $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        $this->pdo = $pdo;
    }
    return $this->pdo;
  }

  public function query($sql, $class_name) {
    $req = $this->getPDO()->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_CLASS, $class_name);
  }

  public function query2($sql) {
    $req = $this->getPDO()->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }

  public function query3($sql) {
    $req = $this->getPDO()->prepare($sql);
    $req->execute();
  }

  public function nbArticle($sql) {
    $req = $this->getPDO()->prepare($sql);
    $req->execute();
    return $req->fetchColumn();
  }

  public function logAdmin($statement, $attributes, $class_name, $one = false) {
    $req = $this->getPDO()->prepare($statement);
    $req->execute($attributes);

    if($class_name === null){
      $req->setFetchMode(PDO::FECTH_OBJ);
    } else {
      $req->setFetchMode(PDO::FECTH_CLASS, $class_name);
    }

    if($one) {
      $data = $req->fetch();
    } else {
      $data = $req->fetchAll();
    }

    return $data;

  }

}


 ?>
