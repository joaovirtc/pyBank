<?php
    session_start();
    require_once("../../assets/conexao.php");
    $id = $_SESSION['id'];
    $chave = $_POST['chave'];
    $valor = $_POST['valor'];
    // retirando da conta do remetente
    $dinheiro = mysqli_fetch_array($conexao->query("SELECT dinheiro FROM user WHERE id = '$id'"));
    $dinheiro = $dinheiro[0];
    $dinheiro = $dinheiro - $valor;
    $pix = $conexao->query("UPDATE user SET dinheiro = '$dinheiro' WHERE id_user = '$id';");
    // depositando na conta do destinatario
    $id_destinatario = mysqli_fetch_array($conexao->query("SELECT id_user FROM user WHERE email = '$chave'"));
    $id_destinatario = $id_destinatario[0];
    $dinheiro_destinatario = $conexao->query("SELECT dinheiro FROM user WHERE id = '$id_destinatario'");
    $dinheiro_destinatario = $dinheiro_destinatario[0];
    $dinheiro_destinatario = $dinheiro_destinatario + $valor;
    $pix = $conexao->query("UPDATE user SET dinheiro = '$dinheiro_destinatario' WHERE id_user = '$id_destinatario';");

    
?>