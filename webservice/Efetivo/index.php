<?php


function efetivo(){

  $user = "root";//usuário do banco de dados
  $pass = "123456";//senha do usuario do banco de dados
  
// Conexão com BD
  $conn = new PDO ("mysql:host=localhost;dbname=efetivo",$user,$pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Consulta para trazer em ordem de posto/graduação e somente os usuários ativos
  $query = "select 
m.*, 
s.secao AS secao_nome, 
p.posto_grad AS post_grad_nome, 
e.esp AS especialidade_nome 
FROM militar 
    AS m 
INNER JOIN secao AS s ON m.id_secao = s.id_secao 
INNER JOIN posto_grad AS p ON m.id_post_grad = p.id_posto_grad
INNER JOIN especialidade AS e ON m.id_esp = e.id_esp 
where ativo = 1
order by id_post_grad, situacao, data_ult_prom, antiguidade_turma DESC ";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  echo json_encode($stmt->fetchAll());

}

efetivo();

 ?>

