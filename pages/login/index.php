<!-- <?php
    session_start();
    if(isset($_POST['sair'])){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
    }
    // print_r($_SESSION);
    if((isset($_SESSION['cpf']) == true) and (isset($_SESSION['senha']) == true)){
        header('location: ../index.php');
    }
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <main>

        <header>
            <a href="../../index.html"><img src="../../assets/img/logoWhite.png" alt="LOGO"></a>
        </header>

        <div class="container__form">


            <!-- abrindo o formulario de criaçao de conta -->
            <form action="validar.php" method="POST">
                <div class="text-form">
                    <h2>FAÇA SEU LOGIN</h2>
                </div>


                <!-- INPUT EMAIL -->
                <div class="single-input">
                    <input type="email" name="email" class="input" required>
                    <label for="nome">E-mail</label>
                </div>
                <!-- <label for="email">E-mail</label>
                <input type="email" name="email" class="text-input"> -->


                <!-- <?php 
            if(isset($_SESSION['err_email'])){
                echo ("<p class=\"validar active\">{$_SESSION['err_email']}</p>");
            };

        ?>   -->


                <!-- INPUT SENHA -->
                <div class="single-input">
                    <input type="password" name="senha" class="input" required>
                    <label for="nome">Senha</label>
                </div>
                <!-- <label for="senha">Senha</label>
                <input type="text" name="senha" onchange="validarPassword()" id="password" class="text-input"> -->


                <!-- INPUT SUBMIT -->
                <div class="div__submit">
                    <p class="validar" id="validacao">Senhas diferentes</p>
                    <input type="submit" value="CONTINUAR" name="submit" class="submit">
                </div>

                <div class="links">
                    <a href="">Ainda não sou cliente</a>
                    <a href="../../index.html">Voltar</a>
                </div>
            </form>
        </div>
    </main>



    <!-- puxando o script -->
    <script src="./app.js"></script>
</body>

</html>