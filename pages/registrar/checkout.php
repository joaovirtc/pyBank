<?php
    session_start();
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <title>checkout</title>
</head>

<body>
    <main>
        <header>
            <a href="../../index.html"><img src="../../assets/img/logoWhite.png" alt="LOGO"></a>
        </header>


        <div class="container__form">
            <form action="verificar.php" method="POST">
                <div class="text-form">
                    <h2>CÓDIGO DE VERIFICAÇÃO</h2>
                    <p>Acabamos de enviar um código no seu e-mail <strong><?php echo $email ?></strong>
                        cheque e o digite abaixo</p>
                </div>
                <div class="single-input">
                    <input type="text" name="codigo_user" class="input" required>
                    <label for="codigo_user">Digite o código</label>
                </div>
                <div class="links">
                    <?php 
                // caso tenha digitado algo errado ele volta com msg de erro e manda outro codigo
                if(isset($_SESSION['err_cod'])){
                    echo ($_SESSION['err_cod']);
                    unset($_SESSION['err_cod']);
                    include_once('./email.php');
                    $_SESSION['cod'] = $cod_valid;
                    // echo ($_SESSION['cod']);
                }
                // primeira vez que entra na pag ele entra nesse else e envia o email
                else{
                    include_once('./email.php');
                    $_SESSION['cod'] = $cod_valid;
                }
                ?>
                    <a href="./checkout.php" class="terciario">Enviar código novamente</a>
                    <input type="submit" class="primario" value="Conferir código" name="enviar">
                    <a href="../../index.html" class="secundario">Voltar</a>
                </div>
            </form>


        </div>
    </main>

</body>

</html>

<!-- <?php
    // pede um novo codigo 
    if(isset($_POST['nv_codigo'])){
        header('location: ./checkout.php');
    };
    // volta para o registro

?> -->