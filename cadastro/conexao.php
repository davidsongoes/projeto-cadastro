<?php
$user = "root";
$pass = "123456";
//conexão com BD
$conn = new PDO ("mysql:host=localhost;dbname=efetivo",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
