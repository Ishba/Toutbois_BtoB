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

  public function query($sql) {
    $req = $this->getPDO()->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }

}


 ?>
