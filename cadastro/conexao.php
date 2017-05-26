<?php
$user = "root";
$pass = "123123";
//conexão com BD
$conn = new PDO ("mysql:host=localhost;dbname=efetivo",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
