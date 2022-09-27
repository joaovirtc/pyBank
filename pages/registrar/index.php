<?php 
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar-se</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="form">

    <main>

        <header>
            <a href="../../index.html"><img src="../../assets/img/logoWhite.png" alt="LOGO"></a>
        </header>

        <div class="container__form">


            <!-- abrindo o formulario de criaçao de conta -->
            <form  action="validar.php" method="POST" id="form">
                <h2>CRIE SUA CONTA!</h2>

                <!-- INPUT NOME -->
                <div class="single-input">
                    <input type="text" name="nome" class="input" id="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <!-- <div class="single-input">
                    <input type="text" name="nome" class="input" id="nome">
                    <label for="nome">Nome</label>
                </div> -->



                <!-- INPUT CPF -->
                <!-- <div class="single-input">
                    <input type="text" name="nome" class="input" id="nome" required>
                    <label for="nome">Nome</label>
                </div> -->
                <!-- <label for="cpf">CPF</label>
                <input type="number" name="cpf" class="text-input"> -->



                <!-- INPUT EMAIL -->
                <div class="single-input">
                    <input type="email" name="email" class="input" required>
                    <label for="nome">E-mail</label>
                </div>
                <!-- <label for="email">E-mail</label>
                <input type="email" name="email" class="text-input"> -->





                <!-- INPUT SENHA -->
                <div class="single-input">
                    <input type="password" name="senha" class="input validar" onchange="validarPassword()" id="password" required>
                    <label for="nome">Senha</label>
                </div>
                <!-- <label for="senha">Senha</label>
                <input type="text" name="senha" onchange="validarPassword()" id="password" class="text-input"> -->



                <!-- INPUT COMFIRMAR SENHA -->
                <div class="single-input">
                    <input type="password" name="confirmar" class="input validar" onchange="validarPassword()" id="confirm_password" required>
                    <label for="nome">Confirme sua senha</label>
                    <p class="validar" id="validacao">Senhas diferentes</p>
                </div>
                <!-- <label for="confirmar"> Confirme sua senha</label>
                <input type="text" name="confirmar" onchange="validarPassword()" id="confirm_password"
                    class="text-input"> -->



                <!-- INPUT SUBMIT -->
                <div class="div__submit">
                    <?php 
                    // aparecer mensagem de erro caso tenha
                        if(isset($_SESSION['err_email'])){
                            echo ("<p id=\"msg_php\"class=\"validar active\">{$_SESSION['err_email']}</p>");
                        };
                        // limpando a session de erro
                        unset($_SESSION['err_email']);
                    ?>
                    <input type="submit" value="CRIAR CONTA" name="env" class="submit" id="env">
                </div>


                <a href="">Já sou cliente</a>
                <a href="../../index.html">Voltar</a>
            </form>
        </div>
    </main>



    <!-- puxando o script -->
    <script src="./app.js"></script>
</body>

</html>


