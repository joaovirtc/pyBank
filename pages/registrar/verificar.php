<?php
session_start();
require_once("../../assets/conexao.php");
$cod = $_SESSION['cod'];
unset($_SESSION['cod']);
$usuario = $_POST['codigo_user'];

// caso esteja tudo certo adiciona o usuario e leva ao login
if($usuario == $cod){
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];       
    $conta = mt_rand(1111111111111111,9999999999999999);
    $sql = $conexao->query("INSERT INTO user VALUES ('id_user', '$nome','$email', '$senha', 1800.00, '$conta')");
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: ../login/index.php');
    
}
// caso tenha algum erro volta para confirmar codigo 
else{
    $_SESSION['err_cod'] = '<p class="erro">Codigo de verificaçao incorreto,foi enviado um novo codigo</p>';
    header('location: ./checkout.php');
}

?>