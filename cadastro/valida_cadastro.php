<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 25/05/17
 * Hora: 12:26
 */
require_once 'header.php';
if (!empty($_POST)) {
    $militar = new Militar();
    try {
        $militar->salvaUsuarioCadastro($_POST);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
        exit;
    }
    echo ' <div id="card-alert" class="card green lighten-5">
//                      <div class="card-content green-text">
//                        <p>SUCCESS : Aguarde seu usuário ser desbloqueado por algum administrador.</p>
//                      </div>
//                      <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
//                        <span aria-hidden="true">×</span>
//                      </button>
//                    </div>';
}
//    } finally {
//        echo ' <div id="card-alert" class="card green lighten-5">
//                      <div class="card-content green-text">
//                        <p>SUCCESS : Aguarde seu usuário ser desbloqueado por algum administrador.</p>
//                      </div>
//                      <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
//                        <span aria-hidden="true">×</span>
//                      </button>
//                    </div>';
//    }
//}else {
//    echo '<div id="card-alert" class="card red lighten-5">
//                      <div class="card-content red-text">
//                        <p>DANGER : The daily report has failed</p>
//                      </div>
//                      <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
//                        <span aria-hidden="true">×</span>
//                      </button>
//                    </div>';
//    return false;
//}