<?php
    session_start();
    if(isset($_POST['sair'])){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
    }
    // print_r($_SESSION);
    if((isset($_SESSION['cpf']) == true) and (isset($_SESSION['senha']) == true)){
        header('location: ../index.php');
    }
?>