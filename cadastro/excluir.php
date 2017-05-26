<?php
require_once 'header.php';

session_start();
if(isset($_GET)){
$user = new Militar;
$user->deletaUsuario($_GET);
header('Location: index.php ');

  }
