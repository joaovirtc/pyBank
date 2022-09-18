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
    $sql = $conexao->query("INSERT INTO user VALUES ('id_user', '$nome','$email', '$senha', 800.00, '$conta')");
    header('location: ../login/index.php');
    
}
// caso tenha algum erro volta para confirmar codigo 
else{
    $_SESSION['err_cod'] = '<p class="erro">codigo de verificaçao incorreto,tente novamente</p>';
    header('location: ./checkout.php');
}

?>