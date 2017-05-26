<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 23/05/17
 * Hora: 13:58
 */
// Inclui o arquivo com o sistema de segurança
require_once("seguranca.php");
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['nome_usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php");
    exit;
}
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
    $usuario = (isset($_POST['nome_usuario'])) ? $_POST['nome_usuario'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    // Utiliza uma função criada no seguranca.php pra validar os dados digitados
    if (validaUsuario($usuario, $senha) == true) {
        // O usuário e a senha digitados foram validados, manda pra página interna
        header("Location: index.php");
    } else {
        // O usuário e/ou a senha são inválidos, manda de volta pro form de login
        // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
        expulsaVisitante();
    }
}
