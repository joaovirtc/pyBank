<?php

    include_once('../../assets/conexao.php');
    $nome = base64_decode($_GET['nome']);
    $senha = base64_decode($_GET['senha']);

    echo ("{$nome} {$senha}");

?>