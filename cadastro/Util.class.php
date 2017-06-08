<?php
/**
*
*/
class Util{
  private $user;
  private $pass;
  private $db;

  public function __construct(){
    $this->user = "root";
    $this->pass = "123456";
    //conexão com BD
    $this->db = new PDO ("mysql:host=localhost;dbname=efetivo",$this->user,$this->pass);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  public function obterConexao(){
    return $this->db;
  }

  public static function buscaSecao(){
    $util = new Util;
    $stmt =  $util->obterConexao()->prepare('select * from secao');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public static function buscaEspecialidade(){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from especialidade order by esp');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public static function buscaPostoGrad(){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from posto_grad');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public static function buscaQuadro(){
    $util = new Util;
    $stmt = $util->obterConexao()->prepare('select * from quadro');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public static function formataData($data){
    $data_explode = explode("/", $data);
    // var_dump($data);exit;
    $data_nova =  $data_explode[2] . ('-') . $data_explode[1] . ('-') .  $data_explode[0];
    // var_dump($data_nova);exit;
    return $data_nova;
  }
  public static function getSituacao(){
    return array(
      '1' => "Ativa",
      '2' => "R1",
      '3' => "REFM",
    );
  }
  public static function formataSituacao($valor){
        $tipo = Util::getSituacao();
        if(!empty($valor)){
          return $tipo[$valor];
        }else{
          $valor;
        }
  }
  public static function formataDataBanco($data){
      $data_explode = explode("-", $data);
      // var_dump($data);exit;
      $data_nova =  $data_explode[2] . ('/') . $data_explode[1] . ('/') .  $data_explode[0];
      // var_dump($data_nova);exit;
      return $data_nova;
    }
  }


?>
