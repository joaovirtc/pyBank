<?php 
    session_start();
            
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

    <!-- abrindo o formulario de criaçao de conta -->
     <form action="validar.php" method="POST">
        <label for="nome"> digite o nome</label>
        <input type="text" name="nome">

        <label for="cpf"> digite o cpf</label>
        <input type="number" name="cpf">

        <label for="email"> digite o email</label>
        <input type="email" name="email">
        <?php 
            if(isset($_SESSION['err_email'])){
                echo ("<p class=\"validar active\">{$_SESSION['err_email']}</p>");
            };

        ?>

        <label for="senha"> digite a senha</label>
        <input type="text" name="senha" onchange="validarPassword()" id="password">

        <label for="confirmar"> confirme a senha</label>
        <input type="text" name="confirmar" onchange="validarPassword()" id="confirm_password">
        <p class="validar " id="validacao">Senhas diferentes</p>
        <input type="submit" value="registrar-se" name="submit">
     </form>




    <!-- puxando o script -->
    <script src="./app.js"></script>
</body>
</html>