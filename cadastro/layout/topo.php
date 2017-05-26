<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="images/unidade_logo.png" alt="" style="width: 40px;height: 45px; padding: 5px 10px 5px 0px">
<!--            <a class="navbar-brand" href="index.php">DIRENS</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">INÍCIO <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">GERENCIAR <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">LISTAR EFETIVO</a></li>
                        <li><a href="cadastraUsuario.php">CADASTRAR EFETIVO</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><p style="padding-right: 10px;padding-top: 12px"><?php echo "Olá, " . $_SESSION['usuarioNome'];?></p></li>
<li><a href="logout.php" onclick="window.close();">SAIR</a></li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>