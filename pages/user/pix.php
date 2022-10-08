<?php
    session_start();
    require_once("../../assets/conexao.php");
    $id = $_SESSION['id'];
    $chave = $_POST['chave'];
    $valor = $_POST['valor'];
    // retirando da conta do remetente
    $dinheiro = mysqli_fetch_array($conexao->query("SELECT dinheiro FROM user WHERE id_user = '$id'"));
    $dinheiro = $dinheiro[0];
    $dinheiro = $dinheiro - $valor;
    $pix = $conexao->query("UPDATE user SET dinheiro = '$dinheiro' WHERE id_user = '$id';");
    // depositando na conta do destinatario
    $id_destinatario = mysqli_fetch_array($conexao->query("SELECT id_user FROM user WHERE email = '$chave'"));
    $id_destinatario = $id_destinatario[0];
    $dinheiro_destinatario = mysqli_fetch_array($conexao->query("SELECT dinheiro FROM user WHERE id_user = '$id_destinatario'"));
    $dinheiro_destinatario = $dinheiro_destinatario[0];
    $dinheiro_destinatario = $dinheiro_destinatario + $valor;
    $pix = $conexao->query("UPDATE user SET dinheiro = '$dinheiro_destinatario' WHERE id_user = '$id_destinatario';");
    $_SESSION['enviado'] = true;

    // gerando historico
    $historico = $conexao->query("INSERT INTO `pix`(`id_pix`, `valor`, `remetente`, `destinatario`) VALUES (id_pix,'$valor','$id','$id_destinatario');");
    $_SESSION['token'] = mt_rand(1111,9999);
    $token = $_SESSION['token'];
    header("location: index.php?href={$token}");

?>