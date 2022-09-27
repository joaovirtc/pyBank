<?php 
    require_once("../../assets/conexao.php");
    session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $login = $conexao->query("SELECT * FROM user WHERE email = '$email' and senha = '$senha' ");
        if(mysqli_num_rows($login) < 1 ){
            // print_r("nao existe");
            echo"Seus dados de usuario estao errados";
        }else{
            $id = mysqli_fetch_array($conexao->query( "SELECT id_user FROM user where email = '$email'"));
            $id = $id[0];
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            header('location: ../user/index.php');
        }

    }


?>