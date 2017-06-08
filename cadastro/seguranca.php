<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 23/05/17
 * Hora: 13:58
 */
/**
 * Sistema de segurança com acesso restrito
 *
 * Usado para restringir o acesso de certas páginas do seu site
 *
 * @author 3S SIN Góes <goesdgbp@fab.mil.br>
 *
 * @version 2.0
 * @package ProjetoCadastro
 */
//  Configurações do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['pdo'] = true;                // Vai user a PDO?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'davidson' é diferente de 'Davidson'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo continue logado.
//caso use a PDO
$_SG['dsn'] = 'mysql:host=localhost;dbname=efetivo';
//
$_SG['servidor'] = 'localhost';    // Servidor MySQL
$_SG['usuario'] = 'root';          // Usuário MySQL
$_SG['senha'] = '123456';                // Senha MySQL
$_SG['banco'] = 'efetivo';            // Banco de dados MySQL
$_SG['paginaLogin'] = 'login.php'; // Página de login
$_SG['tabela'] = 'login_user';       // Nome da tabela onde os usuários são salvos
// ==============================
// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================
// Verifica se precisa fazer a conexão com o MySQL

if ($_SG['conectaServidor'] == true) {
    if ($_SG['pdo'] == true) {
        $_SG['link'] = new PDO($_SG['dsn'],$_SG['usuario'],$_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [" . $_SG['servidor'] . "].");
        $_SG['link']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } else {
        $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [" . $_SG['servidor'] . "].");
        mysqli_select_db($_SG['link'], $_SG['banco']) or die("MySQL: Não foi possível conectar-se ao banco de dados [" . $_SG['banco'] . "].");
    }
}
// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true)
    session_start();
/**
 * Função que valida um usuário e senha
 *
 * @param string $usuario - O usuário a ser validado
 * @param string $senha - A senha a ser validada
 *
 * @return bool - Se o usuário foi validado ou não (true/false)
 */
function validaUsuario($usuario, $senha)
{
    global $_SG;
    $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
    // Usa a função addslashes para escapar as aspas
    $nusuario = addslashes($usuario);
    $nsenha = addslashes($senha);
    // Monta uma consulta SQL (query) para procurar um nome_usuario

    //PDO
    $query = "SELECT `id`, `nome_completo` FROM `" . $_SG['tabela'] . "` WHERE " . $cS . " `nome_usuario` = '" . $nusuario . "' AND " . $cS . " `senha` = '" . sha1($nsenha) . "' AND ativo = 1 LIMIT 1 ";
    $retorno = $_SG['link']->query($query);
    $resultado = $retorno->fetch(PDO::FETCH_ASSOC);

    //mysql()
//    $sql = "SELECT `id`, `nome` FROM `" . $_SG['tabela'] . "` WHERE " . $cS . " `usuario` = '" . $nusuario . "' AND " . $cS . " `senha` = '" . sha1($nsenha) . "' LIMIT 1";
//    $query = mysqli_query($_SG['link'],$sql);
//    $resultado = mysqli_fetch_assoc($query);

    // Verifica se encontrou algum registro
    if (empty($resultado)) {
        // Nenhum registro foi encontrado => o usuário é inválido
        return false;
    } else {
        // Definimos dois valores na sessão com os dados do usuário
        $_SESSION['usuarioID'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
        $_SESSION['usuarioNome'] = utf8_encode($resultado['nome_completo']); // Pega o valor da coluna 'nome_completo' do registro encontrado no MySQL
        // Verifica a opção se sempre validar o login
        if ($_SG['validaSempre'] == true) {
            // Definimos dois valores na sessão com os dados do login
            $_SESSION['usuarioLogin'] = $usuario;
            $_SESSION['usuarioSenha'] = $senha;
        }
        return true;
    }
}

/**
 * Função que protege a página
 */
function protegePagina()
{
    global $_SG;
    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
        // Não há usuário logado, manda pra página de login
        expulsaVisitante();
    } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
        // Há usuário logado, verifica se precisa validar o login novamente
        if ($_SG['validaSempre'] == true) {
            // Verifica se os dados salvos na sessão batem com os dados do banco de dados
            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
                // Os dados não batem, manda pra tela de login
                expulsaVisitante();
            }
        }
    }
}

/**
 * Função para expulsar um visitante
 */
function expulsaVisitante()
{
    global $_SG;
    // Remove as variáveis da sessão (caso elas existam)
    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
    // Manda pra tela de login
    header("Location: " . $_SG['paginaLogin']);
}
