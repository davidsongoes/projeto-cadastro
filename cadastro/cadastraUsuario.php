<?php

include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once 'header.php';
if (isset($_GET['id_militar'])) {
    $militar = new Militar;
    $dadosMilitar = $militar->buscaId($_GET['id_militar']);
}
$secoes = Util::buscaSecao();
$especialidades = Util::buscaEspecialidade();
$posto_grads = Util::buscaPostoGrad();
$quadros = Util::buscaQuadro();
$situacoes = Util::getSituacao();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CADASTRAR EFETIVO</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--topo-->

<?php include 'layout/topo.php'?>

<!--conteudo-->

<form class="form-horizontal" action="salvaUsuario.php" method="post" id="cadastrar">
    <input type="hidden" name="id_militar"
           value="<?php if (!empty($dadosMilitar['id_militar'])) echo $dadosMilitar['id_militar'] ?>">
    <fieldset>

        <!-- Form Name -->
        <legend STYLE="padding-left: 50px">.::CADASTRAR EFETIVO::.</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="ramal">SARAM</label>

            <div class="col-md-2">
                <input id="ramal" name="saram" placeholder="0000000" class="form-control input-md" type="text" maxlength="7"
                       value="<?php if (!empty($dadosMilitar['saram'])) echo $dadosMilitar['saram'] ?>" required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome_completo">Nome Completo</label>

            <div class="col-md-4">
                <input id="nome_completo" name="nome_completo" placeholder="" class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['nome_completo'])) echo $dadosMilitar['nome_completo'] ?>"
                       required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome_guerra">Nome de Guerra</label>

            <div class="col-md-4">
                <input id="nome_guerra" name="nome_guerra" placeholder="" class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['nome_guerra'])) echo $dadosMilitar['nome_guerra']?>"
                       required>

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="posto_grad">Posto/Grad</label>

            <div class="col-md-2">
                <select id="posto_grad" name="posto_grad" class="form-control" required>
                    <option
                        value="<?php if (!empty($dadosMilitar['id_post_grad'])) echo $dadosMilitar['id_post_grad'] ?>"><?php if (!empty($dadosMilitar['id_post_grad'])) echo Militar::buscaPostoGrad($dadosMilitar['id_post_grad']) ?></option>
                    <?php foreach ($posto_grads as $posto_grad): ?>
                        <option value="<?= $posto_grad['id_posto_grad'] ?>"><?= $posto_grad['posto_grad'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Select Situação -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="situacao">Situação</label>

            <div class="col-md-2">
                <select id="situacao" name="situacao" class="form-control" required>
                    <option
                        value="<?php if (!empty($dadosMilitar['situacao'])) echo $dadosMilitar['situacao'] ?>"><?php if (!empty($dadosMilitar['situacao'])) echo Util::formataSituacao($dadosMilitar['situacao']) ?></option>
                    <?php foreach ($situacoes as $id => $valor): ?>
                        <option value="<?= $id ?>"><?= $valor ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="especialidade">Especialidade</label>

            <div class="col-md-2">
                <select id="especialidade" name="especialidade" class="form-control" required>
                    <option
                        value="<?php if (!empty($dadosMilitar['id_esp'])) echo $dadosMilitar['id_esp'] ?>"><?php if (!empty($dadosMilitar['id_esp'])) echo Militar::buscaEspecialidade($dadosMilitar['id_esp']) ?></option>
                    <?php foreach ($especialidades as $especialidade): ?>
                        <option value="<?= $especialidade['id_esp'] ?>"><?= $especialidade['esp'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="quadro">Quadro</label>

            <div class="col-md-2">
                <select id="quadro" name="quadro" class="form-control" required>
                    <option
                        value="<?php if (!empty($dadosMilitar['id_quadro'])) echo $dadosMilitar['id_quadro'] ?>"><?php if (!empty($dadosMilitar['id_quadro'])) echo Militar::buscaQuadro($dadosMilitar['id_quadro']) ?></option>
                    <?php foreach ($quadros as $quadro): ?>
                        <option value="<?= $quadro['id_quadro'] ?>"><?= $quadro['quadro'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="secao">Seção</label>

            <div class="col-md-2">
                <select id="secao" name="secao" class="form-control" required>
                    <option
                        value="<?php if (!empty($dadosMilitar['id_secao'])) echo $dadosMilitar['id_secao'] ?>"><?php if (!empty($dadosMilitar['id_secao'])) echo Militar::buscaSecao($dadosMilitar['id_secao']) ?></option>
                    <?php foreach ($secoes as $secao): ?>
                        <option value="<?= $secao['id_secao'] ?>"><?= $secao['secao'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="ramal">Ramal</label>

            <div class="col-md-2">
                <input id="ramal" name="ramal" placeholder="0000" class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['ramal'])) echo $dadosMilitar['ramal'] ?>" required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="data_nascimento">Data Nascimento</label>

            <div class="col-md-2">
                <input id="data_nascimento" name="data_nascimento" placeholder="00/00/0000"
                       class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['data_nasc'])) echo Util::formataDataBanco($dadosMilitar['data_nasc']) ?>"
                       required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="data_ult_promocao">Data Última Promoção</label>

            <div class="col-md-2">
                <input id="data_ult_promocao" name="data_ult_promocao" placeholder="00/00/0000"
                       class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['data_ult_prom'])) echo Util::formataDataBanco($dadosMilitar['data_ult_prom']) ?>"
                       required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>

            <div class="col-md-4">
                <input id="email" name="email" placeholder="aaaaaaaa@depens.aer.mil.br" class="form-control input-md"
                       type="email" value="<?php if (!empty($dadosMilitar['email'])) echo $dadosMilitar['email'] ?>"
                       required>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="ramal">Antiguidade na turma</label>

            <div class="col-md-2">
                <input id="antiguidade_turma" name="antiguidade_turma" placeholder="0" class="form-control input-md" type="text"
                       value="<?php if (!empty($dadosMilitar['antiguidade_turma'])) echo $dadosMilitar['antiguidade_turma'] ?>" required>

            </div>
        </div>

        <!-- Button -->
        <?php if (empty($dadosMilitar)) : ?>
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn_salvar"></label>

                <div class="col-md-2">
                    <button id="btn_salvar" name="btn_salvar" class="btn btn-success btn-sm" value="salvar_novo">Salvar e
                        Novo
                    </button>
                    <button id="btn_salvar" name="btn_salvar" class="btn btn-info btn-sm" value="salvar_fechar">Salvar e
                        Fechar
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($dadosMilitar)) : ?>
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn_editar"></label>

                <div class="col-md-2">
                    <button id="btn_editar" name="btn_salvar" class="btn btn-warning" value="editar">Editar</button>
                </div>
            </div>
        <?php endif; ?>
    </fieldset>
</form>
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="btn_salvar"></label>
  <div class="col-md-4">
    <button id="btn_salvar" name="btn_salvar" class="btn btn-success" value="salvar">Salvar</button>
  </div>
</div> -->

</fieldset>
</form>
<script src="js/jquery/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery/jquery.mask.min.js"></script>


<script type="text/javascript">
    $('#data_nascimento').keyup(function () {
        $('#data_nascimento').mask('00/00/0000');
    })
    $('#data_ult_promocao').keyup(function () {
        $('#data_ult_promocao').mask('00/00/0000');
    });
    $("#cadastrar").submit(function () {
        if ($("#saram").val() == '') {
            $("#saram").parent().addClass("has-error");
            alert('O campo não pode ser nulo.');
            return false;
        }
        if ($("#nome_completo").val() == '') {
            $("#nome_completo").parent().addClass("has-error");
            alert('O campo não pode ser nulo.');
            return false;
        }
        if ($('#nome_guerra').val() == '') {
            $('#nome_guerra').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#posto_grad').val() == 0) {
            $('#posto_grad').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#especialidade').val() == 0) {
            $('#especialidade').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#quadro').val() == 0) {
            $('#quadro').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#secao').val() == 0) {
            $('#secao').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#ramal').val() == 0) {
            $('#ramal').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#data_nascimento').val() == 0) {
            $('#data_nascimento').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#data_ult_promocao').val() == 0) {
            $('#data_ult_promocao').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#email').val() == 0) {
            $('#email').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
        if ($('#antiguidade_turma').val() == 0) {
            $('#antiguidade_turma').parent().addClass('has-error');
            alert('O campo nao pode ser nulo');
            return false;
        }
    });

</script>

</body>
</html>
