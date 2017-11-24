<?php

class DBAuth {

  private $db;

  public function __construct(Database $db) {

    $this->db = $db;

  }

  public function login($username, $password) {

    $user = $this->db->logAdmin('SELECT * FROM admin WHERE username = ?', [$username], null, true);
    var_dump($user);
  }

  public function logged() {

    return isset($_SESSION['auth']);

  }

}

 ?>
