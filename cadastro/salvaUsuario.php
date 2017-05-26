<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//Miltar.class.php e Util.class.php
require_once 'header.php';


$user = new Militar;

if($user->validate($_POST)){

// Salva usuario
if($_POST['btn_salvar'] == 'salvar_novo') {
    $user->salvaUsuario($_POST);
    header('Location: cadastraUsuario.php ');
}elseif($_POST['btn_salvar'] == 'salvar_fechar') {
    $user->salvaUsuario($_POST);
    header('Location: index.php ');
}
//edita usuario

elseif($_POST['btn_salvar'] == 'editar'){
    $user->editaUsuario($_POST);
    header('Location: index.php ');
  }
  }
 ?>
