<?php
require_once 'header.php';

class Militar
{
//  Queries referentes à manutenção do efetivo
  const QUERY_UPDATE = "UPDATE militar SET id_post_grad=:id_post_grad, id_esp=:id_esp, id_quadro=:id_quadro, id_secao=:id_secao, saram=:saram, nome_completo=:nome_completo, nome_guerra=:nome_guerra, situacao=:situacao, ramal=:ramal, data_nasc=:data_nasc, data_ult_prom=:data_ult_prom, email=:email, antiguidade_turma=:antiguidade_turma WHERE id_militar=:id_militar";
  const QUERY_INSERT = "INSERT INTO militar (saram, nome_completo, id_post_grad, id_esp, id_quadro, id_secao, nome_guerra, situacao, ramal, data_nasc, data_ult_prom, email, antiguidade_turma, ativo) VALUES ( :saram, :nome_completo, :id_post_grad, :id_esp, :id_quadro, :id_secao, :nome_guerra, :situacao, :ramal, :data_nasc, :data_ult_prom, :email, :antiguidade_turma, 1)";
  const QUERY_BY_ID = "SELECT * FROM militar WHERE id_militar=:id_militar";
  const QUERY_BY_ANTIGUIDADE = "select 
m.*, 
s.secao AS secao_nome, 
p.posto_grad AS post_grad_nome, 
e.esp AS especialidade_nome 
FROM militar 
    AS m 
INNER JOIN secao AS s ON m.id_secao = s.id_secao 
INNER JOIN posto_grad AS p ON m.id_post_grad = p.id_posto_grad
INNER JOIN especialidade AS e ON m.id_esp = e.id_esp order by id_post_grad, situacao, data_ult_prom, antiguidade_turma DESC ";
  const QUERY_DELETE ="UPDATE militar set ativo = 0 where id_militar = :id_militar";//A query não deleta o registro, somente desativa a visualização no lista de usuários

//  Queries referentes à manutenção do Usuário Cadastrado/Não Cadastrado
  const QUERY_INSERT_CADASTRO = "INSERT INTO login_user(nome_completo,nome_usuario,senha,email,ativo,data_cadastro) VALUES ( :nome_completo, :nome_usuario, SHA1(:senha), :email, :ativo, :data_cadastro)";

//  Funções referentes ao Cadastro do Efetivo
  public function salvaUsuario($usuario){
    $util = new Util;
    $stmt =  $util->obterConexao()->prepare(self::QUERY_INSERT);
    $stmt->execute(array(
        ':id_post_grad' => $usuario['posto_grad'],
        ':id_esp' => $usuario['especialidade'],
        ':id_quadro' => $usuario['quadro'],
        ':id_secao' => $usuario['secao'],
        ':saram' => $usuario['saram'],
        ':nome_completo' => $usuario['nome_completo'],
        ':nome_guerra' => $usuario['nome_guerra'],
        ':situacao' => $usuario['situacao'],
        ':ramal' => $usuario['ramal'],
        ':data_nasc' => Util::formataData($usuario['data_nascimento']),
        ':data_ult_prom' => Util::formataData($usuario['data_ult_promocao']),
        ':email' => $usuario['email'],
        ':antiguidade_turma' => $usuario['antiguidade_turma'],
    ));
  }

  public function editaUsuario($usuario){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare(self::QUERY_UPDATE);
    $stmt->execute(array(
      ':id_post_grad' => $usuario['posto_grad'],
      ':id_esp' => $usuario['especialidade'],
      ':id_quadro' => $usuario['quadro'],
      ':id_secao' => $usuario['secao'],
      ':saram' => $usuario['saram'],
      ':nome_completo' => $usuario['nome_completo'],
      ':nome_guerra' => $usuario['nome_guerra'],
      ':situacao' => $usuario['situacao'],
      ':ramal' => $usuario['ramal'],
      ':data_nasc' => Util::formataData($usuario['data_nascimento']),
      ':data_ult_prom' => Util::formataData($usuario['data_ult_promocao']),
      ':email' => $usuario['email'],
      ':antiguidade_turma' => $usuario['antiguidade_turma'],
      ':id_militar' => $usuario['id_militar'],
    ));
  }

  public function deletaUsuario($usuario){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare(self::QUERY_DELETE);
    $stmt->execute(array(
      ':id_militar' => $usuario['id_militar'],
    ));
  }

//  Funções do Usuário Cadastrado/Não Cadastrado
    public function salvaUsuarioCadastro($usuario){
        $util = new Util;
        $stmt =  $util->obterConexao()->prepare(self::QUERY_INSERT_CADASTRO);
        $stmt->execute(array(
            ':nome_completo' => utf8_decode($usuario['nome_completo']),
            ':nome_usuario' => $usuario['nome_usuario'],
            ':senha' => $usuario['senha'],
            ':email' => $usuario['email'],
            ':ativo' => 0,
            ':data_cadastro' => date('Y-m-d'),
        ));
//        return true;
    }

//    Validação do Efetivo
  public function validate($usuario){
        foreach ($usuario as $valor) {
          if(!isset($valor)){
            return false;
          }
    }
    return true;
  }

//  Funções de Busca
  public static function buscaPostoGrad($id){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from posto_grad where id_posto_grad=:id_posto_grad');
    $stmt->execute(array(
      ':id_posto_grad' => $id,
    ));
    $result = $stmt->fetch();
    // var_dump($result);exit;
    return $result['posto_grad'];
  }
  public static function buscaQuadro($id){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from quadro where id_quadro=:id_quadro');
    $stmt->execute(array(
      ':id_quadro' => $id,
    ));
    $result = $stmt->fetch();
    return $result['quadro'];
  }
  public static function buscaEspecialidade($id){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from especialidade where id_esp=:id_esp');
    $stmt->execute(array(
      ':id_esp' => $id,
    ));
    $result = $stmt->fetch();
    return $result['esp'];
  }
  public static function buscaSecao($id){
    $util = new Util;
    // var_dump($id);
    $stmt = $util->obterConexao()->prepare('select * from secao where id_secao=:id_secao');
    $stmt->execute(array(
      ':id_secao' => $id,
    ));
    $result = $stmt->fetch();
    return $result['secao'];
  }
  public static function retornaSituacao($id){
    if(isset($id)== "1") {
      $sit = "Ativa";
    }if ($id == "2"){
      $sit = "R1";
    }if ($id == "3"){
      $sit = "REFM";
    }
    return $sit;
    }
    public function buscaId($id){
      $util = new Util;
      $stmt = $util->obterConexao()->prepare(self::QUERY_BY_ID);
      $stmt->execute(array(
        ':id_militar' => $id,
      ));
      $result = $stmt->fetch();
      return $result;
    }
  }
 ?>
