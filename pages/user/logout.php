<?php 
session_start();
$_SESSION['sair'] = true;
header('location: ../login')
?>