<?php 
    session_start();
    require_once("../../assets/conexao.php");
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

<body>

    <main>

        <header>
            <a href="../../index.html"><img src="../../assets/img/logoWhite.png" alt="LOGO"></a>
        </header>

        <div class="container__form">


            <!-- abrindo o formulario de criaçao de conta -->
            <form action="#" method="POST">
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


                <!-- <?php 
            if(isset($_SESSION['err_email'])){
                echo ("<p class=\"validar active\">{$_SESSION['err_email']}</p>");
            };

        ?>   -->


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
                </div>
                <!-- <label for="confirmar"> Confirme sua senha</label>
                <input type="text" name="confirmar" onchange="validarPassword()" id="confirm_password"
                    class="text-input"> -->



                <!-- INPUT SUBMIT -->
                <div class="div__submit">
                    <p class="validar" id="validacao">Senhas diferentes</p>
                    <input type="submit" value="CRIAR CONTA" name="submit" class="submit">
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


<?php
    
    if(isset($_POST['submit']) ){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        $validar = $conexao->query("SELECT * FROM user WHERE email = '$email'");
        
        if(mysqli_num_rows($validar) > 0 ){
            session_start();
            $_SESSION['err_email'] = "Ooops este email já esta em uso!";
            header('location: ./index.php');
        }
        else{
            //enviando o usuario para verificar o email
            $nome = base64_encode($nome);
            $email = base64_encode($email);
            $senha = base64_encode($senha);
            header("location: ./validar.php?nome={$nome}&senha={$senha}");
            
        };
    }
?>
