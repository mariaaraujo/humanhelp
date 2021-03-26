<?php
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "usbw";
$banco = "humanhelp";
$con = new mysqli ($servidor,$usuario_bd,$senha_bd,$banco);

if($con->connect_error){
    die("A conexão falhou:".$con->connect_error);
}

mysqli_set_charset($con,"utf8");
?>