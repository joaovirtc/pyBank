<?php
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['enviado'] = true;
        header("location: index.php");
    }


?>