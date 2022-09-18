<?php
    require_once("../../assets/conexao.php");
    session_start();
    if(isset($_POST['env']) ){
        
        $email = $_POST['email'];
        // verificando se ja existe o email
        $validar = $conexao->query("SELECT * FROM user WHERE email = '$email'");
        // se tiver este cadastro,retorna para o registro com msg de erro
        if(mysqli_num_rows($validar) > 0 ){
            
            $_SESSION['err_email'] = "Ooops este email já esta em uso!";
            header('location: ./index.php');
        }
        else{
            $senha = $_POST['senha'];
            $confirmar = $_POST['confirmar'];
            // testando se as senhas sao iguais
            if($confirmar != $senha){
                
                $_SESSION['err_email'] = "oops, seus senhas nao sao iguais";
                header('location: index.php');
            }
            else{
                //enviando o usuario para verificar o email com os dados em uma session
                $nome = $_POST['nome'];
                
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header("location: ./checkout.php");
                
            };
        }
        
    }
?>
