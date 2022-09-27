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

            <div class="Div-form">

                <form action="validar.php" method="POST">
                    <h2>CRIE SUA CONTA</h2>

                    <!-- INPUT NOME -->
                    <div class="single-input">
                        <input type="text" name="nome" class="input" id="nome" required>
                        <label for="nome">Nome</label>
                    </div>



                    <!-- INPUT EMAIL -->
                    <div class="single-input">
                        <input type="email" name="email" class="input" required>
                        <label for="nome">E-mail</label>
                    </div>





                    <!-- INPUT SENHA -->
                    <div class="single-input">
                        <input type="password" name="senha" class="input validar" onchange="validarPassword()"
                            id="password" required>
                        <label for="nome">Senha</label>
                    </div>



                    <!-- INPUT COMFIRMAR SENHA -->
                    <div class="single-input">
                        <input type="password" name="confirmar" class="input validar" onchange="validarPassword()"
                            id="confirm_password" required>
                        <label for="nome">Confirme sua senha</label>
                    </div>

                    <p class="validar" id="validacao">Senhas diferentes</p>

                    <!-- INPUT SUBMIT -->
                    <div class="div__submit">
                        <input type="submit" value="CRIAR CONTA" name="env" class="submit">
                         <?php 
                // aparecer mensagem de erro caso tenha
                    if(isset($_SESSION['err_email'])){
                        echo ("<p id=\"msg_php\"class=\"validar active\">{$_SESSION['err_email']}</p>");
                    };
                    // limpando a session de erro
                    unset($_SESSION['err_email']);
                ?> 
                    </div>


                </form>
                <div class="links">
                    <a href="">Já sou cliente</a>
                    <a href="../../index.html">Voltar</a>
                </div>
            </div>
        </div>
    </main>



    <!-- puxando o script -->
    <script src="./app.js"></script>
</body>

</html>