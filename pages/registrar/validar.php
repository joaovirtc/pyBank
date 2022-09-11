<?php

    include_once('../../assets/conexao.php');
    // verificando se foi feito o submit do formulario
    if(isset($_POST['submit']) ){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }


    $validar = $conexao->query("SELECT * FROM user WHERE email = '$email'");
    
    if(mysqli_num_rows($validar) > 0 ){
        
        // header('location: registrar.php');
        
    }else{
        print_r("nao existe");
        session_start();
        $_SESSION['err_email'] = "Ooops este email já esta em uso!";
        //criando tabela endereço primeiro
        // $criar = $conexao->query("INSERT INTO endereco VALUES (id_end, '','','','','','','','')");
        // $getId_end = mysqli_fetch_array($conexao->query("SELECT MAX(id_end) FROM endereco "));
        // $getId_end = $getId_end[0];
        // //inserindo user
        // $sql = $conexao->query("INSERT INTO usuarios VALUES ('id_user', '$nome','$email', '$senha', '$getId_end')");

        // // echo "<script>alert('criado com sucesso')</script>";
         header('location: ./index.php');
        
    }  ;      
    // print_r($result); 
    

?>