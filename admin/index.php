<?php


require 'class/Autoloader.php';

Autoloader::register();

if(isset($_GET['p'])) {
  $p = $_GET['p'];
} else {
  $p = 'login';
}

// Initialisation des objets
$db = new Database();

$auth = new DBAuth($db);

ob_start();
if($p === 'login') {
  require 'pages/login.php';
} elseif($p === 'commandes') {
  require 'pages/commandes.php';
} elseif($p === 'detail-cde') {
  require 'pages/detail-cde.php';
} elseif($p === 'liste-articles') {
  require 'pages/liste-articles.php';
} elseif($p === 'nouvel-article') {
  require 'pages/nouvel-article.php';
} elseif($p === 'validation-article') {
  require 'pages/validation-article.php';
} elseif($p === 'detail-art' && isset($_SESSION['auth'])) {
  require 'pages/detail-art.php';
}

else {
  require 'pages/login.php';
}

$content = ob_get_clean();
require 'pages/template/default.php'

?>
