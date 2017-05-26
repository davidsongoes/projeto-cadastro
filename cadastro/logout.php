<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 24/05/17
 * Hora: 14:12
 */
  session_start(); // Inicia a sessão
  session_destroy(); // Destrói a sessão limpando todos os valores salvos
  header("Location: login.php"); exit; // Redireciona o visitante
