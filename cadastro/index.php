<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

require_once 'header.php';
include 'conexao.php';

$query = "select 
m.*, 
s.secao AS secao_nome, 
p.posto_grad AS post_grad_nome, 
e.esp AS especialidade_nome 
FROM militar 
    AS m 
INNER JOIN secao AS s ON m.id_secao = s.id_secao 
INNER JOIN posto_grad AS p ON m.id_post_grad = p.id_posto_grad
INNER JOIN especialidade AS e ON m.id_esp = e.id_esp where ativo = 1 order by id_post_grad, situacao, data_ult_prom, antiguidade_turma DESC";
$rs = $conn->prepare($query);
$rs->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LISTA DO EFETIVO</title>

    <!-- CSS -->
    <link href="resource/css/main.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="resource/css/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="resource/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--topo-->

<?php include 'layout/topo.php' ?>

<!--conteudo-->
<div class="container" style="width: 90%">
    <legend STYLE="padding-left: 50px">.::LISTA DO EFETIVO::.</legend>
    <?php if ($rs->rowCount() > 0): $dados = $rs->fetchAll(); ?>
        <table class="table table-responsive table-striped table-hover">
            <tr>
                <th>SARAM</th>
                <th>Nome Completo</th>
                <th>Nome de Guerra</th>
                <th>Posto/Grad</th>
                <th>Situação</th>
                <th>Especialidade</th>
                <th>Quadro</th>
                <th>Seção</th>
                <th>Ramal</th>
                <th>Data de Nascimento</th>
                <th>Data da última promocão</th>
                <th>Email</th>
                <th>Antiguidade na turma</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php foreach ($dados as $dado): ?>
                <tr>
                    <td><?= $dado['saram'] ?></td>
                    <td><?= $dado['nome_completo'] ?></td>
                    <td class="centralizar"><?= $dado['nome_guerra']?></td>
                    <td class="centralizar"><?= Militar::buscaPostoGrad($dado['id_post_grad']) ?></td>
                    <td class="centralizar"><?= Militar::retornaSituacao($dado['situacao']) ?></td>
                    <td class="centralizar"><?= Militar::buscaEspecialidade($dado['id_esp']) ?></td>
                    <td class="centralizar"><?= Militar::buscaQuadro($dado['id_quadro']) ?></td>
                    <td class="centralizar"><?= Militar::buscaSecao($dado['id_secao']) ?></td>
                    <td class="centralizar"><?= $dado['ramal'] ?></td>
                    <td class="centralizar"><?= $dado['data_nasc'] ?></td>
                    <td class="centralizar"><?= $dado['data_ult_prom'] ?></td>
                    <td><?= $dado['email'] ?></td>
                    <td class="centralizar"><?= $dado['antiguidade_turma'] ?></td>
                    <td class="centralizar"><a href="cadastraUsuario.php?id_militar=<?= $dado['id_militar'] ?>" id="btn_editar"
                           name="btn_editar" class="btn btn-warning btn-sm">Editar</a></td>
                    <td class="centralizar"><a href="excluir.php?id_militar=<?= $dado['id_militar'] ?>" id="btn_excluir" name="btn_excluir"
                           class="btn btn-danger btn-sm">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="resource/js/jquery/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js"></script>
</body>
</html>
