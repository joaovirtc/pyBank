<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
</head>
<body>
    <form action="cod_verificar.php" method="POST">
        <h2>codigo de verificaçao</h2>
        <p>Acabamos de enviar um codigo para o seu email, digite o codigo enviado</p>
        <input type="text" name="codigo_user" required>
        <input type="submit" value="Confirmar codigo" name="enviar">
        
    </form>
    <form action="#" method="POST">
        <input type="submit" value="enviar novamente" name="nv_codigo">
    </form>
    <form action="#" method="POST">
        <input type="submit" value="voltar" name="voltar">
    </form>
</body>
</html>

<?php
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

// caso tenha digitado algo errado ele volta com msg de erro e manda outro codigo
if(isset($_SESSION['err_cod'])){
    include_once('./email.php');
    echo ($_SESSION['err_cod']);
    unset($_SESSION['err_cod']);
    $_SESSION['cod'] = $cod_valid;
    // echo ($_SESSION['cod']);
}
// primeira vez que entra na pag ele entra nesse else e envia o email
else {
    include_once('./email.php');
    if($msg != ""){
        // echo ($cod_valid);
        echo($msg);
        $_SESSION['cod'] = $cod_valid;
    }
}

// pede um novo codigo 
if(isset($_POST['nv_codigo'])){
    header('location: ./checkout.php');
};
// volta para o registro
if(isset($_POST['voltar'])){
    header("location: index.php");
}  
?>