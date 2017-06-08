<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 23/05/17
 * Hora: 12:21
 */
?>
<!DOCTYPE html>
<html lang="pt">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>CADASTRO</title>

    <!-- Favicons-->
    <link rel="icon" href="resource/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="resource/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="resource/css/materialize/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="resource/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="../Cadastro/css/sweetalert/sweetalert.css">

    <!-- Custome CSS-->
    <link href="resource/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="resource/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="resource/css/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="resource/css/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>
<!--Aqui você pode mudar a cor do background da página-->
<body class="#212121 grey darken-4">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<!--Botão inferior direito-->
<div class="fixed-action-btn horizontal click-to-toggle" style="position: absolute; right: 20px;">
    <a class="btn-floating btn-large indigo">
        <i class="mdi-navigation-menu"></i>
    </a>
    <ul>
        <li><a class="btn-floating tooltipped blue" data-position="top" data-delay="50" data-tooltip="PORTAL DIRENS"
               data-tooltip-id="851375f3-2351-162d-e87e-d4bef290fce0" href="../../" onclick="window.close()"><i
                        class="mdi-action-exit-to-app"></i></a>
        </li>
    </ul>
</div>

<!--Página-->
<form action="valida_cadastro.php" method="post" id="cadastro" name="cadastro">
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="resource/images/unidade_logo.png" alt="" class="responsive-img valign profile-image-login">
                        <p class="center login-form-text">Controle<br>Relação do Efetivo<br>Portal</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="nome_completo" type="text" name="nome_completo" class="validate">
                        <label for="nome_completo" class="center-align">Nome Completo</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="nome_usuario" type="text" name="nome_usuario" class="validate">
                        <label for="nome_usuario" class="center-align">Nome de Usuário</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        <input id="email" type="email" name="email" class="validate">
                        <label for="email" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="senha" type="password" name="senha" class="validate">
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="senha-repete" type="password" name="senha-repete">
                        <label for="senha-repete">Repita a Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input class="btn waves-effect waves-light indigo col s12" type="submit" value="ENVIAR"/>
                    </div>
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Já tem uma conta?<br> <a href="login.php">Login</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</form>


<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="resource/js/materialize/materialize.min.js"></script>
<!--  sweetalert-->
<script type="text/javascript" src="resource/js/sweetalert/sweetalert.min.js"></script>

<!--  prism-->
<script type="text/javascript" src="resource/js/prism/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="resource/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="resource/js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="resource/js/custom-script.js"></script>

<!--Alertas-->
<script>
    $(document).ready(function() {
        $("#cadastro").submit(function () {
            if ($("#nome_completo").val() == '') {
                swal({
                    title: "Campo vazio",
                    text: "Preencha o campo 'Nome Completo'",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
            if ($("#nome_usuario").val() == '') {
                swal({
                    title: "Campo vazio",
                    text: "Preencha o campo 'Nome de Usuário'",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
            if ($("#email").val() == '') {
                swal({
                    title: "Campo vazio",
                    text: "Preencha o campo 'Email'",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }

            if ($("#senha").val() == '') {
                swal({
                    title: "Campo vazio",
                    text: "Preencha o campo 'Senha'",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
            if ($("#senha-repete").val() == '') {
                swal({
                    title: "Campo vazio!",
                    text: "Preencha o campo 'Repita a Senha'!",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
            if ($("#senha").val() != $("#senha-repete").val()) {
                swal({
                    title: "Senha não batem!",
                    text: "Preencha o campo 'Senha' e 'Repita senha' corretamente!",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
        });
    });
</script>
</body>
</html>