<!DOCTYPE html>
<html lang="pt-BR">

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
    <title>LOGIN</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="css/materialize/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="../Cadastro/css/sweetalert/sweetalert.css">

    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="css/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

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
<form action="valida.php" method="post" id="login" name="login">
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="images/unidade_logo.png" alt="" class="responsive-img valign profile-image-login">
                        <p class="center login-form-text">Controle<br>Relação do Efetivo<br>Portal</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="nome_usuario" name="nome_usuario" type="text" class="validate" maxlength="20">
                        <label for="nome_usuario" class="center-align">Nome de Usuário</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="senha" type="password" name="senha" maxlength="20">
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" id="remember-me"/>
                        <label for="remember-me">Lembre-me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input class="btn waves-effect waves-light indigo col s12" type="submit" value="ACESSAR"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin center-align medium-small"><a href="register.php">Criar<br>Cadastro</a>
                        </p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin center-align medium-small"><a href="#">Esqueceu sua
                                senha?</a></p>
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
<script type="text/javascript" src="js/materialize/materialize.min.js"></script>
<!--  sweetalert-->
<script type="text/javascript" src="js/sweetalert/sweetalert.min.js"></script>

<!--  prism-->
<script type="text/javascript" src="js/prism/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="js/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="js/custom-script.js"></script>

<!--Alertas-->
<script>
    $(document).ready(function() {
        $("#login").submit(function () {
            if ($("#nome_usuario").val() == '') {
                swal({
                    title: "Campo vazio!",
                    text: "Preencha o campo 'Nome de Usuário'!",
                    type: "warning",
                    confirmButtonText: "OK"
                });
                return false;
            }
            if ($("#senha").val() == '') {
                swal({
                    title: "Campo vazio!",
                    text: "Preencha o campo 'senha'!",
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